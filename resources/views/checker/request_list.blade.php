@extends('main')


@section('title','Checker')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="card-title">Request Lists</h6>
                </div>

                <div class="table-responsive mt-3">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Students Name</th>
                                <th style="text-align:center;">Documents</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $request->lname }}, {{ $request->fname }} {{ $request->midname }} </td>
                                <td>

                                    <a href="{{ asset('storage/' . $request->tor_path) }}" class="btn btn-secondary btn-icon-text" download>
                                        <i class="btn-icon-prepend" data-feather="download"></i>
                                        TOR
                                    </a>


                                    <a href="{{ asset('storage/' . $request->form9_path) }}" class="btn btn-secondary btn-icon-text" download>
                                        <i class="btn-icon-prepend" data-feather="download"></i>
                                        FORM - IX
                                    </a>

                                </td>

                                <td>
                                    <a href="#" class="btn btn-warning" tabindex="-1" role="button" aria-disabled="true">Returned</a>
                                    <a href="#" class="btn btn-danger" tabindex="-1" role="button" aria-disabled="true">Checked</a>
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Cabinet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('create_cabinet') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <label for="cabinet_name">Cabinet Name</label>
                        <input type="text" name="cabinet_name" class="form-control">
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