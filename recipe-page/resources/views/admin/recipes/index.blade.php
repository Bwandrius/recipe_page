@extends('components/admin_layout')
@section('title', 'admin-all-recipes')
@section('content')

    <h1>Recipes/Admin</h1>
    <br>
    @include('components.alert.success_message')

    <form method="GET" action="{{ route('admin.recipes') }}">
        @csrf

        <div class="form-group">
            <label for="category">Category:</label>
            <select name="category_id" id="category" class="form-control">
                <option value="">-- All Categories --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (string) $category->id === (string)
                        ($request->input('category_id') ?? old('category_id')) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label" >Recipe name:</label>
            <input @if($recipes)  @endif type="text" name="name" class="form-control" placeholder="Recipe name">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Apply Filters</button>
    </form>

    <div class="row">
        <div class="col">
            <a href="{{ route('admin.recipe.create') }}" class="btn btn-success">Create a new Recipe</a>
        </div>
    </div>
    <br>

    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Recipe Name</th>
                <th scope="col">Recipe Category</th>
                <th scope="col">Ingredients</th>
                <th scope="col">Image</th>
                <th scope="col">Is Active</th>
                <th scope="col">Edit</th>
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
                    <td>{{ $recipe->category ? $recipe->category->name : 'N/A' }}</td>
                    <td>{{$recipe->ingredients->count()}}</td>
                    <td>
                        @if($recipe->image)
                            <img style="max-width: 50px; max-height: 50px;"
                                 src="{{ asset('storage/images/' . $recipe->image) }}"
                                 alt="{{ $recipe->name }}" class="img-fluid mb-2">
                        @else
                            <img style="max-width: 50px; max-height: 50px;"
                                 src="{{ asset('storage/images/default.jpg') }}"
                                 alt="{{ $recipe->name }}" class="img-fluid mb-2">
                        @endif
                    </td>
                    <td>{{ $recipe->is_active }}</td>

                    <td>
                        <a href="{{ route('admin.recipe.edit', ['id' => $recipe->id]) }}" class="btn btn-info">Edit</a>
                    </td>

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
