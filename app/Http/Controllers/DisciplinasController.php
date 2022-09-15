<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;

class DisciplinasController extends Controller
{
    public function index()
    {
        $disciplina = Disciplina::all();

        if(count($disciplina) > 0){
            return $disciplina;
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
        return Disciplina::create($validData);
    }

    public function show(Disciplina $disciplina)
    {
        return $disciplina;
    }

    public function update(Request $request, Disciplina $disciplina)
    {

        $validData = $request->validate([
            'id' => 'numeric',
            'descricao' => 'string|max:100'
        ]);

        if($validData['id'] != $disciplina->id) {
            abort(422, 'id inconsistente');
        }
        $disciplina->fill($validData);
        $disciplina->save();
        return $disciplina;
    }

    public function destroy(Disciplina $disciplina)
    {
        $disciplina->delete();
        return $disciplina;
    }
}
