@foreach( $resources as $resource)
    <tr class="cTrResource gradeA" data-id="{{ $resource->id }}">
        <td>{{ $resource->name }}</td>
        <td>{{ $resource->category->name }}</td>
        <td>{{ $resource->location }}</td>
        <td>{{ $resource->description }}</td>
        {{var_dump(!$resource->reservation->count())}}
        <td>
            <button class="cBtnEdit btn btn-warning" data-id="{{ $resource->id }}">Edit</button>
            <button class="cBtnDelete btn btn-danger" data-id="{{ $resource->id }}"
                    @if (!$resource->reservation->count())  @else disabled
                    @endif @if ($resource->reservation->count()) title="You can not delete a resource while there is a reservation for it" @endif>
                Delete
            </button>
        </td>
    </tr>
@endforeach