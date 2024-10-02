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
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="card-title">Students Lists</h6>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Add Student
                    </button>
                </div>
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

<div class="example">
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('store_student') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <label for="cabinet_name">Last Name</label>
                                <input type="text" name="lname" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="cabinet_name">First Name</label>
                                <input type="text" name="fname" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="cabinet_name">Middle Name</label>
                                <input type="text" name="midname" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="course">Course</label>
                                <select name="course" id="course" class="form-control" required>
                                    <option disabled selected>Select Course</option>
                                    <option value="BSBA">BSIT</option>
                                    <option value="BSBA">BSBA</option>
                                    <option value="BSCRIM">BSCRIM</option>
                                    <option value="BEED">BEED</option>
                                    <option value="BSED">BSED</option>
                                    <option value="MIDWIFERY">MIDWIFERY</option>
                                    <option value="BSHM">BSHM</option>
                                    <option value="BSMT">BSMT</option>
                                    <option value="BSOA">BSOA</option>
                                    <option value="BSTM">BSTM</option>
                                    <option value="DHST">DHST</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <h6 class="card-title">Requirements : </h6>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="pre_add_form" class="form-check-input">
                                            Pre- Admission Form
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="psa" class="form-check-input">
                                            PSA Birth Certificate
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="report_card" class="form-check-input">
                                            High School Report Card
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="good_moral" class="form-check-input">
                                            Good moral certificate
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="pic" class="form-check-input">
                                            2x2 Pictures
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="entrance_exam" class="form-check-input">
                                            Entrance Exam Result
                                            <i class="input-frame"></i></label>
                                    </div>
                                </div>
                            </div>
                            <!-- --------------  -->
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="enrollment_form" class="form-check-input">
                                            Enrollment Form
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="honorable_dismissal" class="form-check-input">
                                            Honorable Dismissal
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="permanent_record" class="form-check-input">
                                            College Permanent Record
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="form_137" class="form-check-input">
                                            Form-137/TOR (for Evaluation)
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="promissory_note" class="form-check-input">
                                            Promissory Note
                                            <i class="input-frame"></i></label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="medical_records" class="form-check-input">
                                            Medical Records
                                            <i class="input-frame"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Student</button>
                    </div>
                </form>
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