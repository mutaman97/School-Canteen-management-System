<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | {{ Request::segment(2) ?? 'Dashboard' }}</title>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .cancel-wrapper {
            max-width: 550px;
            margin-inline: auto;
            -webkit-box-shadow: 0 0 20px #f3f3f3;
            box-shadow: 0 0 20px #f3f3f3;
            padding: 30px 20px;
            background-color: #fff;
            border-radius: 10px;
        }

        .cancel-contents.center-text .cancel-contents-icon {
            margin-inline: auto;
        }
        .cancel-contents-icon {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            height: 100px;
            width: 100px;
            background-color: #dc3545;
            color: #fff;
            font-size: 50px;
            border-radius: 50%;
            margin-bottom: 30px;
        }
        .cancel-contents-title {
            font-size: 32px;
            line-height: 36px;
            margin: -6px 0 0;
        }
        .cancel-contents-para {
            font-size: 16px;
            line-height: 24px;
            margin-top: 15px;
        }
        .btn-wrapper {
            display: block;
        }
        .cmn-btn.btn-bg-1 {
            background: #7952B3;
            color: #fff;
            border: 2px solid transparent;
            border-radius:3px;
            text-decoration: none;
            padding:5px;
        }
    </style>
</head>

<body>

<!-- Cancel area start -->
<div class="cancel-area text-center mt-5">
    <div class="container">
        <div class="cancel-wrapper">
            <div class="cancel-contents center-text">
                <div class="cancel-contents-icon">
                    <i class="fas fa-times"></i>
                </div>
                <h4 class="cancel-contents-title">{{ __('Transaction Canceled') }}</h4>
                <div class="btn-wrapper mt-4">
                    <a href="{{ route('parent.student.payment') }}" class="cmn-btn btn-bg-1">{{ __('Go to Home') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cancel area end -->

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
