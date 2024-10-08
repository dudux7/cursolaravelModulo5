<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\explorer;


class explorerController extends Controller
{
    public function store(Request $request) {
        $explorer = $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);

        $explorerSave = explorer::create($explorer);

        return response()->json($explorerSave);
    }


}
