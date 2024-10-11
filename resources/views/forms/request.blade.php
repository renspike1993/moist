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
                                <?php $counter = $loop->iteration; ?>
                                <tr class="text-right">
                                    <td class="text-left">{{ $loop->iteration }}</td>
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
                                                <option value="For Scholarship">For Scholarship</option>
                                                <option value="For Board Exam">For Board Exam</option>
                                                <option value="For Apprenticeship">For Apprenticeship</option>
                                                <option value="PNP Application">PNP Application</option>
                                                <option value="Educational Assitance">Educational Assitance</option>
                                                <option value="any legal">Any legal purposes</option>
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
                                                        <a href="#" class="btn btn-outline-primary float-right mt-4" data-toggle="modal" data-target="#exampleModalCenter"><i data-feather="printer" class="mr-2 icon-md"></i>Receipt</a>
                                                        <a href="#" class="btn btn-outline-primary float-right mt-4" data-toggle="modal" data-target="#claimStub"><i data-feather="printer" class="mr-2 icon-md"></i>Claim Stub</a>
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


<div class="example">
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog" role="document" style="width: 230px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Receipt</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="receiptContent" style="background-color: white; color: black; font-family: 'Courier New', Courier, monospace; padding: 10px; width: 230px; font-size: 10px;">
                    <h3 style="text-align: center; margin-bottom: 10px; font-size: 15px;">Payment Request</h3>
                    <!-- <h3 style="text-align: left; margin-bottom: 10px; font-size: 15px;">Name: {{ $student->lname }}, {{ $student->fname }}</h3> -->
                    <h3 style="text-align: left; margin-bottom: 10px; font-size: 15px; ">Track No: <u>{{ $student->tracking_no }}</u> </h3>

                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th style="text-align: left; border-bottom: 1px solid #000;">Document Name</th>
                                <th style="text-align: left; border-bottom: 1px solid #000;">Copies</th>
                                <th style="text-align: right; border-bottom: 1px solid #000;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total = 0;
                            @endphp
                            @foreach($requests as $request)
                            <?php $requestTotal = $request->copies * $request->fee; ?>
                            <tr>
                                <td style="border-bottom: 1px solid #000; width: 80%; text-align: left; vertical-align: top;">{{ $request->name }}</td>
                                <td style="border-bottom: 1px solid #000; text-align: center; vertical-align: top;">{{ $request->copies }}</td>
                                <td style="border-bottom: 1px solid #000; text-align: right; vertical-align: top;">₱{{ number_format($requestTotal, 2) }}</td>
                            </tr>

                            @php
                            $total += $requestTotal;
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="3" style="border-bottom: 1px solid #000; text-align: right; vertical-align: top;">Total: ₱{{ number_format($total, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="border-top: 2px solid #000; margin-top: 10px; padding-top: 5px;">
                        <h4 style="text-align: left; margin: 0; font-size: 15px; ">Total: ₱{{ number_format($total, 2) }}</h4>
                    </div>
                    <!-- <p style="text-align: center; margin-top: 10px; font-size: 10px;">Thank you!</p> -->
                    <p style="text-align: left; margin-top: 10px; font-size: 10px;">Step 1: Pay the total amount due at finance office.</p>
                    <p style="text-align: left; margin-top: 10px; font-size: 10px;">Step 2: Return the reciept at registrar's office after paying.</p>
                    <p style="text-align: left; margin-top: 10px; font-size: 10px;">Requested By: {{ Auth::user()->name }}</p>
                    <!-- <p style="text-align: center; margin: 0; font-size: 10px;">Please return the receipt to the registrar's office window 4 to validate your request.</p> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="printReceipt('receiptContent')">Print</button>

                </div>
            </div>
        </div>
    </div>
</div>



<!-- Claim Stub -->
<div class="example">
    <!-- Modal -->
    <div class="modal fade" id="claimStub" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog" role="document" style="width: 230px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Receipt</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="claimStubContent" style="background-color: white; color: black; font-family: 'Courier New', Courier, monospace; padding: 10px; width: 230px; font-size: 10px;">
                    <h3 style="text-align: center; margin-bottom: 10px; font-size: 15px;">Claim Stub</h3>
                    <!-- <h3 style="text-align: left; margin-bottom: 10px; font-size: 15px;">Name: {{ $student->lname }}, {{ $student->fname }}</h3> -->
                    <h3 style="text-align: left; margin-bottom: 10px; font-size: 15px; ">Track No: <u>{{ $student->tracking_no }}</u> </h3>

                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th style="text-align: left; border-bottom: 1px solid #000;">Document Name</th>
                                <th style="text-align: left; border-bottom: 1px solid #000;">Release Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total = 0;
                            @endphp
                            @foreach($requests as $request)
                            @php
                            $requestTotal = $request->copies * $request->fee;
                            @endphp
                            <tr>
                                <!-- Document Name Column -->
                                <td style="border-bottom: 1px solid #000; width: 50%; text-align: left; vertical-align: top;">
                                    {{ $request->name }}
                                </td>

                                <!-- OR Date / Duration Column -->
                                <td style="border-bottom: 1px solid #000; text-align: center; vertical-align: top;">
                                    @if($request->or_date)
                                    @php
                                    $newDate = Carbon::parse($request->or_date)->addDays($request->duration)->toDateString();
                                    @endphp
                                    {{ $newDate }}
                                    @else
                                    {{ $request->duration }} day(s)
                                    @endif
                                </td>
                            </tr>

                            @php
                            $total += $requestTotal;
                            @endphp
                            @endforeach

                            <!-- Total Row -->

                        </tbody>
                    </table>

                    <!-- <p style="text-align: center; margin-top: 10px; font-size: 10px;">Thank you!</p> -->
                    <p style="text-align: left; margin-top: 10px; font-size: 10px;">
                        Note: Bring this claim stub upon claiming your requested documents. Visit academic office and look for Ma'am Nora Lozano.
                    </p>
                    <p style="text-align: left; margin-top: 10px; font-size: 10px;">Requested By: {{ Auth::user()->name }}</p>
                    <!-- <p style="text-align: center; margin: 0; font-size: 10px;">Please return the receipt to the registrar's office window 4 to validate your request.</p> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="printReceipt('claimStubContent')">Print</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Claim Stub -->

<script>
    function printReceipt(id) {
        // Get the modal body content
        var content = document.getElementById(id).innerHTML;

        // Create a new window for printing
        var printWindow = window.open('', '', 'height=400,width=300');
        printWindow.document.write('<html><head><title>Receipt</title>');

        // Include custom styles for the receipt
        printWindow.document.write('<style>');
        printWindow.document.write('body { font-family: "Courier New", Courier, monospace; font-size: 10px; margin: 0; padding: 10px 0; display: flex; justify-content: center; }'); // Add padding at top
        printWindow.document.write('h3, h4 { margin: 0; font-size: 15px; }'); // Adjust header font size
        printWindow.document.write('table { width: 100%; border-collapse: collapse; }');
        printWindow.document.write('th, td { padding: 5px; text-align: left; font-size: 10px; }'); // Set table font size
        printWindow.document.write('td:last-child { text-align: right; }'); // Align total to the right
        printWindow.document.write('@media print { body { -webkit-print-color-adjust: exact; } }'); // Adjust for print colors
        printWindow.document.write('</style>');
 
        printWindow.document.write('</head><body>');
        printWindow.document.write('<div style="width: 230px; margin-top: 10px;">'); // Added margin-top to avoid cutting off text
        printWindow.document.write(content); // Write the content to the new window
        printWindow.document.write('</div>');
        printWindow.document.write('</body></html>');
        printWindow.document.close(); // Close the document
        printWindow.print(); // Trigger the print dialog
    }
</script>


@endsection