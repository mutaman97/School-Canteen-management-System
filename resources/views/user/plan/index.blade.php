@extends('layouts.backend.teacherapp')

@section('title',__('Recharge User Card'))

@section('head')
    @include('layouts.backend.partials.headersection',['title'=>__('Recharge User Card')])
@endsection

@section('content')
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
                        <img alt="image" src="{{ __('https://ui-avatars.com/api/') . $student->student_name }}" class="img-fluid" width="200" height="200">
                        <div class="user-details">
                            <div class="h4 ">{{ $student->student_name }}</div>

                        </div>
                    </div>
                    <div class="py-2">
                        <div class="h6 text-center">{{__('Balance')}}</div>
                        <div class="h3 text-primary">{{ $student->balance }}&nbsp;{{ __('AED') }}</div>
                    </div>
                    <div class="pricing-details">
                        <div class="h6 text-center">{{__('Card Number')}}</div>
                        <div class="h3 text-center">{{__($student->card_no)}}</div>
                    </div>
                </div>
                <div class="pricing-cta">
                    <a href="{{ route('user.depo', ['student' => $student->id]) }}">{{ __('Recharge') }}<i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    @empty
            <p>No Data Found</p>
    @endforelse

</div>
@endsection
