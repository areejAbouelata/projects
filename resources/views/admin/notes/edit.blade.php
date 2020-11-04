@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/notes.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($note, ['route' => ['admin.notes.update', $note->id], 'method' => 'patch']) !!}

                        @include('admin.notes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
