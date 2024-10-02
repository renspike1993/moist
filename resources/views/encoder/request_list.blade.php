@extends('main')


@section('title','Encoder')

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
                                <th>Tracking No.</th>
                                <th>Document Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $request->lname }}, {{ $request->fname }} {{ $request->midname }} </td>
                                <td>
                                    {{ $request->tracking_no }}
                                </td>
                                <td>
                                    {{ $request->name }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" request-id="{{ $request->req_id }}" data-toggle="modal" data-target="#exampleModalCenter" onclick="setRequestId(this)">
                                        Attach Files
                                    </button>
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
                <form action="{{ route('upload_file') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body" style="text-align: right;">
                        @csrf
                        <input type="hidden" id="request_id" name="request_id">
                        <!-- Transcript (TOR) File Upload -->


                        <div class="row mb-3">
                            <div class="col-4">
                                Transcript:
                            </div>
                            <div class="col-8">
                                <input type="file" name="tor" class="form-control" required>
                            </div>
                        </div>

                        <!-- Form IX File Upload -->
                        <div class="row mb-3">
                            <div class="col-4">
                                Form - IX:
                            </div>
                            <div class="col-8">
                                <input type="file" name="form9" class="form-control" required>
                            </div>
                        </div>
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

<script>
    function setRequestId(button) {
        // Get the request-id from the button
        var requestId = button.getAttribute('request-id');

        // Set the value of the hidden input
        document.getElementById('request_id').value = requestId;
    }
</script>
@endsection