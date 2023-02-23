@extends('components.home_page_layout')
@section('title', 'Gluttonous')
@section('content')


    <br>

    <div class="container" style="margin-top: 2vh;">
        <div class="row">
            @foreach($recipes as $recipe)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        @if($recipe->image)
                            <img class="card-img-top" style="max-height: 190px;"
                                 src="{{ 'storage/images/' . $recipe->image }}" alt="{{ $recipe->name }}">
                        @else
                            <img src="{{ asset('storage/images/default.jpg') }}"
                                 alt="{{ $recipe->name }}" class="img-fluid mb-2">
                        @endif
                        <div class="card-body" style="min-height: 200px;">
                            <div class="col">
                                <div class="col-md-8">
                                    <h5 class="card-title">{{ $recipe->name }}</h5>
                                </div>
                                <div class="col-md-4">
                                    <h5>{{ $recipe->category->name }}</h5>
                                </div>
                            </div>
                            <p class="card-text">{{ substr($recipe->description, 0, 100) }}{{ strlen($recipe->description) > 100 ? "..." : "" }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
