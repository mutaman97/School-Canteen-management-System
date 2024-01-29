@extends('layouts.backend.app')

@section('title',__('Recharge Student Card'))

@section('head')
    @include('layouts.backend.partials.headersection',['title'=>__('Recharge Student Card')])
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Add Money To Student Card') }}</h4>
                </div>
{{--                @if (Session::has('message'))--}}
{{--                    <div class="alert alert-{{ Session::get('type') ?? '' }}">--}}
{{--                        {{ Session::get('message') }}--}}
{{--                    </div>--}}
{{--                @endif--}}
                <div class="form-divider"></div>
                <div class="card-body">
                    <div class="current-banlence text-center mb-4">
                        <p class="h4" class="text-dark">{{ __('Add Balance To Card') }}</p>
{{--                        <h4 class="text-primary">{{ __('AED') }}&nbsp;{{ number_format(205132, 2) ?? 0 }}</h4>--}}
                    </div>
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Enter Amount') }}</label>
                            <div class="input-group col-sm-12 col-md-7">
                                {{-- <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                                </div> --}}
                                <input type="number" required="" step="any" class="form-control" name="amount">
                                <div class="input-group-append">
                                    <span class="input-group-text">{{ __('AED') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></div>
                            <div class="col-sm-12 col-md-7">
                                <div class="buton-btn float-right">
                                    <button type="submit" class="btn btn-primary btn-lg">{{ __('Next') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
