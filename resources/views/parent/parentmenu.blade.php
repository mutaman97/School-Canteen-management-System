{{--<li class="menu-header">{{ __('Dashboard') }}</li>--}}
{{--<li class="{{ Request::is('parent/dashboard') ? 'active' : '' }}">--}}
{{--    <a class="nav-link" href="{{ route('parent.dashboard') }}">--}}
{{--        <i class="fas fa-tachometer-alt"></i>--}}
{{--        <span>{{ __('Dashboard') }}</span>--}}
{{--    </a>--}}
{{--</li>--}}

<li class="menu-header">{{ __('Students') }}</li>

<li class="{{ Request::is('parent/fund/history/list') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('parent.student.payment') }}">
        <i class="fas fa-user-graduate"></i>
        <span>{{ __('Students') }}</span>
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
<li class="{{ Request::is('/parent/report') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('parent.report.index') }}">
        <i class="fas fa-chart-bar"></i>
        <span>{{ __('Payment Report') }}</span>
    </a>
</li>
