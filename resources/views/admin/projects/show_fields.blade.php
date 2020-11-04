<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/projects.fields.name').':') !!}
    <p>{{ $project->name }}</p>
</div>

<!-- Payment Status Field -->
<div class="form-group">
    {!! Form::label('payment_status', __('models/projects.fields.payment_status').':') !!}
    <p>{{ $project->payment_status }}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group">
    {!! Form::label('phone_number', __('models/projects.fields.phone_number').':') !!}
    <p>{{ $project->phone_number }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', __('models/projects.fields.price').':') !!}
    <p>{{ $project->price }}</p>
</div>

<!-- Start Date Field -->
<div class="form-group">
    {!! Form::label('start_date', __('models/projects.fields.start_date').':') !!}
    <p>{{ $project->start_date }}</p>
</div>

<!-- Payment Updated By Field -->
<div class="form-group">
    {!! Form::label('payment_updated_by', __('models/projects.fields.payment_updated_by').':') !!}
    <p>{{ $project->payment_updated_by }}</p>
</div>

<!-- Client Id Field -->
<div class="form-group">
    {!! Form::label('client_id', __('models/projects.fields.client_id').':') !!}
    <p>{{ $project->client_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/projects.fields.created_at').':') !!}
    <p>{{ $project->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/projects.fields.updated_at').':') !!}
    <p>{{ $project->updated_at }}</p>
</div>

