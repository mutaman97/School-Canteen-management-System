{{--<li class="menu-header">{{ __('Dashboard') }}</li>--}}
{{--<li class="{{ Request::is('parent/dashboard') ? 'active' : '' }}">--}}
{{--    <a class="nav-link" href="{{ route('parent.dashboard') }}">--}}
{{--        <i class="fas fa-tachometer-alt"></i>--}}
{{--        <span>{{ __('Dashboard') }}</span>--}}
{{--    </a>--}}
{{--</li>--}}

<li class="menu-header">{{ __('Cards') }}</li>

<li class="{{ Request::is('teacher') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('teacher.payment') }}">
        <i class="fas fa-credit-card"></i>
        <span>{{ __('Cards') }}</span>
    </a>
</li>


{{--<li class="menu-header">{{ __('Deposit') }}</li>--}}
{{--<li class="{{ Request::is('parent/deposit') ? 'active' : '' }}">--}}
{{--    <a class="nav-link" href="{{ route('parent.depo') }}">--}}
{{--        <i class="fas fa-money-check"></i>--}}
{{--        <span>{{ __('Deposit') }}</span>--}}
{{--    </a>--}}
{{--</li>--}}

<li class="menu-header">{{ __('Payments History') }}</li>
<li class="{{ Request::is('teacher/report/*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('teacher.report.index') }}">
        <i class="fas fa-chart-bar"></i>
        <span>{{ __('Payment Report') }}</span>
    </a>
</li>

<li class="menu-header">{{ __('Profile') }}</li>
<li class="{{ Request::is('teacher/profile') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('teacher.myprofile') }}">
        <i class="fas fa-user-alt"></i>
        <span>{{ __('Change Password') }}</span>
    </a>
</li>
<li class="{{ Request::is('teacher/report/*') ? 'active' : '' }}">
{{--    <a class="nav-link" href="{{ route('teacher.logout') }}">--}}
{{--        <i class="fas fa-door-open"></i>--}}
{{--        <span>{{ __('Logout') }}</span>--}}
{{--    </a>--}}
    <a href="{{ route('teacher.logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="nav-link">
        <i class="fas fa-sign-out-alt"></i>
        <span>{{ __('Logout') }}</span>
    </a>
    <form id="logout-form" action="{{ route('teacher.logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</li>
