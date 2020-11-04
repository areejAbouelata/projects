<?php namespace Tests\Repositories;

use App\Models\Note;
use App\Repositories\NoteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class NoteRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var NoteRepository
     */
    protected $noteRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->noteRepo = \App::make(NoteRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_note()
    {
        $note = factory(Note::class)->make()->toArray();

        $createdNote = $this->noteRepo->create($note);

        $createdNote = $createdNote->toArray();
        $this->assertArrayHasKey('id', $createdNote);
        $this->assertNotNull($createdNote['id'], 'Created Note must have id specified');
        $this->assertNotNull(Note::find($createdNote['id']), 'Note with given id must be in DB');
        $this->assertModelData($note, $createdNote);
    }

    /**
     * @test read
     */
    public function test_read_note()
    {
        $note = factory(Note::class)->create();

        $dbNote = $this->noteRepo->find($note->id);

        $dbNote = $dbNote->toArray();
        $this->assertModelData($note->toArray(), $dbNote);
    }

    /**
     * @test update
     */
    public function test_update_note()
    {
        $note = factory(Note::class)->create();
        $fakeNote = factory(Note::class)->make()->toArray();

        $updatedNote = $this->noteRepo->update($fakeNote, $note->id);

        $this->assertModelData($fakeNote, $updatedNote->toArray());
        $dbNote = $this->noteRepo->find($note->id);
        $this->assertModelData($fakeNote, $dbNote->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_note()
    {
        $note = factory(Note::class)->create();

        $resp = $this->noteRepo->delete($note->id);

        $this->assertTrue($resp);
        $this->assertNull(Note::find($note->id), 'Note should not exist in DB');
    }
}
