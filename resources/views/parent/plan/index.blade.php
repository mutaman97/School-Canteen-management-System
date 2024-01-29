@extends('layouts.backend.parentapp')

@section('title',__('Recharge Student Card'))

@section('head')
    @include('layouts.backend.partials.headersection',['title'=>__('Recharge Student Card')])
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        @if (Session::has('message'))
            <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('message') }}</div>
        @endif
    </div>

    @forelse ($students ?? [] as $student)
        <div class="col-12 col-md-4 col-lg-4">
            {{-- <div class="pricing {{ $plan->is_featured ? 'pricing-highlight' : '' }}"> --}}
            <div class="pricing pricing-highlight">
                <div class="pricing-padding">
                    <div class="user-item">
                        <img alt="image" src="{{ url("/assets/img/avatar-1.png") }}" class="img-fluid" width="150" height="150">
                        <div class="user-details">
                            <div class="h4 ">{{ $student->student_name }}</div>

                        </div>
                    </div>
                    <div class="h3 text-primary py-4">
                        <div>{{ $student->balance }}&nbsp;{{ __('AED') }}</div>
                    </div>
                    <div class="pricing-details">
                        <div class="h6">{{__('Card Number: ' . $student->card_no)}}</div>
                    </div>
                </div>
                <div class="pricing-cta">
                    <a href="{{ route('parent.depo', ['student' => $student->id]) }}">{{ __('Recharge') }}<i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    @empty
            <p>No Students Found</p>
    @endforelse

</div>
@endsection
