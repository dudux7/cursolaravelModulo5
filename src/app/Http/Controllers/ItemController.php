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
            'explorer_id' => 'required|numeric|exists:explorers,id',
        ]);

        $itemSave = Item::create($item);
        return response()->json($itemSave);
    }

    public function exchangeItems(Request $request) {
        $exchangeItems = $request->validate([
            'explorer_1_id' => 'required|exists:explorers,id',
            'item_1_id'=> 'required|exists:items,id',
            'explorer_2_id'=> 'required|exists:explorers,id',
            'item_2_id'=> 'required|exists:items,id'
        ]);

        $itemOne = Item::find($exchangeItems['item_1_id']);
        $itemTwo = Item::find($exchangeItems['item_2_id']);

        if ($itemOne->explorer->id != $exchangeItems['explorer_1_id']) {
            return response()->json(['erro' => 'item 1 nao pertence ao explorador 1'], 404);
        }

        if ($itemTwo->explorer->id != $exchangeItems['explorer_2_id']) {
            return response()->json(['erro' => 'item 2 nao pertence ao explorador 2'], 404);
        }

        $itemOne->explorer_id = $exchangeItems['explorer_2_id'];
        $itemTwo->explorer_id = $exchangeItems['explorer_1_id'];

        $itemOne->save();
        $itemTwo->save();

        return response()->json('a troca de itens foi realizada');
    }
}
