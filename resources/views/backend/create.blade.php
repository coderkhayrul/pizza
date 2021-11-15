@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{ route('pizza.index') }}" class="list-group-item list-group-item-action">View</a>
                        <a href="{{ route('pizza.create') }}" class="list-group-item list-group-item-action">Create</a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>
                <div class="card-body">
                    <form action="{{ route('pizza.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name Of Pizza</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Your Pizza Name" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description Of Pizza</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" value="{{ old('description') }}"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label for="price">Pizza Price($)</label>
                        <div class="form-inline">
                            <input name="small_pizza_price" type="number" class="form-control @error('small_pizza_price') is-invalid @enderror" id="" placeholder="Small Pizza Price" value="{{ old('small_pizza_price') }}">
                            <input name="medium_pizza_price" type="number" class="form-control m-1 @error('medium_pizza_price') is-invalid @enderror" id="" placeholder="Medium Pizza Price" value="{{ old('medium_pizza_price') }}">
                            <input name="large_pizza_price" type="number" class="form-control @error('large_pizza_price') is-invalid @enderror" id="" placeholder="Large Pizza Price" value="{{ old('large_pizza_price') }}">
                        </div>
                        <div class="form-group">
                            <label for="category">Category Of Pizza</label>
                            <select class="form-control @error('category') is-invalid @enderror" name="category" id="" value="{{ old('category') }}">
                                <option value="" disabled>Select Your Category</option>
                                <option value="vegetarian">Vegetarian Pizza</option>
                                <option value="nonvegetarian">Non Vegetarian Pizza</option>
                                <option value="traditional">Traditional Pizza</option>
                            </select>
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Image Of Pizza</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
