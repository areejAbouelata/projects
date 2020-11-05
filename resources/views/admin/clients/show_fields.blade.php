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

<!-- PHone Field -->
<div class="form-group">
    {!! Form::label('phone', __('models/clients.fields.phone').':') !!}
    <p>{!! $user->phone !!}</p>
</div><!-- PHone Field -->
<div class="form-group">
    {!! Form::label('commercial_number', __('models/clients.fields.commercial_number').':') !!}
    <p>{!! $user->commercial_number !!}</p>
</div>
<div class="form-group">
    {!! Form::label('nationality_id', __('models/clients.fields.nationality_id').':') !!}
    <p>{!! $user->nationality_id !!}</p>
</div>
