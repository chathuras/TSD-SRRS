<form action="#" method="POST" class="form-horizontal" id="iFormRegister">
	@foreach( $reservations as $reservation)
    <tr class="cTrReservation gradeA" data-id="{{ $reservation->id }}">
       <p> {{ $object->object_property }}</p>
    </tr>
@endforeach
</form>

