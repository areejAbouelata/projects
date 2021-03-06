<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
        <tr>
            <th>{{__('models/clients.fields.name')}}</th>
            <th>{{__('models/clients.fields.email')}}</th>
            <th>{{__('models/clients.fields.phone')}}</th>
            <th>{{__('models/clients.fields.commercial_number')}}</th>
            <th>{{__('models/clients.fields.nationality_id')}}</th>
            <th colspan="3">{{__('crud.action')}}</t    h>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{!! $user->name !!}</td>
                <td>{!! $user->email !!}</td>
                <td>{!! $user->phone !!}</td>
                <td>{!! $user->commercial_number !!}</td>
                <td>{!! $user->nationality_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['admin.clients.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('admin.clients.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('admin.clients.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
