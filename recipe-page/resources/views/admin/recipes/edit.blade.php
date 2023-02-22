@extends('components/admin_layout')
@section('title', 'admin-edit-recipes')
@section('content')

    <h1>Edit {{ $recipe->name }} Recipe</h1>
    <h5>
        @if($recipe->deleted_at) DELETED/DISABLED @endif
    </h5>
    <br>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.recipe.edit', ['id' => $recipe->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                   id="name" name="name" value="{{ $recipe->name }}">
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
            @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex flex-row">

            <div class="form-group">
                <label for="ingredients">Ingredients</label>
                <select name="ingredient_id[]" class="form-control" style="height: 250px; width: 200px; margin-right: 30px;" multiple>
                    @if($recipe->ingredients)
                        @foreach($recipe->ingredients as $ingredient)
                            <option value="{{ $ingredient->id }}"
                                {{ $recipe->ingredients->contains('id', $ingredient->id) ? 'selected' : '' }}>
                                {{ $ingredient->name }}
                            </option>
                        @endforeach
                    @endif
                    @foreach($ingredients as $ingredient)
                        <option  value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <p>Ingredients:</p>
                <ul>
                    @foreach($recipe->ingredients as $ingredient)
                        <li>{{$ingredient->name}}</li>
                    @endforeach
                </ul>
            </div>

        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">
                {{ $recipe->description }}
            </textarea>
        </div>
        <br>

        <div class="form-group">
            @if($recipe->image)
                <img src="{{ asset('storage/images/' . $recipe->image) }}"
                     style="max-height: 250px;"
                     alt="{{ $recipe->name }}" class="img-fluid mb-2">
            @else
                <p>NO IMAGE</p>
            @endif
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Image</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" value="{{ old('image') }}">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <input type="checkbox" name="is_active" class="form-check-input" value="1" @if ($recipe->is_active) checked @endif>
            <label for="is_active" class="form-check-label">Active?</label>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>



@endsection
