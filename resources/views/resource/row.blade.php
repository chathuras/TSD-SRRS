@foreach( $resources as $resource)
    <tr class="cTrResource gradeA" data-id="{{ $resource->id }}">
        <td>{{ $resource->name }}</td>
        <td>{{ $resource->category->name }}</td>
        <td>{{ $resource->location }}</td>
        <td>{{ $resource->description }}</td>
        <td>
            <button class="cBtnEdit btn btn-warning" data-id="{{ $resource->id }}">Edit</button>
            <button class="cBtnDelete btn btn-danger" data-id="{{ $resource->id }}">Delete</button>
        </td>
    </tr>
@endforeach