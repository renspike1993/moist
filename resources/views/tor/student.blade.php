@extends('main')



@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Transcript</h6>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Course</th>
                                <th>Record Count</th>
                                <th style="text-align:center;">Documents</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($records as $record)
                            <tr>
                                <td>{{ $record->fullname }}</td>
                                <td>BSCRIM</td>
                                <td>{{ $record->cnt }}</td>
                                <td>
                                    @if(!empty($record->fullname))
                                    <a href="{{ route('view-records', ['fullname' => urlencode($record->fullname)]) }}" class="btn btn-m btn-success" role="button">
                                        Print Transcript
                                    </a>
                                    @else
                                    No Records
                                    @endif

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