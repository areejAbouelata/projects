<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/clients.fields.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/clients.fields.email')) !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', __('models/clients.fields.phone')) !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>
<!-- phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('commercial_number', __('models/clients.fields.commercial_number')) !!}
    {!! Form::text('commercial_number', null, ['class' => 'form-control']) !!}
</div>
<!-- phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nationality_id', __('models/clients.fields.nationality_id')) !!}
    {!! Form::text('nationality_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', __('models/clients.fields.password')) !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Confirmation Password Field -->
<div class="form-group col-sm-6">
      {!! Form::label('password', __('models/clients.fields.password_confirmation')) !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">{{__('crud.cancel')}}</a>
</div>
