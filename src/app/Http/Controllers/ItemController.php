<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function store(Request $request) {
        $item = $request->validate([
            'name' => 'required',
            'valor' => 'required|numeric',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'explorers_id' => 'required|numeric|exists:explorers,id',
        ]);

        $itemSave = Item::create($item);
        return response()->json($itemSave);
    }

}
