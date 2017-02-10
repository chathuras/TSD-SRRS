@foreach( $reservations as $reservation)
    <tr class="cTrReservation gradeA" data-id="{{ $reservation->id }}">
        <!-- td>{{ $reservation->resource_id }}</td -->
        <td>{{ $reservation->name }}</td>
        <td>{{ $reservation->address }}</td>
        <td>{{ $reservation->email_address }}</td>
        <td>{{ $reservation->start }}</td>
        <td>{{ $reservation->end }}</td>
        <td>
            <button data-resource_id="{{ $reservation->resource_id }}" data-reservation_id="{{ $reservation->id }}" type="button" class="btn btn-primary btn-mini btnViewReservation" data-toggle="modal" data-target="#myModal">Edit Reservation</button>
        </td>
    </tr>
@endforeach