@extends('main')


@section('title','Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
            <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
            <input type="month" class="form-control">
        </div>
        <button type="button" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0">
            <i class="btn-icon-prepend" data-feather="printer"></i>
            Print
        </button>
        <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
            <i class="btn-icon-prepend" data-feather="download-cloud"></i>
            Download Report
        </button>
    </div>
</div>


<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Summary as of (<?= date("F") ?> <?= date("Y") ?>)</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>

                            <th>Document Type</th>
                            <th style="text-align:center">For Signature</th>
                            <th style="text-align:center">On Proccess</th>
                            <th style="text-align:center">Check & Verify</th>
                            <th style="text-align:center">Ready-to-pick-up</th>
                            <th>Claimed</th>
                            <!-- <th>Total Amount</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($summary as $s)
                        <tr>
                            <td>{{ $s->name }}</td>
                            <td style="text-align:center"><a href="">{{ $s->for_signature }}</a></td>
                            <td  style="text-align:center"><a href="">{{ $s->on_process }}</a> </td>
                            <td  style="text-align:center"><a href="">{{ $s->checking_verification }}</a></td>
                            <td  style="text-align:center"><a href="">{{ $s->ready_to_pick_up  }}</a></td>
                            <td style="text-align:center">{{ $s->claimed }} / {{ $s->copies }}</td>
                            <!-- <td  style="text-align:center">₱ {{ number_format($s->fee, 2) }}</td>                         -->
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection