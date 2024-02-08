{{--<li class="menu-header">{{ __('Dashboard') }}</li>--}}
{{--<li class="{{ Request::is('parent/dashboard') ? 'active' : '' }}">--}}
{{--    <a class="nav-link" href="{{ route('parent.dashboard') }}">--}}
{{--        <i class="fas fa-tachometer-alt"></i>--}}
{{--        <span>{{ __('Dashboard') }}</span>--}}
{{--    </a>--}}
{{--</li>--}}

<li class="menu-header">{{ __('Cards') }}</li>

<li class="{{ Request::is('user') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('user.payment') }}">
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
<li class="{{ Request::is('user/report/*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('user.report.index') }}">
        <i class="fas fa-chart-bar"></i>
        <span>{{ __('Payment Report') }}</span>
    </a>
</li>

<li class="menu-header">{{ __('Profile') }}</li>
<li class="{{ Request::is('user/profile') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('user.myprofile') }}">
        <i class="fas fa-user-alt"></i>
        <span>{{ __('Change Password') }}</span>
    </a>
</li>
<li class="{{ Request::is('user/report/*') ? 'active' : '' }}">
{{--    <a class="nav-link" href="{{ route('user.logout') }}">--}}
{{--        <i class="fas fa-door-open"></i>--}}
{{--        <span>{{ __('Logout') }}</span>--}}
{{--    </a>--}}
    <a href="{{ route('user.logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="nav-link">
        <i class="fas fa-sign-out-alt"></i>
        <span>{{ __('Logout') }}</span>
    </a>
    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</li>
