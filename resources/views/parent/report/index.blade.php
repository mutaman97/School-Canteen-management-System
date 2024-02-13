@extends('layouts.backend.parentapp')

@section('title', __('Payments Report'))

@section('head')
    @include('layouts.backend.partials.headersection', ['title'=>__('Payments Report')])
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-6">
                            <form action="{{ route('parent.report.index') }}" type="get">
                                <div class="form-row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>{{ __('Start Date') }}</label>
                                            <input type="date" class="form-control" name="start_date">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>{{ __('End Date') }}</label>
                                            <input type="date" class="form-control" name="end_date">
                                        </div>
                                        </div>
                                    <div class="col-lg-2 mt-2">
                                        <button type="submit" class="btn btn-primary mt-4"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-6 mt-2">
                            <form action="{{ route('parent.report.index') }}" type="get">
                                <div class="input-group form-row mt-3">
                                    <input type="text" class="form-control" placeholder="{{__('Search ...')}}" required=""
                                        name="value" autocomplete="off" value="">
                                    <select class="form-control" name="type">
                                        <option value="amount">{{ __('Amount') }}</option>
{{--                                        <option value="student_name">{{ __('Student Name') }}</option>--}}
                                        <option value="card_no">{{ __('Card Number') }}</option>
{{--                                        <option value="plan">{{ __('plan') }}</option>--}}
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="buttons">

                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="table-2">
                            <thead>
                                <tr>
                                    <th>{{ __('SL.') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Card Number') }}</th>
                                    <th>{{ __('Charge Amount') }}</th>

                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
{{--                                @php--}}
{{--                                    $i = ($data->currentpage() - 1) * $data->perpage() + 1;--}}
{{--                                @endphp--}}
                                @forelse($data as $key =>$value)
                                    @php
                                        $student = \App\Models\Student::where('card_no', $value->card_no)->firstOrFail();
                                        $name = $student->student_name;
                                    @endphp
                                <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $name ?? 'null' }}</td>

                                    <td>{{ $value->card_no ?? 'null' }}</td>

                                    <td>{{ $value->balance ?? 'null' }} {{__('AED')}}</td>

                                        <td>{{ $value->created_at->format('d M Y') ?? 'null' }}</td>

                                        <td>
                                            <a class="btn btn-sm btn-outline-primary" href="{{ route('parent.report.show', $value->id) }}" data-toggle="tooltip" title="{{ __('View') }}"><i class="fas fa-eye"></i> {{ __('View Details') }}</a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        {{--{{ $data->links('vendor.pagination.bootstrap-4') }}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
