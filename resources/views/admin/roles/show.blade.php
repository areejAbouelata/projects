@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            @lang('models/roles.plural')
        </h1>
    </section>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"><strong>Name:</strong>{{ $role->name }}</div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissions:</strong>@if(!empty($rolePermissions))@foreach($rolePermissions as $v)<label
                    class="label label-success">{{ $v->name }},</label> <br>@endforeach @endif</div>
        </div>
    </div>
@endsection
