@extends('components/admin_layout')
@section('title', 'admin-create-recipe')
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <form method="POST" action="{{ route('admin.recipe.create.post') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }} {{old('category_id')}}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <select name="ingredient_id[]" class="form-control" style="height: 200px;" multiple>
                @foreach($ingredients as $ingredient)
                    <option  value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" name="image" value="{{ old('image') }}">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" id="description" rows="4">{{ old('description') }}</textarea>
        </div>

        <br>

        <button type="submit" class="btn btn-success">Save</button>

        <div class="form-group">
            <input type="checkbox" name="is_active" class="form-check-input" value="1" @if (old('is_active')) checked @endif>
            <label class="form-check-label">Enabled?</label>
        </div>
    </form>

@endsection
