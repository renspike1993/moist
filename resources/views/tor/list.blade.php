@extends('dashboard')

@section('title', 'Request Lists')

@section('content')

@role('admin')
<!-- <p style="color: green; font-weight: bold;">Welcome, Admin!</p> -->
@endrole

@can('edit articles')
<!-- <p style="color: green; font-weight: bold;">Edit</p> -->
@endcan


<div class="row">
    <form action="{{ route('tor.updateStatus') }}" method="POST">
        @csrf
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Transcript of Records</h6>
                    <p class="card-description">
                        @role('admin')
                        <button class="btn btn-info" name="action" value="on proccess" type="submit">On proccess</button>
                        <button class="btn btn-primary" name="action" value="checking" type="submit">Checking</button>
                        <button class="btn btn-success" name="action" value="sealing" type="submit">Dry Seal</button>
                        <button class="btn btn-danger" name="action" value="ready-to-pick-up" type="submit">Ready to pick-up</button>
                        <!-- <button class="btn btn-secondary" name="action" value="ready-to-pick-up" type="submit">On Hold</button> -->
                        @endrole
                    </p>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fullname</th>
                                    <th>Tracking Code</th>
                                    <th>course</th>
                                    <th>Status</th>
                                    <th>Date Requested</th>
                                    <th>Release</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($requested_tor as $tor)
                                <tr>
                                    <td><input type="checkbox" name="selected_tors[]" value="{{ $tor->id }}"></td>
                                    <td>{{ $tor->fullname }}</td>
                                    <td>{{ $tor->tracking_code }}</td>
                                    <td>{{ $tor->course }}</td>
                                    <td>
                                        <?php
                                        if ($tor->status == "for signature") {
                                            echo '<span class="badge badge-warning">' . $tor->status . '</span>';
                                        } else if ($tor->status == "on proccess") {
                                            echo '<span class="badge badge-info">' . $tor->status . '</span>';
                                        } else if ($tor->status == "checking") {
                                            echo '<span class="badge badge-primary">' . $tor->status . '</span>';
                                        } else if ($tor->status == "sealing") {
                                            echo '<span class="badge badge-success">' . $tor->status . '</span>';
                                        } else if ($tor->status == "ready-to-pick-up") {
                                            echo '<span class="badge badge-danger">' . $tor->status . '</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>{{ $tor->date_requested }}</td>
                                    <td>
                                        @php

                                        $date_started = new DateTime($tor->date_requested);
                                        $date_now = new DateTime();

                                        $year = $date_started->format('y')-$date_now->format('y');
                                        $month = (int) $date_started->format('m') - (int) $date_now->format('m');
                                        $day = $date_started->format('d')-$date_now->format('d');

                                        $remaining_days = $year*365+$month*30+$day;

                                        @endphp
                                        <?php
                                        if ($remaining_days < 10) {
                                            echo '<span class="badge badge-danger">' . $remaining_days . ' day(s)</span>';
                                        }
                                        if ($remaining_days >= 11 && $remaining_days <= 20) {
                                            echo '<span class="badge badge-warning">' . $remaining_days . ' day(s)</span>';
                                        }
                                        if ($remaining_days >= 21) {
                                            echo '<span class="badge badge-success">' . $remaining_days . ' day(s)</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="{{ route('tor.view', ['id' => $tor->id]) }}" class="btn btn-info">Clearance</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection