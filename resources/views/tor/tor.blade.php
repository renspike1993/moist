@extends('main')

@section('title','Transcrits of Record')


@section('content')
<button class="btn-xs btn-danger" onclick="printDiv('tor')">Print</button><br><br>



<div class="" id="tor" onclick="printDiv(this.id)">


    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <style>
        td,
        th {
            border: 1px solid gray;
        }

        .table {
            border-collapse: collapse;
            width: 90%;
        }

        .front {
            background-image: url("{{ asset('front.png') }}");
            background-size: contain;
            /* Fit the image without cropping */
            background-position: center;
            background-repeat: no-repeat;
            /* padding: 20px; */
            height: 1225px;
        }

        .background {
            background-image: url("{{ asset('page 2.png') }}");
            background-size: contain;
            /* Fit the image without cropping */
            background-position: center;
            background-repeat: no-repeat;
            /* padding: 20px; */
            height: 1225px;
        }

        .normal-text {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            text-align: left;
            font-size: 13px;
            /* Approximate size equivalent to 10pt in MS Word */
        }

        .num {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            text-align: center;
            font-size: 13px;
        }


        .test {
            border: 1px solid gray;
        }

        .lineA {
            /* display: flex; */
            /* justify-content: center; */
            padding-left: 30px;
            padding-right: 30px;
            margin-left: 20px;
            margin-right: 20px;
        }
    </style>




    <div class="container" id="front">


        <div class="front">


            <table style="margin-left: 22px; width:95%; padding-top:225px; font-family: Arial, Helvetica, sans-serif; font-size: 15px; font-weight: bold; ">
                <tr>
                    <td width="25%" style="border: none; ">CABUHAN</td>
                    <td width="31.3%" style="border: none;">RENE II</td>
                    <td width="25%" style="border: none;">MACABECHA</td>
                    <td style="border: none;">C17-0061</td>
                </tr>
            </table>

            <table style="margin-left: 22px; width:95%; padding-top:19px; font-family: Arial, Helvetica, sans-serif; font-size: 15px; font-weight: bold; ">
                <tr>
                    <td width="25%" style="border: none; ">FILIPINO</td>
                    <td width="18.5%" style="border: none;">MALE</td>
                    <td width="19%" style="border: none;">SINGLE</td>
                    <td style="border: none;">ROMAN CATHOLIC</td>
                </tr>
            </table>

            <table style="margin-left: 22px; width:95%; padding-top:18px; font-family: Arial, Helvetica, sans-serif; font-size: 15px; font-weight: bold; ">
                <tr>
                    <td width="25%" style="border: none; ">OCTOBER 10, 1993</td>
                    <td width="70.5%" style="border: none;">PROVINCIAL HOSPITAL, BALINGASAG, MISAMIS ORIENTAL </td>
                    <td width="" style="border: none;"> </td>
                    <td width="" style="border: none;"> </td>

                </tr>
            </table>


            <div class="qr" style="padding-top:710px; padding-left:370px;">
                <img src="{{ asset('qr.png') }}" alt="" height="100px">
            </div>
        </div>
    </div>


    @foreach ($pages as $pageIndex => $page)
    <div class="container-fluid">
        <div class="background">
            <div style="padding-top:220px; display: flex; justify-content: center; " style="text-align: center;">
                <table width="90%" class="table">
                    <thead>
                        <tr>
                            <th width="10%;" rowspan="2" class="b_td">Term</th>
                            <th width="15%;" rowspan="2" class="b_td">Course No.</th>
                            <th width="50%;" rowspan="2" class="b_td">Descriptive Title</th>
                            <th width="15%;" colspan="2" class="b_td">Grades</th>
                            <th width="5" rowspan="2" class="b_td">Credits</th>
                        </tr>
                        <tr>
                            <th class="b_td">Final</th>
                            <th class="b_td">Re-Ex</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($page as $p)
                        @if($p['ay']=="closed")
                        <tr>
                            <td colspan="6" class="normal-text" style="text-align: center;">-x-x-x- -x-x-x- Transcript closed and nothing follows -x-x-x- -x-x-x-</td>
                        </tr>
                        @elseif($p['ay']=="-")
                        <tr>
                            <td class="normal-text">&nbsp;</td>
                            <td class="normal-text"></td>
                            <td class="normal-text"></td>
                            <td class="num"></td>
                            <td class="num"></td>
                            <td class="num"></td>
                        </tr>
                        @else
                        <tr>
                            <td class="normal-text">{{ $p['ay'] }}</td>
                            <td class="normal-text">{{ $p['subject'] }}</td>
                            <td class="normal-text">{{ $p['descriptive'] }}</td>
                            <td class="num">{{ $p['grade'] }}</td>
                            <td class="num"></td>
                            <td class="num">{{ $p['unit'] }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endforeach

    <!-- @foreach ($pages as $pageIndex => $page)

    <div class="content">
        <div class="container">
            <table width="100%" class="main-table">
                <thead>
                    <tr>
                        <th width="10%;" rowspan="2" class="b_td">Term</th>
                        <th width="15%;" rowspan="2" class="b_td">Course No.</th>
                        <th width="50%;" rowspan="2" class="b_td">Descriptive Title</th>
                        <th width="15%;" colspan="2" class="b_td">Grades</th>
                        <th width="5" rowspan="2" class="b_td">Credits</th>
                    </tr>
                    <tr>
                        <th class="b_td">Final</th>
                        <th class="b_td">Re-Ex</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($page as $p)
                    <tr>
                        <td class="normal-text">{{ $p['ay'] }}</td>
                        <td class="normal-text">{{ $p['subject'] }}</td>
                        <td class="normal-text">{{ $p['subject'] }}</td>
                        <td class="num">{{ $p['grade'] }}</td>
                        <td class="num">{{ $p['subject'] }}</td>
                        <td class="num">{{ $p['unit'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endforeach -->


</div>


<script>
    printDiv("tor");

    function printDiv(divId) {
        // Get the content of the specific div
        var content = document.getElementById(divId).innerHTML;

        // Create a new window with size for long bond paper (8.5 x 13 inches)
        var printWindow = window.open('', '', 'height=1040,width=850'); // 1040px ~ 13 inches and 850px ~ 8.5 inches

        // Write the content into the new window with print-specific styles
        printWindow.document.write('<html><head><title>Print</title>');

        // Add print-specific styles for long bond paper
        printWindow.document.write(`
<style>
    @page {
        size: 8.5in 13in; /* Long bond paper dimensions */
        margin: 1in; /* Adjust margins as necessary */
    }
    table{
            width:100%;
        }
</style>
    `);

        printWindow.document.write('</head><body>');
        printWindow.document.write(content);
        printWindow.document.write('</body></html>');

        // Close the document to ensure it's fully loaded before printing
        printWindow.document.close();

        // Wait for the content to be fully loaded, then print
        printWindow.onload = function() {
            printWindow.focus(); // Needed for some browsers
            tor.style.display = "none";
            printWindow.print();
            printWindow.close();
            history.back();
        };
    }
</script>
@endsection