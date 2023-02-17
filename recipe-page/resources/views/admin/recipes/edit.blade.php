@extends('components/admin_layout')
@section('title', 'admin-edit-recipes')
@section('content')

    <h1>Admin Edit Recipe</h1>
    <br>

    <form method="POST" action="{{ route('admin.recipe.edit.post', ['id' => $recipe->id]) }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $recipe->name }}">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $recipe->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $recipe->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>



@endsection
