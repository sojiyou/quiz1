<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryModel;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all the items from the inventory.
        $inventoryItems = inventoryModel::all();

        return view('inventory.index', compact('inventoryItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show the page where users can add a new item.
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if the user entered everything correctly.
        $validated = $request->validate([
            'name' => 'required|string|min:3', //name atleast 3 letters
            'quantity' => 'required|integer|min:0', //must be number and not negative
            'price' => 'required|numeric|min:0', //must be number and not negative
        ]);

        // Save the new item to the inventory
        InventoryModel::create($validated);

        // Go back to the list of items and show a succes message.
        return redirect(env('APP_URL') . '/inventory')->with('sucess', 'Item added succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the item by its ID
        $inventoryItems = InventoryModel::find($id);

        // If the item is not found, go back to the list with an error message.
        if(!$inventoryItems) {
            return redirect(env('APP_URL') . '/inventory')->with('error', 'Item not found');
        }

        // Show the page to edit the item.
        return view('inventory.edit', compact('inventoryItems'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Check if the user entered everything correctly.
        $validated = $request->validate([
            'name' => 'required|string|min:3', //name atleast 3 letters
            'quantity' => 'required|integer|min:0', //must be number and not negative
            'price' => 'required|numberic|min:0', //must be number and not negative
        ]);

        // Find teh item by its ID.
        $inventoryItems = InventoryModel::find($id);

        // If the item is not found, go back to the list with an error message.
        if (!$inventoryItems) {
            return redirect(env('APP_URL') . '/inventory')
           ->with('error', 'Item not found.');

        }

        $inventoryItems->update($validated);

        return redirect(env('APP_URL' . '/inventory'))->with('success', 'Item updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the item by its ID.
        $inventoryItems = InventoryModel::find($id);

        // If the item is not found, go back to the list with an error message.
        if (!$inventoryItem) {
            return redirect(env('APP_URL' . '/inventory'))
               ->with('error', 'Item not found');

        }



        // Remove the item from the inventory.
        $inventoryItem->delete();



        // Go back to the list of items and show a success message.
        return redirect(env('APP_URL') . '/inventory')
           ->with('success', 'Item deleted successfully.');
    
    }
}
