@extends('home')

@section('content')
    <div class="row-fluid" style="min-height:100%">
        <iframe id="reservations" align="top" frameborder="0" scrolling="no"
                src="https://srrs-reports.herokuapp.com/passedReservations" width="100%"
                style="position: relative; min-height: 100%; height: 1000px"></iframe>
    </div>
@endsection

