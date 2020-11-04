<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Note;

class NoteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_note()
    {
        $note = factory(Note::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/notes', $note
        );

        $this->assertApiResponse($note);
    }

    /**
     * @test
     */
    public function test_read_note()
    {
        $note = factory(Note::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/notes/'.$note->id
        );

        $this->assertApiResponse($note->toArray());
    }

    /**
     * @test
     */
    public function test_update_note()
    {
        $note = factory(Note::class)->create();
        $editedNote = factory(Note::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/notes/'.$note->id,
            $editedNote
        );

        $this->assertApiResponse($editedNote);
    }

    /**
     * @test
     */
    public function test_delete_note()
    {
        $note = factory(Note::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/notes/'.$note->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/notes/'.$note->id
        );

        $this->response->assertStatus(404);
    }
}
