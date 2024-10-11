@extends('main')


@section('title','Dashboard')

@section('content')



<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <form action="{{ route('update_request_status') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="card-title">Transaction Lists</h6>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <input type="submit" name="button" class="btn btn-secondary" value="Reset">
                        <input type="submit" name="button" class="btn btn-primary" value="Processing">
                        <input type="submit" name="button" class="btn btn-warning" value="Checking">
                        <input type="submit" name="button" class="btn btn-danger" value="Releasing">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th style="text-align:left">Document Type</th>
                                <th style="text-align:left">Purpose</th>
                                <th style="text-align:left">Copies</th>
                                <th style="text-align:left">Release Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            use Carbon\Carbon;
                            @endphp
                            @foreach($requests as $req)
                            <tr>
                                <td><input type="checkbox" name="reqs[]" value="{{ $req->req_id }}"></td>
                                <td>{{ $req->lname }}, {{ $req->fname }}</td>
                                <td style="text-align:left">{{ $req->name }}</td>
                                <td style="text-align:left">{{ $req->purpose }}</td>
                                <td style="text-align:left">{{ $req->copies }}</a> </td>
                                <td style="text-align:left">
                                    @php
                                    $date = Carbon::create($req->or_date);
                                    $formattedDate = $date->addDays($req->duration)->format('F j, Y'); // Adds 3 days and formats the date
                                    @endphp
                                    {{ $formattedDate }}
                                </td>
                                <td style="text-align:center"></td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection