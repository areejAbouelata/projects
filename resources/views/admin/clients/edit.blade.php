@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{__('models/clients.singular')}}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['admin.clients.update', $user->id], 'method' => 'patch']) !!}

                        @include('admin.clients.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection