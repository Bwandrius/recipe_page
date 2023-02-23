@extends('components.home_page_layout')
@section('title', 'All Recipes')
@section('content')


    <div class="container" style="margin-top: 2vh;">
        <div class="row">
            @foreach($recipes as $recipe)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        @if($recipe->image)
                            <img class="card-img-top" style="max-height: 250px;"
                                 src="{{ 'storage/images/' . $recipe->image }}" alt="{{ $recipe->name }}">
                        @else
                            <img src="{{ asset('storage/images/default.jpg') }}"
                                 alt="{{ $recipe->name }}" class="img-fluid mb-2">
                        @endif
                        <div class="card-body" style="min-height: 200px;">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="card-title">
                                        <a class="text-decoration-none"
                                           href="{{ route('public.single.recipe', ['id' => $recipe->id]) }}">
                                            {{$recipe->name}}
                                        </a>
                                    </h5>
                                </div>
                                <div class="col-md-4">
                                    <h5>{{ $recipe->category->name ?? 'No category' }}</h5>
                                </div>
                            </div>
                            <p class="card-text">{{ substr($recipe->description, 0, 50) }}{{ strlen($recipe->description) > 100 ? "..." : "" }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div class="d-flex justify-content-end">
        {{ $recipes->links() }}
    </div>

@endsection
