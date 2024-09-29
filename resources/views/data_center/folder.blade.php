@extends('main')


@section('title','Cabinets')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="card-title">Folder Lists</h6>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Add Folder
                    </button>
                </div>

                <div class="table-responsive mt-3">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Folder Name</th>
                                <th>Cabinet</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($folders as $folder)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $folder->folder_name }}</td>
                                <td>{{ $folder->name }}</td>
                                <td>
                                    <a href="{{ route('open_folder', ['id' => $folder->id]) }}
" class="btn btn-outline-primary">Open Folder</a>
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Folder</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('create_folder') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <label for="cabinet_name">Folder Name</label>
                        <input type="text" name="folder_name" class="form-control">
                        <br>
                        <label for="cabinet_id">Cabinet</label>
                        <select name="cabinet_id" class="form-control">
                            <option disabled selected>Select Cabinet</option>
                            @foreach($cabinets as $cabinet)
                            <option value="{{ $cabinet->id }}">{{ $cabinet->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection