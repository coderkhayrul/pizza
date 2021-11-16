@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    <ul class="list-group ">
                        <a href="" class="list-group-item list-group-item-action">Category 1</a>
                        <a href="" class="list-group-item list-group-item-action">Category 2</a>
                        <a href="" class="list-group-item list-group-item-action">Category 3</a>
                        <a href="" class="list-group-item list-group-item-action">Category 4</a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>

                <div class="card-body">
                    <div class="row">
                        @forelse ($pizzas as $pizza)
                            <div class="col-md-4 mt-2 text-center" style="border: 1px solid #ccc;">
                                <img src="{{ Storage::url($pizza->image) }}" alt="PizzaImage" class="img-thumbnail" style="width:100%">
                                <p>Name: {{ $pizza->name }}</p>
                                <p>Description: {{ $pizza->description }}</p>
                                <a href="{{ route('frontpizza.show',$pizza->id) }}" class="btn btn-danger mb-1">Order Now</a>
                            </div>
                        @empty
                            <p>No Pizza To Show</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    a.list-group-item {
        font-size:18px;
    }
    a.list-group-item:hover{
        background-color: red;
        color: #fff;
    }
    .card-header{
        background-color:red;
        color: #fff;
        font-size:20px;
    }
</style>
@endsection
