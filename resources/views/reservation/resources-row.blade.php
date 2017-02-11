@foreach( $resources as $resource)
    <tr class="cTrResource gradeA" data-id="{{ $resource->id }}">
        <td>{{ $resource->name }}</td>
        <td>{{ $resource->description }}</td>
        <td>{{ $resource->location }}</td>
        <td>{{ $resource->description }}</td>
        <td>
            <button data-id="{{ $resource->id }}" type="button" class="btn btn-primary btn-mini btnViewResource" data-toggle="modal" data-target="#myModal">View</button>
            <button data-id="{{ $resource->id }}" type="button" class="btn btn-primary btn-mini btnReserveResource" data-toggle="modal" data-target="#myModal">Reserve</button>
        </td>
    </tr>
@endforeach