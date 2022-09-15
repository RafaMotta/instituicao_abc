<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;

class TurmasController extends Controller
{
    public function index()
    {
        $turma = Turma::all();

        if(count($turma) > 0){
            return $turma;
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
        return Turma::create($validData);
    }

    public function show(Turma $turma)
    {
        return $turma;
    }

    public function update(Request $request, Turma $turma)
    {
        $validData = $request->validate([
            'id' => 'numeric',
            'descricao' => 'string|max:100'
        ]);

        $turma->fill($validData);
        $turma->save();
        return $turma;
    }

    public function destroy(Turma $turma)
    {
        $turma->delete();
        return $turma;
    }
}
