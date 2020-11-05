<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('models/notes.fields.title').':') !!}
    <p>{{ $note->title }}</p>
</div>

<!-- Note Field -->
<div class="form-group">
    {!! Form::label('note', __('models/notes.fields.note').':') !!}
    <p>{{ $note->note }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/notes.fields.user_id').':') !!}
    <p>{{ $note->user->name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/notes.fields.created_at').':') !!}
    <p>{{ $note->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/notes.fields.updated_at').':') !!}
    <p>{{ $note->updated_at }}</p>
</div>

