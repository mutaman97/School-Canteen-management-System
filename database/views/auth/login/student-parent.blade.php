
{{--                        <div class="form-group row">--}}
{{--                            <label for="student_id" class="col-sm-4 col-form-label text-md-right">{{ __('Student ID') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="student_id" type="text" class="form-control{{ $errors->has('student_id') ? ' is-invalid' : '' }}" name="student_id" value="{{ old('student_id') }}" required autofocus>--}}

{{--                                @if ($errors->has('student_id'))--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $errors->first('student_id') }}</strong>--}}
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
        <form method="POST" id="ajaxform" class="needs-validation" action="{{ route('student.login') }}">
            @csrf
{{--            <div class="form-group">--}}
{{--                <label for="student_id">{{ __('Student ID') }}</label>--}}
{{--                <input id="student_id" type="text" class="form-control {{ $errors->has('student_id') ? 'is-invalid' : '' }}" name="student_id" value="{{ old('student_id') }}--}}
{{--                        @if ($errors->has('student_id'))--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $errors->first('student_id') }}</strong>--}}
{{--                            </span>--}}
{{--                        @endif--}}




            <div class="form-group">
                <label for="student_id">{{ __('Student ID') }}</label>

                    <input id="student_id" type="text" class="form-control{{ $errors->has('student_id') ? ' is-invalid' : '' }}" name="student_id" value="{{ old('student_id') }}" required autofocus>

                    @if ($errors->has('student_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('student_id') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">{{ __('Password') }}</label>
                    @if (Route::has('password.request'))
                        <div class="float-right">
                            <a href="{{ route('password.request') }}" class="text-small">
                                {{ __('Forgot Password?') }}
                            </a>
                        </div>
                    @endif
                </div>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        {{ __('Login') }}
                    </button>
                </div>
        </form>
        <div class="simple-footer">
            {{ __('Copyright') }} &copy; {{ Config::get('app.name') }} {{ date('Y') }}
        </div>
    </div>
@endsection

