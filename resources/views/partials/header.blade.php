<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="{{app()->make("url")->to('/')}}" class="navbar-brand">
            <img src="uploads/small/{{conf('logo')}}" height="40" alt="{{conf('app_name')}}" class="d-inline-block align-middle mr-2">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{app()->make("url")->to('/')}}" class="nav-link {{(request()->is('/'))?'active':''}}">
                        {{trans('app.Home')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="about" class="nav-link {{(request()->is('/about'))?'active':''}}">
                        {{trans('app.About')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contact" class="nav-link {{(request()->is('/contact'))?'active':''}}">
                        {{trans('app.Contact us')}}
                    </a>
                </li>
                @if(auth()->guest())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{(request()->is('auth/*'))?'active':''}}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
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
                        <a class="nav-link dropdown-toggle {{(request()->is('profile/*') || request()->is('dashbard'))?'active':''}}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            {{trans('app.Welcome')}} {{auth()->user()->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if(auth()->user()->type!='admin')
                                <li>
                                    <a class="dropdown-item" href="dashboard">
                                        {{trans('app.Dashboard')}}
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a class="dropdown-item" href="profile/edit">
                                    {{trans('app.Edit account')}}
                                </a>
                            </li>
                            @if(auth()->user()->type=='recruiter' && auth()->user()->is_company_admin==1)
                                <li>
                                    <a class="dropdown-item" href="company/edit">
                                        {{trans('app.Edit company profile')}}
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a class="dropdown-item" href="profile/change-password">
                                    {{trans('app.Change password')}}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="profile/logout">
                                    {{trans('app.Logout')}}
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        @php
                            $notificationsCount=\App\Models\Notification::where('user_id',auth()->user()->id)->unreaded()->count();
                        @endphp
                        <a href="notifications" class="nav-link {{(request()->is('notifications*'))?'active':''}}" aria-current="page">
                            <i class="fa fa-bell"></i>
                            <span class="indicator">{{$notificationsCount}}</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
