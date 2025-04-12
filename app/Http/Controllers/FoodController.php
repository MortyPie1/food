<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    // Show dashboard
    public function index()
    {
        $foods = Food::all();

        return view('dashboard', compact('foods'));
    }

    // Store new food
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'plu_code' => 'required|string|max:255',
        ]);

        // Check if the data is being passed correctly
        if (!$request->has('name') || !$request->has('plu_code')) {
            return back()->with('error', 'Food name and PLU code are required.');
        }

        // Create a new food item
        $food = \App\Models\Food::create([
            'name' => $request->name,
            'plu_code' => $request->plu_code,
        ]);

        // Check if the food was successfully created
        if ($food) {
            return redirect()->route('dashboard')->with('success', 'Food added successfully!');

        } else {
            return back()->with('error', 'Failed to add food.');
        }
    }}
