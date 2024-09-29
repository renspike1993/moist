@extends('main')

@section('title','Students')


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
                                <th>Course</th>
                                <th>Student ID</th>
                                <th>Mobile No.</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $student->lname }}, {{ $student->fname }}</td>
                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->course }}</td>
                                <td>{{ $student->contact }}</td>
                                <td>{{ $student->email }}</td>
                                <td>
                                    <form action="{{ route('store_transaction') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="student_id" value="{{ $student->id }}">

                                        <button type="submit" class="btn btn-success btn-icon-text">
                                            <i class="btn-icon-prepend" data-feather="plus"></i>
                                            Request
                                        </button>
<!-- 
                                        <button type="submit" class="btn btn-success">
                                            <i class="link-icon" data-feather="plus"></i> Request
                                        </button> -->
                                    </form>

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