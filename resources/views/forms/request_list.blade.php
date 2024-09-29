@extends('main')

@section('title','Requests')


@section('content')


<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Students Lists</h6>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Tracking No.</th>
                                <th>Contact No.</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->lname }},{{ $transaction->fname }}</td>
                                <td>{{ $transaction->tracking_no }}</td>
                                <td>{{ $transaction->contact }}</td>
                                <td>
                                    <a href="{{ route('get_requests', ['id' => $transaction->trans_id ]) }}" class="btn btn-outline-primary">View Request</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection