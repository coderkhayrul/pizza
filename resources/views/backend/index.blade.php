@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    <ul class="list-group">
                        <a href="" class="list-group-item list-group-item-action">View</a>
                        <a href="" class="list-group-item list-group-item-action">Create</a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Pizza</div>

                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <label for="name">Name Of Pizza</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Your Pizza Name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description Of Pizza</label>
                            <textarea class="form-control" name="description" id="description" cols="30"></textarea>
                        </div>
                        <div class="form-inline">
                            <label for="price">Pizza Price($)</label>
                            <input type="number" class="form-control" id="" placeholder="Small Pizza Price">
                            <input type="number" class="form-control" id="" placeholder="Medium Pizza Price">
                            <input type="number" class="form-control" id="" placeholder="Large Pizza Price">
                        </div>
                        <div class="form-group">
                            <label for="category">Category Of Pizza</label>
                            <select class="form-control" name="pizza_category" id="">
                                <option value="">Select Your Category</option>
                                <option value="vegetarian">Vegetarian Pizza</option>
                                <option value="nonvegetarian">Non Vegetarian Pizza</option>
                                <option value="traditional">Traditional Pizza</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image Of Pizza</label>
                            <input type="file" class="form-control" name="image">
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
