@foreach( $categories as $category)
    <tr class="cTrCategory gradeA" data-id="{{ $category->id }}">
        <td>{{ $category->name }}</td>
        <td>{{ $category->description }}</td>
        <td>
            <button class="cBtnCategoryEdit btn btn-warning" data-id="{{ $category->id }}">Edit</button>
            <button class="cBtnCategoryDelete btn btn-danger" data-id="{{ $category->id }}">Delete</button>
        </td>
    </tr>
@endforeach