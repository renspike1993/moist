@extends('main')


@section('title','Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <!-- <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
            <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
            <input type="month" class="form-control">
        </div> -->
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
            <h6 class="card-title">Daily Requests</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>

                            <th>Dates</th>
                            <th style="text-align:center">For Signature</th>
                            <th style="text-align:center">On Proccess</th>
                            <th style="text-align:center">Checking</th>
                            <th style="text-align:center">Ready-to-pick-up</th>
                            <th style="text-align:center">Claimed</th>
                            <!-- <th>Total Amount</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requests as $s)
                        <tr>
                            <td>{{ date('F j, Y - D', strtotime($s->or_date)) }}</td>
                            <td style="text-align:center">
                                @if($s->for_signature>0)
                                <a href="{{ route('get_request_by_status',['date'=>$s->or_date,'status'=>1]) }}">{{ $s->for_signature }}</a>
                                @else
                                0
                                @endif
                            </td>
                            <td style="text-align:center">
                                @if($s->on_process>0)
                                <a href="{{ route('get_request_by_status',['date'=>$s->or_date,'status'=>2]) }}">{{ $s->on_process }}</a>
                                @else
                                0
                                @endif
                            </td>
                            <td style="text-align:center">
                                @if($s->checking_verification>0)
                                <a href="{{ route('get_request_by_status',['date'=>$s->or_date,'status'=>3]) }}">{{ $s->checking_verification }}</a>
                                @else
                                0
                                @endif
                            </td>
                            <td style="text-align:center">
                                @if($s->ready_to_pick_up>0)
                                <a href="{{ route('get_request_by_status',['date'=>$s->or_date,'status'=>4]) }}">{{ $s->ready_to_pick_up  }}</a>
                                @else
                                0
                                @endif
                            </td>
                            <td style="text-align:center">
                                {{$s->claimed}} / {{($s->for_signature+$s->on_process+$s->checking_verification+$s->ready_to_pick_up) }}
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection