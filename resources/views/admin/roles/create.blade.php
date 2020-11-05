@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Create New Role
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">


                    {!! Form::open(array('route' => 'admin.roles.store','method'=>'POST')) !!}

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group form-group col-sm-6">
                                <strong>Name:</strong>
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group"><strong>Permission:</strong><br/>@foreach($permission as $value)
                                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}{{ $value->name }}</label>
                                    <br/>@endforeach</div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>


                    {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
