@extends('layouts.backend.parentapp')

@section('title',__('Recharge Student Card'))

@section('head')
    @include('layouts.backend.partials.headersection',['title'=>__('Recharge Card')])
@endsection

@section('content')

    <style>
        @keyframes blink {
            50% {
                opacity: 0;
            }
        }

        .blinking {
            animation: blink 1s infinite;
        }
    </style>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Add Fund To Card') }}</h4>
                </div>
{{--                @if (Session::has('message'))--}}
{{--                    <div class="alert alert-{{ Session::get('type') ?? '' }}">--}}
{{--                        {{ Session::get('message') }}--}}
{{--                    </div>--}}
{{--                @endif--}}
                <div class="form-divider"></div>
                <div class="card-body">
                    <div class="current-banlencee text-center mb-4">
                        <p class="h4">
                            {{ __('Add Fund To:') }} <span class="text-primary font-weight-600">{{ $student->student_name }}</span>
                        </p>
                    </div>
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <div class="form-group row">

                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Enter Amount') }}</label>
                            <div class="input-group col-sm-12 col-md-7 col-lg-6 pl-3">
                                {{-- <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                                </div> --}}
{{--                                <input id="amount" type="number" placeholder="{{ __('Enter amount here ...') }}" required="" step="any" class="form-control border-dark shadow" name="amount">--}}
                                <input id="amount" type="number" placeholder="{{ __('Enter amount here in AED ...') }}" required="" step="any" class="form-control shadow" name="amount" min="100">

                                <div class="input-group-append shadow-lg">
{{--                                    <span class="input-group-text border-dark shadow">{{ __('AED') }}</span>--}}
                                    <button type="submit" class="btn btn-primary">{{ __('Pay Now') }}</button>
                                </div>
                            </div>

                            <input type="hidden" id="deductionAmount" name="deductionAmount">
                            <div class="text-center text-success font-weight-bold  mx-auto pt-3 blink col-12" id="deduction_result"></div>
                            <div class="text-center text-danger font-weight-bold  mx-auto pt-3 blink col-12" id="deduction_result2"></div>

                            <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></div>
                            <div class="col-sm-12 col-md-7">
                                <div class="custom-control custom-checkbox col-form-label">
                                    <input required="" type="checkbox" name="agree" class="custom-control-input" id="agree">
                                    <label class="custom-control-label" for="agree">{{ __('I agree with') }} <a href="https://stripe.com/ae/privacy" target="_blank">{{ __('Stripe Privacy Policy') }}</a></label>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="card_no" value="{{ $student->card_no }}">



{{--                        <div class="form-group row mb-4">--}}
{{--                            <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></div>--}}
{{--                            <div class="col-sm-12 col-md-7">--}}
{{--                                <div class="buton-btn float-right">--}}
{{--                                    <button type="submit" class="btn btn-primary btn-lg shadow">{{ __('Next') }}</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </form>
                </div>






{{--                <!-- Add CSRF token in your HTML form -->--}}
{{--                <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--                <!-- Your HTML form -->--}}
{{--                <label for="amountInput">Enter Amount:</label>--}}
{{--                <input type="number" id="amountInput" placeholder="Enter amount" step="any" />--}}

{{--                <button id="calculateFeeBtn">Calculate Fee</button>--}}
{{--                <div id="feeResult"></div>--}}

                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#amount').on('input', function (){
                            var amount = parseFloat($(this).val());
                            if (!isNaN(amount) && amount >= 100) {
                                var deducted_amount = (amount - (amount * 0.029) - 1 );

                                // var deducted_amount =(amount+1)/.971;
                                $('#deduction_result').text("Note: The amount will be added to the card is, " + deducted_amount.toFixed(2) + " AED");
                                $('#deductionAmount').val(deducted_amount.toFixed(2));
                                $('#deduction_result2').hide();
                                $('#deduction_result').show();
                            }
                            else {
                                // $('#sss
                                $('#deduction_result').hide();
                                $('#deduction_result2').show();
                                $('#deduction_result2').text("The amount should be greater than or equal to 100");
                                $('#deductionAmount').val("");
                            }
                        });
                    });
                </script>









            </div>
        </div>
    </div>

@endsection
