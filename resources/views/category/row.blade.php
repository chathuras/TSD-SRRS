@foreach( $categories as $category)
    <tr class="gradeX">
        <td>{{ $category->name }}</td>
        <td>{{ $category->description }}</td>
        <td></td>
        <td class="center"></td>
    </tr>
@endforeach