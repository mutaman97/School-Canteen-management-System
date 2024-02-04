
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ __('School Canteen System') }} | {{ Request::segment(2) }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/fontawesome.min.css') }}">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">

</head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                    <div class="login-brand">
                        School Canteen System
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card card-primary shadow-lg">
{{--                        <div class="card-header"><h4>Subscribe Our Newsletters</h4></div>--}}

{{--                        <div class="card-body">--}}
{{--                            <form method="POST">--}}
{{--                                <div class="form-group">--}}
{{--                                    <div class="input-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <div class="input-group-text">--}}
{{--                                                <i class="fas fa-envelope"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <input id="email" type="email" class="form-control" name="email" autofocus placeholder="Email">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="form-group text-center">--}}
{{--                                    <button type="submit" class="btn btn-lg btn-round btn-primary">--}}
{{--                                        Subscribe--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
                        <div class="card-body">
                            <div class="empty-state" data-height="500">
{{--                                <div class="empty-state-icon">--}}
{{--                                    <i class="fas fa-user"></i>--}}
{{--                                </div>--}}
                                <h2>{{ __('Login to your account!') }}</h2>
                                <p class="lead">
                                    {{ __('Here you can login to your account, as a teacher or as a parent') }}
                                </p>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('teacher.login') }}" class="btn btn-lg btn-outline-primary m-4">{{ __('Teacher Login') }}</a>
                                    <a href="{{ route('parent.login') }}" class="btn btn-lg btn-primary m-4">{{ __('Parent Login') }}</a>
                                </div>


                                {{--                                <a href="#" class="mt-4 bb">Need Help?</a>--}}
                            </div>
                        </div>
                    </div>
                    <div class="simple-footer">
                        {{ __('Powered By') }} <a href="https://aldana-computers.com/eng" class="font-weight-bold" target="_blank" rel="noopener noreferrer">{{ __('Aldana Computers') }}</a>&copy; <div class="bullet"></div>{{__('1997')}} - {{ date('Y') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- General JS Scripts -->
<script src="{{ asset('admin/assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
<script src="assets/modules/tooltip.js"></script>
<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.nicescroll.min.js') }}"></script>
<script src="assets/modules/moment.min.js"></script>
<script src="assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom.js') }}"></script>
</body>
</html>





@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
