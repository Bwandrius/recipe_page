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
                    <option value="{{ $category->id }}" {{ (string) $category->id === (string)
                        ($request->input('category_id') ?? old('category_id')) ? 'selected' : '' }}>
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
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card">
                        @if($recipe->image)
                            <img class="img-fluid mb-2" style="max-height: 190px; margin: 10px; border-radius: 5px;"
                                 src="{{ 'storage/images/' . $recipe->image }}" alt="{{ $recipe->name }}">
                        @else
                            <img class="img-fluid mb-2" style="max-height: 190px; margin: 10px; border-radius: 5px;"
                                src="{{ asset('storage/images/default.jpg') }}" alt="{{ $recipe->name }}" >
                        @endif
                        <div class="card-body" style="min-height: 170px; position: relative;">
                            <div class="col">
                                <div class="col-md-8">
                                    <h5 class="card-title">{{ $recipe->name }}</h5>
                                </div>
                                <div >
                                    <h5>{{ $recipe->category->name ?? 'No category' }}</h5>
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

    <div class="d-flex justify-content-end">
        {{ $recipes->links() }}
    </div>

@endsection
