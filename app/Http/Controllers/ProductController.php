<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'asc');
        $products = Product::orderBy('price', $sort)->get();
        return view('index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
            
        ]);
    
        Product::create($request->all());
    
        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }
    public function create(){
        return view('create');
    }

}
