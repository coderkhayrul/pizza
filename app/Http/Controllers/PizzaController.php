<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaRequest;
use App\Http\Requests\PizzaUpdateRequest;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::orderBy('id', 'asc')->get();
        return view('backend.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzaRequest $request)
    {
        $path = $request->image->store('public/pizza');
        Pizza::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'small_pizza_price' => $request->get('small_pizza_price'),
            'medium_pizza_price' => $request->get('medium_pizza_price'),
            'large_pizza_price' => $request->get('large_pizza_price'),
            'category' => $request->get('category'),
            'image' => $path,
        ]);
        return redirect()->back()->with('success', "Pizza created Successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pizza $pizza)
    {
        return view('backend.edit', compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PizzaUpdateRequest $request, Pizza $pizza)
    {
        if (!empty($request->has('image'))) {
            $path = $request->image->store('public/pizza');
        } else {
            $path = $pizza->image;
        }

        $pizza->name = $request->name;
        $pizza->description = $request->description;
        $pizza->small_pizza_price = $request->small_pizza_price;
        $pizza->medium_pizza_price = $request->medium_pizza_price;
        $pizza->large_pizza_price = $request->large_pizza_price;
        $pizza->category = $request->category;
        $pizza->image = $path;
        $pizza->update();

        return redirect()->route('pizza.index')->with('success', 'Pizza Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizza $pizza)
    {
        $pizza->delete();
        return redirect()->route('pizza.index')->with('success', 'Pizza Deleted Successfully!');
    }
}
