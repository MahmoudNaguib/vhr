<!-- NAVBAR-->
<nav class="navbar navbar-expand-lg py-3 navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a href="#" class="navbar-brand">
            <img src="uploads/small/{{conf('logo')}}" height="40" alt="Logo" class="d-inline-block align-middle mr-2">
        </a>
        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

        <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="{{app()->make("url")->to('/')}}" class="nav-link">
                        {{trans('app.Home')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="about" class="nav-link">
                        {{trans('app.About')}}
                    </a>
                </li>
                @if(!auth()->guest())
                    @if(auth()->user()->role_id)
                        <li class="nav-item">
                            <a href="admin/roles" class="nav-link">
                                {{trans('app.Roles')}}
                            </a>
                        </li>
                    @endif
                @endif
                @if(auth()->guest())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            {{trans('app.Login')}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="auth/login">{{trans('app.Login')}}</a></li>
                            <li><a class="dropdown-item" href="auth/register">{{trans('app.Register')}}</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            {{trans('app.Welcome')}} {{auth()->user()->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="dashboard">{{trans('app.Dashboard')}}</a></li>
                            <li><a class="dropdown-item" href="profile/change-password">{{trans('app.Change password')}}</a></li>
                            <li><a class="dropdown-item" href="profile/edit">{{trans('app.Edit account')}}</a></li>
                            <li><a class="dropdown-item" href="profile/logout">{{trans('app.Logout')}}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        @php
                        $notificationsCount=\App\Models\Notification::where('user_id',auth()->user()->id)->unreaded()->count();
                        @endphp
                        <a href="notifications" class="nav-link" aria-current="page">
                            <i class="fa fa-bell"></i>
                            <span class="indicator">{{$notificationsCount}}</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>



