@extends('main')

@section('title','Request Form')


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="container-fluid d-flex justify-content-between">
                    <div class="col-lg-3 pl-0">
                        <a href="#" class="noble-ui-logo d-block mt-3" style="color:white;">{{ $student->lname }}, {{ $student->fname }} </a>
                        <p class="mt-1 mb-1"><b>{{ $student->course }} (Graduate)</b></p>
                        <p>{{ $student->contact }}<br> {{ $student->email }}<br>{{ $student->address }}</p>
                        <h5 class="mt-5 mb-2 text-muted">Recieved by:</h5>
                        <p>{{ Auth::user()->name }}<br> {{ $student->updated_at }}<br> </p>
                    </div>
                    <div class="col-lg-3 pr-0">
                        <h4 class="font-weight-medium text-uppercase text-right mt-4 mb-2">Tracking No.</h4>
                        <h6 class="text-right mb-5 pb-4">{{ $student->tracking_no }}</h6>
                        <p class="text-right mb-1">Total Amount</p>
                        <h4 class="text-right font-weight-normal">
                            ₱ {{ number_format($total_amount, 2) }}
                        </h4>

                        @if($student->or_num)
                        <h6 class="mb-0 mt-3 text-right font-weight-normal mb-2" style="color:green;">
                            <span class="text-muted">Status :</span>
                            Paid
                        </h6>
                        <h6 class="mb-0 mt-3 text-right font-weight-normal mb-2">
                            <span class="text-muted">OR No. : </span>
                            {{ $student->or_num }}
                        </h6>
                        <h6 class="text-right font-weight-normal">
                            <span class="text-muted"> OR Date :</span>
                            {{ $student->or_date }}
                        </h6>
                        @else
                        <h6 class="mb-0 mt-3 text-right font-weight-normal mb-2" style="color:red;">
                            <span class="text-muted">Status :</span>
                            Unpaid
                        </h6>
                        <h6 class="mb-0 mt-3 text-right font-weight-normal mb-2">
                            <span class="text-muted">OR No. : </span>
                            000000
                        </h6>
                        <h6 class="text-right font-weight-normal">
                            <span class="text-muted"> OR Date :</span>
                            00-00-00
                        </h6>
                        @endif



                    </div>
                </div>
                <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                    <div class="table-responsive w-100">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="40%">Requested Documents</th>
                                    <th width="15%">Purpose</th>
                                    <th width="10%" class="text-right">Copies</th>
                                    <th width="10%" class="text-right">Fee</th>
                                    <th width="10%" class="text-right">Total</th>
                                    <th width="10%" class="text-right">Release</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                use Carbon\Carbon;

                                @endphp


                                <?php $counter = 0; ?>
                                @foreach($requests as $request)
                                <?php $counter++ ?>
                                <tr class="text-right">
                                    <td class="text-left">{{ $counter }}</td>
                                    <td class="text-left">{{ $request->name }}</td>
                                    <td class="text-left">{{ $request->purpose }}</td>
                                    <td class="text-right">{{ $request->copies }}</td>
                                    <td>₱ {{ $request->fee }}</td>
                                    <td>₱ {{ $request->copies * $request->fee }}</td>
                                    @if($request->or_date)
                                    @php                                    
                                    $newDate = Carbon::parse($request->or_date)->addDays($request->duration)->toDateString();
                                    @endphp
                                    <td>{{ $newDate }}</td>
                                    @else
                                    <td>{{ $request->duration }} day(s)</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <form action="{{ route('store_request') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="transaction_id" value="{{ $transaction_id }}">
                                    <tr>
                                        <td>{{ $counter + 1 }}</td>
                                        <td>
                                            <select name="document_id" class="form-control" required>
                                                <option value="" disabled selected>Select Documents</option>
                                                @foreach($documents as $document)
                                                <option value="{{ $document->id }}">{{ $document->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="purpose" class="form-control" required>
                                                <option value="" disabled selected>Select</option>
                                                <option value="For Employement">For Employement</option>
                                                <option value="For Evaluation">For Evaluation</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="copies" class="form-control" min=1 value=1 required>
                                        </td>
                                        <td colspan="4" class="text-center">

                                            <button class="btn btn-success">Add Request</button>

                                        </td>
                                    </tr>
                                </form>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="container-fluid mt-5 w-100">
                    <div class="row">
                        <div class="col-md-6 ml-auto">
                            <div class="table-responsive">
                                <form action="{{ route('update_transaction') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="transaction_id" value="{{ $transaction_id }}">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>OR Number </td>
                                                <td class="text-right">
                                                    <input type="text" class="form-control" name="or_number" placeholder="Enter 6-digit number" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>OR Date</td>
                                                <td class="text-right">
                                                    <input type="date" name="or_date" class="form-control" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Confirmed by:</td>
                                                <td class="text-bold-800 text-left">
                                                    {{ Auth::user()->name }}
                                                </td>

                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="container-fluid w-100">
                                                        <button type="submit" class="btn btn-primary float-right mt-4 ml-2"><i data-feather="save" class="mr-3 icon-md"></i>Confirmed</button>
                                                        <a href="#" class="btn btn-outline-primary float-right mt-4"><i data-feather="printer" class="mr-2 icon-md"></i>Print</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection