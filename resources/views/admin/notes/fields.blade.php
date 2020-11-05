<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/notes.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Note Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('note', __('models/notes.fields.note').':') !!}
    {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>
@if(isset($id))
    <input type="number" hidden name="project_id" value="{{$id}}">
@endif
<!-- User Id Field -->
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('user_id', __('models/notes.fields.user_id').':') !!}--}}
{{--    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    @if(isset($id))

    <a href="{{ route('project.notes' , $id) }}" class="btn btn-default">@lang('crud.cancel')</a>
    @endif
</div>
