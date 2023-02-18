@extends('components/admin_layout')
@section('title', 'admin-edit-recipes')
@section('content')

    <h1>Edit {{ $recipe->name }} Recipe</h1>
    <br>

    <form method="POST" action="{{ route('admin.recipe.edit.post', ['id' => $recipe->id]) }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $recipe->name }}">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $recipe->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <select name="ingredient_id[]" class="form-control @error('ingredient_id[]') is-invalid @enderror" style="height: 250px;" multiple>
                @if($recipe->ingredients)
                    @foreach($recipe->ingredients as $ingredient)
                        <option class="bg-success" value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                    @endforeach
                @endif
                @foreach($ingredients as $ingredient)
                        <option  value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                @endforeach
            </select>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $recipe->description }}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>



@endsection
