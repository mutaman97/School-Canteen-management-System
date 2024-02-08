@extends('layouts.backend.parentapp')

@section('title','Dashboard')

@section('content')
<section class="section">
	<div class="section-header">
		<h1>{{ __('Parent Dashboard') }}</h1>
	</div>
</section>

@if (session('status'))
<div class="alert alert-success">
    <div class="alert-body">
		<button class="close" data-dismiss="alert">
			<span>&times;</span>
		</button>
        {{ session('status') }}
    </div>
</div>
@endif

@if($total_active_stores == 0)

@endif
{{-- TODO --}}
{{--<!----}}
{{--<form method="POST" action="{{ route('verification.resend') }}">--}}
{{--    @csrf--}}
{{--    <button type="submit" class="btn btn-link">Resend Verification Email</button>--}}
{{--</form>--}}
{{---->--}}
<div class="row">
	<div class="col-lg-4 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-wrap float-left">
				<div class="card-header">
					<h4>{{ __('Students') }}</h4>
				</div>
				<div class="card-body">
					<span id="total_stores"><img src="{{ asset('uploads/loader.gif') }}"></span>
				</div>
			</div>
            <div class="card-icon bg-primary float-right">
				<i class="fas fa-user-friends"></i>
			</div>
		</div>
	</div>

	<div class="col-lg-4 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-wrap float-left">
				<div class="card-header">
					<h4>{{ __('Students Total Balance') }}</h4>
				</div>
				<div class="card-body">
					<span id="fund" class="text-primary"><img src="{{ asset('uploads/loader.gif') }}"></span>
                    <span class="text-primary">{{ __('AED') }}</span>
				</div>
			</div>
            <div class="card-icon bg-primary float-right">
				<i class="fas fa-wallet"></i>
			</div>
		</div>
	</div>


	<div class="col-lg-4 col-md-6 col-sm-6 col-12">
		<div class="card card-hero">
			<div class="card-header">
				<div class="card-icon">
					<i class="fas fa-bullhorn"></i>
				</div>
				<h4 id="upcoming_count"></h4>
				<div class="card-description">{{ __('Low Balance Cards') }}</div>
			</div>
			<div class="card-body p-0">
				<div class="tickets-list">
					<div class="upcoming_renewals_html"></div>

					<a href="{{ url('/partner/domain') }}" class="ticket-item ticket-more">
						{{ __('View All') }}<i class="fas fa-chevron-right"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="base_url" value="{{ url('/') }}">
@endsection



@push('script')
<script>
    var loginConfirmation = "{{ __('Are you sure want to login with this domainbdgdg?') }}";
    var waitText = "{{ __('Please Wait') }}";
    var stockLimitExceeded = "{{ __('Opps maximum stock limit exceeded') }}";
    var productCode = "{{ __('Product Code') }}";
    var cartText = "{{ __('Add To Cart') }}";
    var stockOut = "{{ __('Out Of Stock') }}";
    var sdgText = "{{ __('SDG') }}";
</script>
<script src="{{ asset('admin/js/merchant.js') }}"></script>
<script src="{{ asset('admin/js/merchantdashboard.js') }}"></script>
@endpush

