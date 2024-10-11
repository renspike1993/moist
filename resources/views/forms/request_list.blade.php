@extends('main')

@section('title','Requests')


@section('content')


<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="card-title">Transaction Lists</h6>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Add Transaction
                    </button>
                </div>
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


<div class="example">
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form action="{{ route('store_transaction') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="course">Students</label>
                                <select name="student_id" class="form-control" required>
                                    <option disabled selected>Select Student</option>
                                    @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->lname }}, {{ $student->fname }} {{ $student->midname }} - {{ $student->course }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





@endsection