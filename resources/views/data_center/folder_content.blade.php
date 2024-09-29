@extends('main')


@section('title','Folder Content')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="card-title">{{ $folder->folder_name }}</h6>

                    <a href="{{ route('get_folder_student', ['id' => $folder->id ]) }}" class="btn btn-primary">Add Student</a>
                </div>

                <div class="table-responsive mt-3">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Folder Name</th>
                                <th>Course</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->lname }}</td>
                                <td>{{ $student->course }}</td>
                                <td>
                                    <a href="" class="btn btn-outline-primary">Requirements</a>
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