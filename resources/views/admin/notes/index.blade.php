@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            @lang('models/notes.plural')
        </h1>
        @if(request()->route('id'))
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('admin.note.create' , [request()->route('id')]) }}">@lang('crud.add_new')</a>

           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-right: 5px; margin-bottom: 5px" href="{{ route('admin.projects.index') }}">@lang('models/projects.plural')</a>
        </h1>
        @endif
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.notes.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

