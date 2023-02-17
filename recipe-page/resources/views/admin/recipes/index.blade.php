@extends('components/admin_layout')
@section('title', 'admin-view-recipes')
@section('content')

<h1> AdminRecipeController index</h1>
<br>
@include('components.alert.success_message')

<table class="table table-success table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Recipe Name</th>
            <th scope="col">Recipe Category</th>
            <th scope="col">Ingredients</th>
            <th scope="col">Image</th>
            <th scope="col">Is Active</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($recipes as $recipe)
            <tr>
                <th scope="row">{{ $recipe->id }}</th>
                <td>
                    <a class="text-decoration-none" href="{{ route('admin.recipe.page', ['id' => $recipe->id]) }}">
                        {{ $recipe->name }}
                    </a>
                </td>
                <td>{{ $recipe->category->name }}</td>
                <td>{{$recipe->ingredients->count()}}</td>
                <td>Image placeholder</td>
                <td>{{ $recipe->is_active }}</td>

                <td>
                    <form action="{{ route('admin.recipe.delete', ['id' => $recipe->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-end">
    {{ $recipes->links() }}
</div>


@endsection
