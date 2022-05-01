@if(auth()->user() && auth()->user()->type=='admin')
    <ul class="nav nav-pills">
        @if(auth()->user()->role_id==1)
            <li class="nav-item">
                <a class="nav-link {{(request()->is('admin/roles*'))?"active":""}}" aria-current="page" href="admin/roles">{{trans('app.Roles')}}</a>
            </li>
        @endif
        @if(can('create-users') || can('view-users'))
            <li class="nav-item">
                <a class="nav-link {{(request()->is('admin/users*'))?"active":""}}" aria-current="page"
                   href="admin/users">{{trans('app.Users')}}</a>
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
        @if(can('view-companies'))
            <li class="nav-item">
                <a class="nav-link {{(request()->is('admin/companies*'))?"active":""}}" aria-current="page"
                   href="admin/companies">{{trans('app.Companies')}}</a>
            </li>
        @endif
    </ul>
@endif
