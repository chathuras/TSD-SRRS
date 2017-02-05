@foreach( $resources as $resource)
    <tr class="cTrResource gradeA" data-id="{{ $resource->id }}">
        <td>{{ $resource->name }}</td>
        <td>{{ $resource->description }}</td>
        <td>{{ $resource->location }}</td>
        <td>{{ $resource->description }}</td>
				<td>
					<button class="btn btn-primary btn-mini">View</button> 
					<button type="button" class="btn btn-primary btn-mini" data-toggle="modal" data-target="#myModal">Reserve</button>
				</td>
    </tr>
@endforeach