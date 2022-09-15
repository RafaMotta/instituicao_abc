<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MateriaisController extends Controller
{
    public function index()
    {
        $material = Material::all();

        if(count($material) > 0){
            return $material;
        }else{
            return [
                [
                    'id' => '',
                    'descricao' => true,
                ]
            ];
        }
    }

    public function store(Request $request)
    {
        $validData = $request->validate([
            'descricao' => 'string|max:100'
        ]);
        return Material::create($validData);
    }

    public function show(Material $material)
    {
        return $material;
    }

    public function update(Request $request, Material $material)
    {

        $validData = $request->validate([
            'id' => 'numeric',
            'descricao' => 'string|max:100'
        ]);

        if($validData['id'] != $material->id) {
            abort(422, 'id inconsistente');
        }
        $material->fill($validData);
        $material->save();
        return $material;
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return $material;
    }
}
