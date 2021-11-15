@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
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
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Pizza List</div>
                <div class="card-body">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Pizza Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                        <th scope="col">S. Price</th>
                        <th scope="col">M. Price</th>
                        <th scope="col">L. Price</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pizzas as $key => $pizza)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td><img src="{{ Storage::url($pizza->image) }}" alt="Pizza Image" width="50px"></td>
                            <td>{{ $pizza->name }}</td>
                            <td>{{ $pizza->description }}</td>
                            <td>{{ $pizza->category }}</td>
                            <td>{{ $pizza->small_pizza_price }}</td>
                            <td>{{ $pizza->medium_pizza_price }}</td>
                            <td>{{ $pizza->large_pizza_price }}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm">Edit</a>
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @empty

                        @endforelse

                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
