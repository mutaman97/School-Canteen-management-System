<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}">{{ Config::get('app.name') }}</a>
        </div>


        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('login') }}">{{ Str::limit(env('APP_NAME'), $limit = 1) }}</a>
        </div>
        <ul class="sidebar-menu">

              @include('merchant.merchantmenu')

        </ul>
    </aside>
</div>
