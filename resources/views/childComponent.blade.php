<ul>
    @foreach($data as $category)
        @if($category->parent_id == $parentId)
            <li class="category" id="{{$category->id}}">
                <a href="/singleCategory/{{$category->id}}">{{$category->name}}</a>
                <div class="button-group">
                    <button onclick="deleteCategory(event)" class="delete-button">Delete</button>
                    <input class="edit-input">
                    <button onclick="setCategory(event)" class="edit-button">Edit</button>
                    <input class="add-input">
                    <button onclick="addCategory(event)" class="add-subcategory-button">Add Subcategory</button>
                </div>
                @if($category->numOfChilds != 0)
                    @include('childComponent', ['data' => $data, 'parentId' => $category->id])
                @endif
            </li>
        @endif
    @endforeach
</ul>
