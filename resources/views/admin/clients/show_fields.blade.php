<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/clients.fields.name').':') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/clients.fields.email').':') !!}
    <p>{!! $user->email !!}</p>
</div>
