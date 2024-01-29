<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link collapse_btn nav-link-lg"><i class="fas fa-bars"></i></a></li>

    </ul>
    <div class="search-element"></div>
  </form>

{{--    @php--}}
{{--        $active_languages = json_decode(json_encode(get_option('active_languages', true)), true);--}}
{{--    @endphp--}}
{{--    @if(count($active_languages) > 1)--}}
{{--        <select name="language" class="selectric form-control-sm align-right mx-2" id="language">--}}
{{--            @foreach ($active_languages as $key => $language)--}}
{{--                <option class="dropdown-item has-icon" {{ App::currentLocale() == $key ? 'selected' : '' }} value="{{ $key }}">{{ __($language) }}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    @endif--}}

  <ul class="navbar-nav navbar-right">


    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">

      <img alt="image" src="{{ gravatar(Auth::user()->email ?? 'email@gmail.com') }}"
      class="rounded-circle profile-widget-picture ">

      <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name ?? '' }}</div></a>
      <div class="dropdown-menu dropdown-menu-right">
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
      </a>
      <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </div>
  </li>
</ul>
</nav>
