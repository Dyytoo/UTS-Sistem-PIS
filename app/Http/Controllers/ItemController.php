<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = auth()->user()->items;
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $item = new Item($request->all());
        $item->user_id = auth()->id();
        $item->save();

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $this->authorize('update', $item);
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, Item $item)
    {
        $this->authorize('update', $item);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        
        $item->update($request->all());
        
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $this->authorize('delete', $item);
        $item->delete();
        
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
