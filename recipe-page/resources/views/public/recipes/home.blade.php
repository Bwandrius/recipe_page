@extends('components.home_page_layout')
@section('title', 'Gluttonous')
@section('content')


    <br>

    <div class="container" style="margin-top: 2vh;">
        <div class="row">
            @foreach($recipes as $recipe)
                <div class="col-md-5 col-lg-3 mb-4">
                    <div class="card">
                        @if($recipe->image)
                            <img class="img-fluid mb-2" style="max-height: 190px; margin: 10px; border-radius: 5px;"
                                 src="{{ 'storage/images/' . $recipe->image }}" alt="{{ $recipe->name }}">
                        @else
                            <img class="img-fluid mb-2" style="max-height: 190px; margin: 10px; border-radius: 5px;"
                                src="{{ asset('storage/images/default.jpg') }}" alt="{{ $recipe->name }}">
                        @endif
                        <div class="card-body" style="min-height: 170px; position: relative;">
                            <div class="col">
                                <div class="col-md-8">
                                    <h4 class="card-title">{{ $recipe->name }}</h4>
                                </div>
                                <div class="col-md-6">
                                    <h5>{{ $recipe->category->name }}</h5>
                                </div>
                            </div>
                            <a href="{{ route('public.single.recipe', ['id' => $recipe->id]) }}"
                               style="position: absolute; bottom: 10px">
                                <h5>link</h5>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
