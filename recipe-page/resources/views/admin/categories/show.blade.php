@extends('components/admin_layout')
@section('title', 'admin-all-recipes')
@section('content')


    <h1>Recipes in {{ $category->name }} category</h1>
    <h5>
        @if($category->deleted_at) DELETED/DISABLED @endif
    </h5>
    <br>

    <div class="container-fluid mt-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

            @foreach($category->recipes as $recipe)

                <div class="col">
                    <div class="card h-100">

                        @if($recipe->image)
                            <img class="img-thumbnail card-img-top" src="{{ asset($recipe->image) }}" alt="IMG">
                        @endif

                        <div class="card-body">

                            <h5 class="card-title" >
                                <a class="text-decoration-none"
                                   href="{{ route('admin.recipe.page', ['id' => $recipe->id]) }}">
                                    {{ $recipe->name }}
                                </a>
                            </h5>

                            @foreach($recipe->ingredients as $ingredient)
                                <p class="card-text">{{ $ingredient->name }}</p>
                            @endforeach


                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>

    <br>





@endsection
