@extends('layouts.app')

@section('navigation')
    @include('navigation.parent')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Parent Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in {{ Auth::guard('studentparent')->user()->parent_code }}!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
