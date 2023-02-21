@extends('components/admin_layout')
@section('title', 'admin-ingredient')
@section('content')

    <h1>{{ $ingredient->name }}</h1>
    <br>

    @if($ingredient->is_active === false)
        <h5>DELETED/DEACTIVATED</h5>
        <br>
    @endif

    <table class="table table-success table-striped">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Recipe count</th>
        </thead>

        <tbody>
            <tr>
                <th>{{ $ingredient->id }}</th>

                <td>{{ $ingredient->name }}</td>

                <td>{{ $ingredient->recipe_count }}</td>
            </tr>
        </tbody>
    </table>
    <br>

    <h5>Recipes featuring {{ $ingredient->name }}</h5>
    <br>

    <table class="table table-success table-striped">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">is_active</th>
        </thead>
        <tbody>
            @foreach($recipes as $recipe)
                <tr>
                    <th>{{ $recipe->id }}</th>

                    <td>
                        <a class="text-decoration-none" href="{{ route('admin.recipe.page', ['id' => $recipe->id]) }}">
                            {{ $recipe->name }}
                        </a>
                    </td>

                    <td>{{$recipe->category ? $recipe->category->name : 'N/A'}}</td>

                    <td>{{$recipe->is_active}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $recipes->links() }}
    </div>


@endsection

