<div class="footer">
    <div class="container">
        <div class="text-center">
            {{ trans('app.Copyright') }} {{ date('Y') }} &copy; {{ trans('app.All Rights Reserved') }}
            {{ conf('app_name') }}
            <ul class="social-links">
                <li>
                    <a href="{{(conf('facebook'))?:'#'}}" target="_blank" class="nav-link">
                        <i class="fab fa-1x fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="{{(conf('twitter'))?:'#'}}" target="_blank" class="nav-link">
                        <i class="fab fa-1x fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="{{(conf('linkedin'))?:'#'}}" target="_blank" class="nav-link">
                        <i class="fab fa-1x fa-linkedin"></i>
                    </a>
                </li>
                <li>
                    <a href="{{(conf('youtube'))?:'#'}}" target="_blank" class="nav-link">
                        <i class="fab fa-1x fa-youtube"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
