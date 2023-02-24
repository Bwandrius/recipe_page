@extends('components.home_page_layout')
@section('title', 'All Recipes')
@section('content')


    <div class="container">
        <div class="row mt-4">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-img-container" style="max-height: 100%;">

                        @if($recipe->image)
                            <img src="{{ asset('storage/images/' . $recipe->image) }}"
                                 alt="{{ $recipe->name }}" class="img-fluid mb-2">
                        @else
                            <img src="{{ asset('storage/images/default.jpg') }}"
                                 alt="{{ $recipe->name }}" class="img-fluid mb-2">
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">

                        <div>
                            <h5 class="card-title">{{ $recipe->name }}</h5>
                            <p class="card-text">Category: {{$recipe->category->name}}</p>
                        </div>
                        <br>

                        <div>
                            <p>Ingredients:</p>
                            <ul>
                                @foreach($recipe->ingredients as $ingredient)
                                    <li>{{$ingredient->name}}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Description</h5>
                        <p class="card-text">{{$recipe->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
