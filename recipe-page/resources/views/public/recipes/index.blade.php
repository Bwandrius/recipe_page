@extends('components.home_page_layout')
@section('title', 'All Recipes')
@section('content')


    <form method="GET" action="{{ route('public.all.recipes') }}">
        @csrf

        <div class="form-group">
            <label for="category">Category:</label>
            <select name="category_id" id="category" class="form-control">
                <option value="">-- All Categories --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label" >Recipe name:</label>
            <input @if($recipes)  @endif type="text" name="name" class="form-control" placeholder="Recipe name">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Apply Filters</button>
    </form>

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
                        <div class="card-body" style="min-height: 220px;">
                            <div class="col">
                                <div class="col-md-8">
                                    <h5 class="card-title">
                                        <a class="text-decoration-none"
                                           href="{{ route('public.single.recipe', ['id' => $recipe->id]) }}">
                                            {{$recipe->name}}
                                        </a>
                                    </h5>
                                </div>
                                <div >
                                    <h5>{{ $recipe->category->name ?? 'No category' }}</h5>
                                </div>
                            </div>
                            <p class="card-text">
                                {{ substr($recipe->description, 0, 50) }}
                                {{ strlen($recipe->description) > 100 ? "..." : "" }}
                            </p>
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
