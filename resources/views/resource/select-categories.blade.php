<select id="iSelectCategory">
    <option>Select Category</option>
    @foreach( $categories as $category)
        <option
          value="{{$category->id}}"
          {{ (isset($resource) && ($resource->category->id === $category->id)) ? 'selected' : ''}}>
            {{$category->name}}
        </option>
    @endforeach
</select>
