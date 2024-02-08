<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}">{{ Config::get('app.name') }}</a>
        </div>


        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('login') }}">{{ env('APP_NAME') }}</a>
        </div>
        <ul class="sidebar-menu">

            @include('user.usermenu')

        </ul>
    </aside>
</div>
