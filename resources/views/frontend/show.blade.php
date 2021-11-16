@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    @if (Auth::check())
                    <form action="{{ route('order.store',$pizza->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <p>Name: {{ Auth::user()->name }}</p>
                            <p>Email: {{ Auth::user()->email }}</p>
                            <p>Phone Number: <input type="number" class="form-control" name="phone"></p>
                            <p>Small Pizza Order: <input type="number" class="form-control" name="small_pizza" value="0"></p>
                            <p>Medium Pizza Order: <input type="number" class="form-control" name="medium_pizza" value="0"></p>
                            <p>Large Pizza Order: <input type="number" class="form-control" name="large_pizza" value="0"></p>
                            <p><input type="hidden" class="form-control" name="pizza_id" value="{{ $pizza->id }}"></p>
                            <p><input type="date" class="form-control" name="date"></p>
                            <p><input type="time" class="form-control" name="time"></p>
                            <p><textarea name="body" class="form-control" ></textarea></p>

                            <p class="text-center">
                                <button class="btn btn-danger" type="submit">Make Order</button>
                            </p>
                        </div>
                    </form>
                    @else
                    <a href="{{ route('login') }}">Please Login To Make Order</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>

                <div class="card-body">
                    <img src="{{ Storage::url($pizza->image) }}" alt="PizzaImage" class="img-thumbnail" style="width:100%">
                        <p><h3>Name: {{ $pizza->name }}</h3></p>
                        <p><h3>Description: {{ $pizza->description }}</h3></p>
                        <p>Small Pizza Price : {{ $pizza->small_pizza_price }}$</p>
                        <p>Medium Pizza Price : {{ $pizza->medium_pizza_price }}$</p>
                        <p>Large Pizza Price : {{ $pizza->large_pizza_price }}$</p>
                        <a href="" class="btn btn-danger mb-1">Order Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    a.list-group-item {
        font-size: 18px;
    }

    a.list-group-item:hover {
        background-color: red;
        color: #fff;
    }

    .card-header {
        background-color: red;
        color: #fff;
        font-size: 20px;
    }

</style>
@endsection
