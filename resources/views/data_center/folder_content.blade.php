@extends('main')


@section('title','Folder Content')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="card-title">{{ $folder->folder_name }}</h6>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Add Student
                    </button>
                </div>


                <div class="table-responsive mt-3">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Students Name</th>
                                <th>Course</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->lname }} , {{ $student->fname }} {{ $student->midname }}</td>
                                <td>{{ $student->course }}</td>
                                <td>
                                    <a href="{{ route('destroy_student', ['id' => $student->stud_id ]) }}" class="btn btn-outline-danger">X</a>
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Student to <code>({{ $folder->folder_name }})</code> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('store_student') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="folder_id" value="{{ $folder->id }}">
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