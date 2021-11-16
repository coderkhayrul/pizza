<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $pizzas = Pizza::latest()->get();
        return view('frontend.index', compact('pizzas'));
    }

    public function show(Pizza $pizza)
    {
        return view('frontend.show', compact('pizza'));
    }
    public function store(Request $request, Pizza $pizza)
    {
        if ($request->small_pizza == 0 && $request->medium_pizza == 0 && $request->large_pizza == 0) {
            return "At Last One Pizza Order";
        }
        return $request->all();
    }
}
