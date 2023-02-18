@extends('components/admin_layout')
@section('title', 'admin-all-recipes')
@section('content')

@include('components.alert.success_message')

    <h1>{{ $category->name }}</h1>
    <h5>
        @if($category->deleted_at) DELETED/DISABLED @endif
    </h5>
    <br>

    <form method="POST" action="{{ route('admin.category.edit.post', ['id' => $category->id]) }}">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $category->name }}">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <input type="checkbox" name="is_active" class="form-check-input" value="1" @if ($category->is_active)  @endif>
            <label class="form-check-label">Active?</label>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Save</button>

    </form>

@endsection
