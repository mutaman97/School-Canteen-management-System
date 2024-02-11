@extends('layouts.backend.parentapp')

@section('title',__('Recharge Card'))

@section('head')
    @include('layouts.backend.partials.headersection',['title'=>__('Recharge Card')])
@endsection

@section('content')
    <style>
        body {
            background-color: #fff;
            font-size: 14px;
            font-weight: 400;
            font-family: "Nunito", "Segoe UI", arial;
            /* font-family: "Nunito", "Nunito Arabic", "Segoe UI", Arial, sans-serif; */
            /* font-family: 'Tajawal', sans serif; */
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;

            color: #6c757d; }
        .pricing .pricing-padding {
            padding: 10px; }

        .pricing .pricing-cta {
            margin-top: 0px; }

        /*.main-footer {*/
        /*    padding: 20px 30px 20px 280px;*/
        /*    margin-top: 0px;*/
        /*    color: #98a6ad;*/
        /*    background-color: #7952B3;*/
        /*    border-top: 1px solid #e3eaef;*/
        /*    display: inline-block;*/
        /*    width: 100%;*/
        /*}*/
    </style>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        @if (Session::has('message'))
            <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('message') }}</div>
        @endif
    </div>

    @forelse ($students ?? [] as $student)
        <div class="col-12 col-md-4 col-lg-3">
            {{-- <div class="pricing {{ $plan->is_featured ? 'pricing-highlight' : '' }}"> --}}
            <div class="pricing pricing-highlight shadow-lg">
                <div class="pricing-padding">
                    <div class="user-item">
                        <img alt="image" src="{{ __('https://ui-avatars.com/api/') . $student->student_name }}" class="img-fluid" width="180" height="180">
                        <div class="user-details">
                            <div class="h5 ">{{ $student->student_name }}</div>
                        </div>
                    </div>
                    <div class="py-1">
                        <div class="h7 text-center">{{__('Balance')}}</div>
                        <div class="h4 text-primary">{{ $student->balance }}&nbsp;{{ __('AED') }}</div>
                    </div>
                    <div class="pricing-details">
                        <div class="h7 text-center">{{__('Card Number')}}</div>
                        <div class="h4 text-center pt-1">{{__($student->card_no)}}</div>
                    </div>
                </div>
                <div class="pricing-cta">
                    <a href="{{ route('parent.depo', ['student' => $student->id]) }}">{{ __('Recharge') }}<i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    @empty
            <p>{{ __('No Data Found') }}</p>
    @endforelse

</div>
@endsection
