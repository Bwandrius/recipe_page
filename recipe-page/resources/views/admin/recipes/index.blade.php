@extends('components/admin_layout')
@section('title', 'admin-view-recipes')
@section('content')

<h1> AdminRecipeController index</h1>
<br>

<table class="table table-success table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Recipe Name</th>
            <th scope="col">Recipe Category</th>
            <th scope="col">Image</th>
            <th scope="col">Is Active</th>
        </tr>
    </thead>
    <tbody>
        @foreach($recipes as $recipe)
            <tr>
                <th scope="row">{{ $recipe->id }}</th>
                <td>{{ $recipe->name }}</td>
                <td>{{ $recipe->category->name }}</td>
                <td>Image placeholder</td>
                <td>{{ $recipe->is_active }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
    

@endsection
