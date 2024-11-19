@extends('main')

@section('title', 'Clearance TOR Form')

@section('content')
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <center>
                    <h1 class="card-title">Clearance For T.O.R</h1>
                </center>
                <form action="{{ route('tor.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Full Name</label>
                                <input type="text" class="form-control" placeholder="Enter Fullname" name="fullname" value="{{ $tor->fullname }}" readonly>
                            </div>
                        </div><!-- Col -->

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Course</label>
                                <input type="text" class="form-control" placeholder="Enter Course" name="course" value="{{ $tor->course }}" readonly>
                            </div>
                        </div><!-- Col -->

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Year Graduated</label>
                                <select name="graduated_year" class="form-control" disabled>
                                    <option value="{{ $tor->graduated_year }}">{{ $tor->graduated_year }}</option>
                                </select>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" {{ $tor->attaintment == 'elem-hs' ? 'checked' : '' }} name="optionsRadios5" id="optionsRadios5" value="option5">
                                        Elem / High School
                                        <i class="input-frame"></i></label>
                                </div>
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" {{ $tor->attaintment == 'Vocational' ? 'checked' : '' }} name="optionsRadios5" id="optionsRadios5" value="option5">
                                        Elem / High School
                                        <i class="input-frame"></i></label>
                                </div>
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" {{ $tor->attaintment == 'Undergraduate' ? 'checked' : '' }} name="optionsRadios5" id="optionsRadios5" value="option5">
                                        Elem / High School
                                        <i class="input-frame"></i></label>
                                </div>
                            </div>
                        </div><!-- Col -->

                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" {{ $tor->attaintment == 'graduate' ? 'checked' : '' }} name="optionsRadios5" id="optionsRadios5" value="option5" {{ $tor->attaintment == 'undergraduate' ? 'checked' : '' }}>
                                        Graduate
                                        <i class="input-frame"></i></label>
                                </div>
                            </div>
                        </div><!-- Col -->

                    </div><!-- Row -->
                    <h6>Credentials Requested</h6>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" {{ $tor->diploma == 1 ? 'checked' : '' }} class="form-check-input">
                                        Diploma
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" disabled class="form-check-input">
                                        Form 137
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" {{ $tor->transcriptofrecord == 1 ? 'checked' : '' }} class="form-check-input">
                                        Transcript of Record
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" {{ $tor->honorabledismissal == 1 ? 'checked' : '' }} class="form-check-input">
                                        Honorable Dismissal
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" {{ $tor->correctionofname == 1 ? 'checked' : '' }} class="form-check-input">
                                        Correction of Name
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" {{ $tor->lostcor == 1 ? 'checked' : '' }} class="form-check-input">
                                        Lost C.O.R
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" {{ $tor->extractso == 1 ? 'checked' : '' }} class="form-check-input">
                                        Extract Copy of S.O
                                        <i class="input-frame"></i></label>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------------- -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Authentication
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" disabled class="form-check-input">
                                        CAV Certification
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        DFA
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        CHED
                                        <i class="input-frame"></i></label>
                                </div>
                            </div>
                        </div>
                        <!-- ------------ -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        General Average
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" disabled class="form-check-input">
                                        Subject Enrolled
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        English as a Medium of Inst'n
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Graduated
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Earned units
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Subject with grades
                                        <i class="input-frame"></i></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6>Purpose</h6>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" {{ $tor->foremployment == 1 ? 'checked' : '' }} class="form-check-input">
                                        For Employment
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" {{ $tor->forapprenticeship == 1 ? 'checked' : '' }} class="form-check-input">
                                        For Apprenticeship
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" {{ $tor->forevaluation == 1 ? 'checked' : '' }} class="form-check-input">
                                        For Evaluation
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" {{ $tor->forscholarship == 1 ? 'checked' : '' }} class="form-check-input">
                                        For Scholarship
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" {{ $tor->forboardexam == 1 ? 'checked' : '' }} class="form-check-input">
                                        For Board Exam
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" {{ $tor->forfile == 1 ? 'checked' : '' }} class="form-check-input">
                                        For File
                                        <i class="input-frame"></i></label>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Religion</label>
                                <select name="" id="" class="form-control">
                                    <option value="{{ $tor->date_requested }}">{{ $tor->religion }}</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Amount :</label>
                                <input type="number" class="form-control" placeholder="0.0">
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">OR Number</label>
                                <input type="text" class="form-control" placeholder="5 digit">
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Payment Date</label>
                                <input type="date" class="form-control">
                            </div>
                        </div><!-- Col -->

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Date of Release</label>
                                <input type="date" class="form-control" name="date_requested" value="{{ $tor->date_requested }}">
                            </div>
                        </div><!-- Col -->

                    </div><!-- Row -->


                    <button class="btn btn-warning" type="submit">Update</button>
                    <a class="btn btn-danger" type="button">Delete</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection