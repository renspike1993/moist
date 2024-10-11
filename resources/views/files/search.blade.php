@extends('main')


@section('title','File Locator')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="card-title">File Location</h6>
                </div>

                <div class="table-responsive mt-3">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student Name</th>
                                <th>Folder</th>
                                <th>Cabinet</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->lname }}, {{ $student->fname }} {{ $student->midname }}</td>
                                <td>{{ $student->folder_name }}</td>
                                <td>{{ $student->name }}</td>
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