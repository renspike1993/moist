@extends('dashboard')



@section('content')
<button class="btn-xs btn-danger" onclick="printDiv('tor')">Print</button><br><br>

<div id="tor">
    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">

    <style>
        .test {
            /* border: 1px solid gray; */
        }

        .header {
            padding: 40px;
        }

        .logo {
            padding-left: 20px;
        }

        .left-logo {}

        .right-text {
            /* padding-left: 15px; */
            font-size: 15px;
            line-height: 15px;
        }

        .top {
            /* padding-left: 40px; */
            /* display: flex;
            align-items: center; */
            height: 100px;
        }

        .main {
            padding-left: 10px;
        }





        .document-id {
            padding-top: 0px;
            font-size: 10px;
            font-weight: bold;
            list-style: 15px;
        }

        .papscu {
            text-align: center;
        }

        .banner {
            /* padding: 5px; */
            width: 100%;
            background-color: #C00000;
            color: white;
            font-size: 30px;
            font-family: 'Arial Black', sans-serif;
            font-weight: bold;
            -webkit-text-stroke: 1px black;
            /* Adds a black outline */
            text-align: center;
        }

        .body {
            height: 500px;
        }

        .body {
            width: 100%;
        }




        .b_td,
        th {
            text-align: center;
        }

        td,
        th {}

        table {
            border-collapse: collapse;
            /* Removes space between table cells */
        }

        .num,
        .normal-text {
            border: 1px solid gray;
            font-weight: bold;
        }

        .num {
            text-align: center;
        }

        .normal-text {
            text-align: left;
        }

        th {
            border: 1px solid gray;
        }
    </style>

    <?php
    $total_row_count = count($records);
    $row_per_page = 30;
    $remainder = $total_row_count % $row_per_page;



    $total_pages = ($total_row_count - $remainder) / $row_per_page;
    // if($remainder>0){
    //     $total_pages++;
    // }

    // echo "Total Rows :".$total_row_count."<br>Total pages : ".$total_pages."<br>Remaining: ".$remainder;

    ?>

    <!------------- start -------------->
    @for($page = 0; $page < $total_pages; $page++)
        <div class="container" style="padding:5px;">


        <table style="background-image: url('{{ asset('watermark.jpg') }}'); background-size: cover; background-position: center;position: relative;">
            <tr>
                <td class="logo">
                    <img src="{{ asset('logo.jpg') }}" width="75px" alt="Image description">
                </td>
                <td class="right-text">
                    <b>MISAMIS ORIENTAL INSTITUTE OF SCIENCE</b><br>
                    <b>AND TECHNOLOGY (MOIST), INC.</b><br>
                    Sta. Cruz, Cogon, Balingasag, Misamis Oriental<br>
                    <span style="font-size: 12px;">Website: www.moist-edu.com Email: moist@moist.edu.ph FB: www.facebook.com/moist.edu</span>
                </td>



                <td class="document-id">
                    <b>Document ID: QR-REG-TOR</b><br>
                    <b>Record No: </b><br>
                    <span style="font-size: 10px;">Contact #: 09351124046</span>
                </td>
            </tr>
            <tr>
                <td class="papscu" colspan="3">
                    <u><b>Member: Philippine Association of Private Schools, Colleges and Universities (PAPSCU)</b></u>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="banner">
                    OFFICIAL TRANSCRIPT OF RECORDS
                </td>
            </tr>

            <tr>
                <td colspan="7">
                    <div class="container">
                        <div class="row" style="padding-top:10px;padding-bottom:5px;">
                            <div class="col-6">
                                Name:
                            </div>

                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    <div class="container">

                        <div class="row info">

                        </div>
                        <div class="row">
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
                                    @for($i = 0 +($row_per_page*$page) ; $i < $row_per_page + ($row_per_page * $page); $i++)
                                        <tr>
                                        <td class="normal-text">{{ $records[$i]['term'] }}</td>
                                        <td class="normal-text">{{ $records[$i]['subject'] }}</td>
                                        <td class="normal-text">{{ $records[$i]['descriptive'] }}</td>
                                        <td class="normal-text num">{{ $records[$i]['grade'] }}</td>
                                        <td class="normal-text num">{{ $records[$i]['re-ex'] }}</td>
                                        <td class="normal-text num">{{ $records[$i]['unit'] }}</td>
            </tr>
            @endfor
            <tr>
                <td class="b_td" colspan="7" style="height: 350px;">
                    <div class="row justify-content-start">
                        <div class="col-4">
                            asd
                        </div>

                    </div>
                </td>
            </tr>
            </tbody>
        </table>
