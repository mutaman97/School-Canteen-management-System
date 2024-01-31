@extends('auth.main')
@section('content')
    <div class="card-header">
        <h4>{{ __('Login') }}</h4>
    </div>
    <div class="card-body">

        @if (Session::has('error'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif
        <form method="POST" id="ajaxform" class="needs-validation" action="{{ route('parent.login') }}">
            @csrf
            <div class="form-group">
                <label for="email">{{ __('Parent Code') }}</label>
                <input id="parent_code" type="text" class="form-control{{ $errors->has('parent_code') ? ' is-invalid' : '' }}" name="parent_code" value="{{ old('parent_code') }}" required autofocus>
                @if ($errors->has('parent_code'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('parent_code') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">

                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                @endif
{{--                <div class="form-group">--}}
{{--                    <div class="custom-control custom-checkbox">--}}
{{--                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me"--}}
{{--                            {{ old('remember') ? 'checked' : '' }}>--}}
{{--                        <label class="custom-control-label" for="remember-me">{{ __('Remember Me') }}</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="form-group py-4">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </form>
        <div class="simple-footer">
            {{ __('Copyright') }} &copy; {{ Config::get('app.name') }} {{ date('Y') }}
        </div>
    </div>
@endsection



{{--@extends('layouts.app')--}}

{{--@section('navigation')--}}
{{--    @include('navigation.employee')--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Parent Login') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('parent.login') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="student_id" class="col-sm-4 col-form-label text-md-right">{{ __('Parent ID') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="parent_code" type="text" class="form-control{{ $errors->has('parent_code') ? ' is-invalid' : '' }}" name="parent_code" value="{{ old('parent_code') }}" required autofocus>--}}

{{--                                @if ($errors->has('parent_code'))--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $errors->first('parent_code') }}</strong>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

{{--                                @if ($errors->has('password'))--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $errors->first('password') }}</strong>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-8 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
