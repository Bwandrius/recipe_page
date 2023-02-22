@extends('components/public_layout')
@section('title', 'Gluttonous')
@section('content')

    <div>
        <h1>PLACEHOLDER</h1>
    </div>
    <br>

    <div class="container">
        <div class="row">
            @foreach($recipes as $recipe)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        @if($recipe->image)
                            <img class="card-img-top" style="max-height: 250px;" src="{{ 'storage/images/' . $recipe->image }}" alt="{{ $recipe->name }}">
                        @else
                            <img src="{{ asset('storage/images/default.jpg') }}"
                                 alt="{{ $recipe->name }}" class="img-fluid mb-2">
                        @endif
                        <div class="card-body">
                            <div class="row">
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




    <div class="container">
        <div class="row">
            @foreach($recipes as $recipe)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card text-white" style="opacity: 0.5; background-image: url('{{ $recipe->image ? asset('storage/images/' . $recipe->image) : asset('storage/images/default.jpg') }}'); background-size: cover;">
                        <div class="card-body">
                            <div class="row">
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
