<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>{{__('models/users.plural')}}</span></a>
</li>


<li class="{{ Request::is('admin/projects*') ? 'active' : '' }}">
    <a href="{{ route('admin.projects.index') }}"><i class="fa fa-edit"></i><span>  @lang('models/projects.plural')</span></a>
</li>

{{--<li class="{{ Request::is('admin/notes*') ? 'active' : '' }}">--}}
{{--    <a href="{{ route('admin.notes.index') }}"><i class="fa fa-edit"></i><span>@lang('models/notes.plural')</span></a>--}}
{{--</li>--}}

