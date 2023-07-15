<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="styles.css" />

        <!-- Styles -->
    </head>
    <body class="antialiased">
    {{$data}}
    <div id="0">
        <ul id = "0">
            Categories
            @foreach($data as $category)
                @if($category->parent_id == 0)
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
            <div class="button-group">
                <input class="add-input">
                <button onclick="addCategory(event)" class="add-category-button">Add category</button>
            </div>
        </ul>
    </div>
    <script src="main.js"></script>
    </body>
</html>
