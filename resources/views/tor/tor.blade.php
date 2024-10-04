@extends('main')



@section('content')
<button class="btn-xs btn-danger" onclick="printDiv('tor')">Print</button><br><br>



<div class="" id="tor" onclick="printDiv(this.id)">


    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <style>
        td,
        th {
            border: 1px solid gray;
        }

        table {
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
            height: 1175px;
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
    </style>




    <div class="container-fluid" id="front">


        <div class="front">
            <div class="qr" style="padding-top:1000px; padding-left:370px;">
                <img src="{{ asset('qr.png') }}" alt="" height="100px">
            </div>
        </div>
    </div>


    @foreach ($pages as $pageIndex => $page)
    <div class="container-fluid" >
        <div class="background">
            <div style="padding-top:220px; display: flex; justify-content: center; " style="text-align: center;">
                <table width="90%" class="main-table">
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
                            <td class="normal-text"></td>
                            <td class="num">{{ $p['grade'] }}</td>
                            <td class="num"></td>
                            <td class="num">{{ $p['unit'] }}</td>
                        </tr>
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
            printWindow.print();
            printWindow.close();
            // history.back();
        };
    }
</script>
@endsection