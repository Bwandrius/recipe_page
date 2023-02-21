@extends('components/admin_layout')
@section('title', 'admin-create-recipe')
@section('content')

    <h1>Create a new recipe</h1>

    <form method="POST" action="{{ route('admin.recipe.create') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                   id="name" name="name" value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }} {{old('category_id')}}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Ingredients</label>
            <select name="ingredient_id[]" class="form-control @error('ingredient_id[]') is-invalid @enderror" style="height: 250px;" multiple>
                @foreach($ingredients as $ingredient)
                    <option  value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Image</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" value="{{ old('image') }}">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" id="description" rows="4">{{ old('description') }}</textarea>
        </div>

        <br>

        <button type="submit" class="btn btn-success">Save</button>

        <div class="form-group">
            <input type="checkbox" name="is_active" class="form-check-input" value="1" @if (old('is_active')) checked @endif>
            <label class="form-check-label">Active?</label>
        </div>
    </form>

@endsection
