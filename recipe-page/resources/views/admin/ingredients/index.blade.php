@extends('components/admin_layout')
@section('title', 'admin-all-ingredients')
@section('content')

    <h1>Ingredients/Admin</h1>

    @include('components.alert.success_message')

    <div class="row">
        <div class="col">
            <a href="{{ route('admin.ingredient.create.get') }}" class="btn btn-success">Create a new Ingredient</a>
        </div>
    </div>
    <br>

    <table class="table table-success table-striped">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Is active</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </thead>

        <tbody>
            @foreach($ingredients as $ingredient)
                <tr>
                    <th scope="row">{{ $ingredient->id }}</th>

                    <td>
                        <a class="text-decoration-none" href="{{ route('admin.ingredient.page', ['id' => $ingredient->id]) }}">
                            {{ $ingredient->name }}
                        </a>
                    </td>

                    <td>{{$ingredient->is_active}}</td>

                    <td>
                        <a href="{{ route('admin.ingredient.edit', ['id' => $ingredient->id]) }}" class="btn btn-info">Edit</a>
                    </td>

                    <td>
                        <form action="{{ route('admin.ingredient.delete', ['id' => $ingredient->id]) }}" method="post">
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
        {{ $ingredients->links() }}
    </div>

@endsection
