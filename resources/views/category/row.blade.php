@foreach( $categories as $category)
    <tr class="cTrCategory gradeA" data-id="{{ $category->id }}">
        <td>{{ $category->name }}</td>
        <td>{{ $category->description }}</td>
    </tr>
@endforeach