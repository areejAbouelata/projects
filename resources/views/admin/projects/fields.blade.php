<!-- Payment Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/projects.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<!-- Payment Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_status', __('models/projects.fields.payment_status').':') !!}
    {!! Form::text('payment_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', __('models/projects.fields.phone_number').':') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', __('models/projects.fields.price').':') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', __('models/projects.fields.start_date').':') !!}
    {!! Form::text('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#start_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Payment Updated By Field -->
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('payment_updated_by', __('models/projects.fields.payment_updated_by').':') !!}--}}
{{--    {!! Form::number('payment_updated_by', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', __('models/projects.fields.client_id').':') !!}
    {!! Form::select('client_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.projects.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
