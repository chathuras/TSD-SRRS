@foreach( $reservations as $reservation)
    <tr class="cTrReservation gradeA" data-id="{{ $reservation->id }}">
        <!-- td>{{ $reservation->resource_id }}</td -->
        <td>{{ $reservation->name }}</td>
        <td>{{ $reservation->address }}</td>
        <td>{{ $reservation->email_address }}</td>
				<td>{{ $reservation->start }}</td>
				<td>{{ $reservation->end }}</td>
				<td>
					<button class="btn btn-primary btn-mini">View</button> 
				</td>
    </tr>
@endforeach