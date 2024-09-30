@extends('main')

@section('title','Students')


@section('content')


<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Students Lists</h6>
                <div class="table-responsive">
                    <form action="{{ route('add_student_to_folder') }}" method="POST">
                        <input type="submit" value="Add to Folder">
                        <input type="hidden" name="folder_id" value="{{ $folder_id }}">
                        @csrf
                        <table id="dataTableEample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Course</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($students as $student)
                                <tr>
                                    <td><input type="checkbox" name="selected_students[]" value="{{ $student->id }}"></td>
                                    <td>{{ $student->lname }}, {{ $student->fname }}</td>
                                    <td>{{ $student->course }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection