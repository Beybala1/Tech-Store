@extends('layouts.backend')

@section('content')

@section('title')
    <title>İdarə paneli</title>
@endsection

<div class="col-3 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="card-title">
                        <h5 class="text-nowrap mb-2">İstifadəçilər</h5>
                    </div>
                    <div class="mt-sm-auto">
                        <h4 class="text-success text-nowrap fw-semibold">
                            {{ $user }}
                        </h4>
                    </div>
                </div>
                <div id="profileReportChart"></div>
            </div>
        </div>
    </div>
</div>
@endsection
