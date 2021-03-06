<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/users.fields.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/users.fields.email')) !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', __('models/users.fields.password')) !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Confirmation Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', __('models/users.fields.password_confirmation')) !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('roles', __('models/users.fields.roles').':') !!}

    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control select2','multiple')) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">{{__('crud.cancel')}}</a>
</div>
@push('scripts')

    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
        })
    </script>
@endpush
