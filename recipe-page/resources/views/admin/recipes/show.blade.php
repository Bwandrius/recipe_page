@extends('components/admin_layout')
@section('title', 'admin-single-recipes')
@section('content')

    <h1>{{ $recipe->name }}</h1>
    <h5>
        @if($recipe->deleted_at) DELETED/DISABLED @endif
    </h5>
    <br>

    <div class="container">
        <div class="row mt-4">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body ">

                        @if($recipe->image)
                            <img class="img-thumbnail" src="{{ asset($recipe->image) }}" alt="IMG">
                        @else
                            <p>N/A</p>
                        @endif

                        <h5 class="card-title">Item 1</h5>
                        <p class="card-text">This is the first item.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">{{ $recipe->name }}</h5>
                            <p class="card-text">Category:
                                <a class="text-decoration-none"
                                   href="{{ route('admin.category.page', ['id' => $recipe->category->id]) }}">
                                   {{$recipe->category->name}}
                                </a>
                            </p>
                        </div>
                        <br>
                        <div>
                            <p>Ingredients:</p>
                            <ul>
                                @foreach($ingredients as $ingredient)
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
                        <h5 class="card-title">Paragraph</h5>
                        <p class="card-text">{{$recipe->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
