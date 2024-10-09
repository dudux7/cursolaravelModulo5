<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Explorer;


class ExplorerController extends Controller
{
    public function store(Request $request) {
        $explorer = $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);

        $explorerSave = Explorer::create($explorer);
        return response()->json($explorerSave);
    }

    public function show($id) {
        $explorer = Explorer::find($id);

        if (!$explorer) {
            return response()->json(['erro' => 'explorer não encontrado'], 404);
        }

        return response()->json($explorer);
    }

    public function update(Request $request, $id) {
        $explorer = $request->validate([
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);

        $explorerSave = Explorer::find($id);

        if (!$explorerSave) {
            return response()->json(['erro' => 'Explorador não encontrado'], 404);
        }

        $explorerSave->update($explorer);
        return response()->json($explorerSave);
    }
}