</div>
</div>
</td>
</tr>
</table>
</div>
<!-- ----------------end------------------ -->
@endfor


@if($remainder > 0)
<!-- ---------start------- -->
<div class="container-fluid">
    <table style="background-image: url('{{ asset('page 2.jpg') }}'); background-size: cover; background-position: center;position: relative;">
        <tr>
            <td class="logo">
                <img src="{{ asset('logo.jpg') }}" width="75px" alt="Image description">
            </td>
            <td class="right-text">
                <b>MISAMIS ORIENTAL INSTITUTE OF SCIENCE</b><br>
                <b>AND TECHNOLOGY (MOIST), INC.</b><br>
                Sta. Cruz, Cogon, Balingasag, Misamis Oriental<br>
                <span style="font-size: 12px;">Website: www.moist-edu.com Email: moist@moist.edu.ph FB: www.facebook.com/moist.edu</span>
            </td>



            <td class="document-id">
                <b>Document ID: QR-REG-TOR</b><br>
                <b>Record No: </b><br>
                <span style="font-size: 10px;">Contact #: 09351124046</span>
            </td>
        </tr>
        <tr>
            <td class="papscu" colspan="3">
                <u><b>Member: Philippine Association of Private Schools, Colleges and Universities (PAPSCU)</b></u>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="banner">
                OFFICIAL TRANSCRIPT OF RECORDS
            </td>
        </tr>

        <tr>
            <td colspan="7">
                <div class="container">
                    <div class="row" style="padding-top:10px;padding-bottom:5px;">
                        <div class="col-6">
                            Name:
                        </div>

                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="3">
                <div class="container">

                    <div class="row info">

                    </div>
                    <div class="row">
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
                                @for($i = 60 ; $i < ($row_per_page * $total_pages)+$remainder; $i++)
                                    <tr>
                                    <td class="normal-text">{{ $records[$i]['term'] }}</td>
                                    <td class="normal-text">{{ $records[$i]['subject'] }}</td>
                                    <td class="normal-text">{{ $records[$i]['descriptive'] }}</td>
                                    <td class="normal-text num">{{ $records[$i]['grade'] }}</td>
                                    <td class="normal-text num">{{ $records[$i]['re-ex'] }}</td>
                                    <td class="normal-text num">{{ $records[$i]['unit'] }}</td>
        </tr>
        @endfor

        <tr>
            <td colspan="7" class="normal-text num" style="text-align: center;">
                -x-x-x- -x-x-x-Transcript closed and nothing follows-x-x-x- -x-x-x-
            </td>
        </tr>

        @for($i =$total_row_count; $i < ($row_per_page * ($total_pages+1))-1 ; $i++)
            <tr>
            <td class="normal-text">&nbsp;</td>
            <td class="normal-text">&nbsp;</td>
            <td class="normal-text">&nbsp;</td>
            <td class="normal-text num">&nbsp;</td>
            <td class="normal-text num">&nbsp;</td>
            <td class="normal-text num">&nbsp;</td>
            </tr>
            @endfor



            <tr>
                <td class="b_td" colspan="7" style="height: 350px;">
                    <div class="row">
                        <div class="col-4">
                            <div class="col-12">
                                <h1>Footer</h1>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
    </table>
</div>
</div>
</td>
</tr>
</table>
</div>
<!-- ----------------end------------------ -->
@endif


</div>

<style>
    .test {
        border: 1px solid gray;
    }
</style>





<script>
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
        };
    }
</script>
@endsection