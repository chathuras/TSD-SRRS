@foreach( $resources as $resource)
    <tr class="cTrResource gradeA" data-id="{{ $resource->id }}">
        <td>{{ $resource->name }}</td>
        <td>{{ $resource->category->name }}</td>
        <td>{{ $resource->location }}</td>
        <td>{{ $resource->description }}</td>
    </tr>
@endforeach