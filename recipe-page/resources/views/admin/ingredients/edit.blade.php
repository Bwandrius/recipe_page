@extends('components/admin_layout')
@section('title', 'admin-edit-ingredient')
@section('content')

    <h1>Edit {{ $ingredient->name }}/Admin</h1>
    <br>

    <form method="POST" action="{{ route('admin.ingredient.edit', ['id' => $ingredient->id]) }}">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $ingredient->name }}">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <input type="checkbox" name="is_active" class="form-check-input" value="1" @if ($ingredient->is_active)  @endif>
            <label class="form-check-label">Active?</label>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection

