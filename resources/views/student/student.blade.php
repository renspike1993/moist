@extends('main')

@section('title','Students')

@section('content')

<!-- Loading spinner -->
<div id="loading" class="row justify-content-center">
    <div class="col-md-3">
        <div class="text-center">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <p>Loading students, please wait...</p>
        </div>
    </div>
</div>

<!-- Student list (hidden by default) -->
<div id="student-table" class="row" style="display:none;">
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

@section('scripts')
<script>
    // Once the document is fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Hide the loading spinner
        document.getElementById('loading').style.display = 'none';

        // Show the student table
        document.getElementById('student-table').style.display = 'block';
    });
</script>
@endsection