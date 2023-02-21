@extends('components/admin_layout')
@section('title', 'admin-all-recipes')
@section('content')

    <h1>Categories/Admin</h1>

@include('components.alert.success_message')

    <div class="row">
        <div class="col">
            <a href="{{ route('admin.category.create') }}" class="btn btn-success">Create a new Category</a>
        </div>
    </div>
    <br>

    <table class="table table-success table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Category Name</th>
            <th scope="col">recipes</th>
            <th scope="col">Is Active</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>
                    <a class="text-decoration-none" href="{{ route('admin.category.page', ['id' => $category->id]) }}">
                        {{ $category->name }}
                    </a>
                </td>

                <td>{{ $category->recipes->count() }}</td>

                <td>{{ $category->is_active }}</td>

                <td>
                    <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}" class="btn btn-info">Edit</a>
                </td>

                <td>
                    <form action="{{ route('admin.category.delete', ['id' => $category->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>

    <div class="d-flex justify-content-end">
        {{ $categories->links() }}
    </div>


@endsection
