<li class="menu-header">{{ __('Dashboard') }}</li>
<li class="{{ Request::is('partner/dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('merchant.dashboard') }}">
        <i class="fas fa-tachometer-alt"></i>
        <span>{{ __('Dashboard') }}</span>
    </a>
</li>
<li class="menu-header">{{ __('Students') }}</li>

<li class="{{ Request::is('partner/fund/history/list') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('merchant.login.payment') }}">
        <i class="fas fa-user-graduate"></i>
        <span>{{ __('Students') }}</span>
    </a>
</li>

<li class="menu-header">{{ __('Payments History') }}</li>
<li class="{{ Request::is('report') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('merchant.report.index') }}">
        <i class="fas fa-chart-bar"></i>
        <span>{{ __('Payment Report') }}</span>
    </a>
</li>
