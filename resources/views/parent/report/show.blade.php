@extends('layouts.backend.parentapp')

@section('title', __('Payment Report'))

@section('head')
@include('layouts.backend.partials.headersection',['title'=>__('Payment Report')])
@endsection
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/reportshow.css') }}">
@endpush
@section('content')
<div class="container">
    <div class="invoice" id="printableArea">
        <div class="row">
            <div class="col-7">
                <h4 class="display-5">{{__('Payment Number: ')}}{{ $data->id }}</h4>
            </div>
            <div class="col-5">
                <h4 class="document-type display-5 text-right">{{ config('app.name') }}</h4>
                <p class="text-right"><strong>Today Date : {{ \Carbon\Carbon::now()->format('d M Y') }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <address>
                    <strong>{{ __('Billed To:') }}</strong><br>
                    {{ $student->student_parent }}<br>
                    {{ $student->email }}<br>
                    {{ $student->mobile ?? null }}<br>
                </address>
            </div>
            <div class="col-md-6 text-md-right">
                <address>
                    <strong>{{ __('Payment Date') }}</strong><br>
                    {{ $data->created_at->format('d M Y') }}<br>
                </address>
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Description') }}</th>
                </tr>
{{--                <tr>--}}
{{--                    <td>{{ __('Plan') }}</td>--}}
{{--                    <td>{{ $data->plan->name ?? 'null' }}</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>{{ __('Expire At') }}</td>--}}
{{--                    <td>{{ \Carbon\Carbon::parse($data->will_expire)->isoFormat('LL') ?? 'null' }}</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>{{ __('Gateway Method Name') }}</td>--}}
{{--                    <td>{{ $data->getway->name ?? 'null' }}</td>--}}
{{--                </tr>--}}

                <tr>
                    <td>{{ __('Name') }}</td>
                    <td>{{ $student->student_name }}</td>
                </tr>
                <tr>
                    <td>{{ __('Amount Charged') }}</td>
                    <td>{{ $data->balance . __(' AED')}}</td>
                </tr>
                <tr>
                    <td>{{ __('Balace Before') }}</td>
                    <td>{{ $data->balance_before . __(' AED')}}</td>
                </tr>
                <tr>
                    <td>{{ __('Balance After') }}</td>
                    <td>{{ $data->balance_after . __(' AED') }}</td>
                </tr>
{{--                @if(!empty($data->ordermeta))--}}
{{--                @php--}}
{{--                $comments=json_decode($data->ordermeta->value);--}}

{{--                @endphp--}}
{{--                <tr>--}}
{{--                    <td>{{ __('Attachment') }}</td>--}}
{{--                    <td><a href="{{ asset($comments->screenshot) }}" target="_blank">View</a></td>--}}

{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>{{ __('Comment') }}</td>--}}
{{--                    <td>{{ $comments->comment }}</td>--}}
{{--                </tr>--}}
{{--                @endif--}}
{{--                <tr>--}}
{{--                    <td>{{ __('Status') }}</td>--}}
{{--                    <td>--}}
{{--                        @if ($data->status == 1)--}}
{{--                        <span>{{ __('Active') }}</span>--}}
{{--                        @elseif($data->status == 2)--}}
{{--                        <span>{{ __('Pending') }}</span>--}}
{{--                        @else--}}
{{--                        <span>{{ __('Deactive') }}</span>--}}
{{--                        @endif--}}
{{--                    </td>--}}
{{--                </tr>--}}
            </tbody>
        </table>
    </div>

    <a href="{{ route('parent.payment-invoice', $data->id) }}">
        <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-download"></i>
            {{ __('Download') }}
        </button>
    </a>

    <button class="btn btn-warning btn-icon icon-left printableArea"><i class="fas fa-print"></i>
        {{ __('Print') }}
    </button>
</div>
@endsection

@push('script')
<script src="{{ asset('admin/js/reportshow.js?v=1') }}"></script>
@endpush
