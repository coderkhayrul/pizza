@extends('layouts.app')

@section('content')
{{-- <div class="container">
</div> --}}

<div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order</li>
                </ol>
            </nav>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Order List</div>

                <div class="card-body">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">User</th>
                            <th scope="col">Phone/Email</th>
                            <th scope="col">Date/Time</th>
                            <th scope="col">Pizza</th>
                            <th scope="col">Small Pizza</th>
                            <th scope="col">Medium Pizza</th>
                            <th scope="col">Large Pizza</th>
                            <th scope="col">Total($)</th>
                            <th scope="col">Message</th>
                            <th scope="col">Status</th>
                            <th scope="col">Accepted</th>
                            <th scope="col">Reject</th>
                            <th scope="col">Completed</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr>
                            <th>{{ $order->user->name }}</th>
                            <th>{{ $order->user->email }}</br>{{ $order->phone }}</th>
                            <th>{{ $order->date }}/{{ $order->time }}</th>
                            <th>{{ $order->pizza->name }}</th>
                            <th>{{ $order->small_pizza }}</th>
                            <th>{{ $order->medium_pizza }}</th>
                            <th>{{ $order->large_pizza }}</th>
                            <th>
                                ${{
                                    ($order->pizza->small_pizza_price * $order->small_pizza) +
                                    ($order->pizza->medium_pizza_price * $order->medium_pizza) +
                                    ($order->pizza->large_pizza_price * $order->large_pizza)
                                }}
                            </th>
                            <th>{{ $order->body }}</th>
                            <th>
                                @if ($order->status == 'pending')
                                <p>{{ $order->status }}</p>
                                @elseif ($order->status == 'accepted')
                                <p class="text-primary">{{ $order->status }}</p>
                                @elseif ($order->status == 'rejected')
                                <p class="text-danger">{{ $order->status }}</p>
                                @else
                                <p class="text-success">{{ $order->status }}</p>
                                @endif
                            </th>
                            <form action="{{ route('order.status',$order->id) }}" method="post">
                                @csrf
                                <th>
                                    <input type="submit" value="accepted" name="status" class="btn btn-primary btn-sm">
                                </th>
                                <th>
                                    <input type="submit" value="rejected" name="status" class="btn btn-danger btn-sm">
                                </th>
                                <th>
                                    <input type="submit" value="complected" name="status" class="btn btn-success btn-sm">
                                </th>
                            </form>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
