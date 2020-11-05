@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/projects.fields.files')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @foreach($project->files()->get() as $file)
                        <a href="{{\Storage::url($file->name)}}" download="download"> {{__('models/projects.fields.files')}} . {{$loop->index}}
                        <i class="glyphicon glyphicon-download-alt"></i></a>
                        <br>

                    @endforeach
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-default">
                        @lang('crud.back')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
