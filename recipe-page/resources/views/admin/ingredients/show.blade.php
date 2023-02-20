@extends('components/admin_layout')
@section('title', 'admin-all-ingredients')
@section('content')

    <h1>{{ $ingredient->name }}</h1>
    <br>

    <table class="table table-success table-striped">

        <thead>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Recipe count</th>
        </thead>

        <tbody>
            <th>{{ $ingredient->id }}</th>

            <td>{{ $ingredient->name }}</td>

            <td>{{ $ingredient->recipe_count }}</td>
        </tbody>

    </table>


@endsection

