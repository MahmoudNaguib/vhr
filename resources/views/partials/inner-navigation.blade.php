@if(auth()->user()->type=='admin')
    <ul class="nav nav-pills">
        @if(auth()->user()->role_id==1)
            <li class="nav-item">
                <a class="nav-link {{(request()->is('admin/roles*'))?"active":""}}" aria-current="page" href="admin/roles">{{trans('app.Roles')}}</a>
            </li>
        @endif
        @if(can('create-countries') || can('view-countries'))
            <li class="nav-item">
                <a class="nav-link {{(request()->is('admin/countries*'))?"active":""}}" aria-current="page"
                   href="admin/countries">{{trans('app.Countries')}}</a>
            </li>
        @endif
        @if(can('create-industries') || can('view-industries'))
            <li class="nav-item">
                <a class="nav-link {{(request()->is('admin/industries*'))?"active":""}}" aria-current="page"
                   href="admin/industries">{{trans('app.Industries')}}</a>
            </li>
        @endif
    </ul>
@endif
