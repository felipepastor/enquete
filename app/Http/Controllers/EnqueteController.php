<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Response;
use App\Model\Enquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnqueteController extends Controller
{
    public function form()
    {
        return view('enquete.adicionar');
    }

    public function formEdit()
    {
        return view('enquete.editar');
    }

    public function store(Request $request)
    {
        $nome = $request->input('nome');
        $ativa = $request->input('ativa');

        /*
         * O Lumen não vem com a camada de Request por padrão na sua configuração, onde seria a camada de negócio
         * para tratar os dados. Para este exemplo não irei extender para utilizar esta camada.
         *
         * */
        $validator = Validator::make(
            [
                'nome' => $nome,
                'ativa' => $ativa
            ],
            [
                'nome' => 'required|max:255',
                'ativa' => 'required'
            ]
        );

        if (!$validator->fails()) {
            $enquete = Enquete::create($request->all());

            return response()->json($enquete);
        } else {
            return response()->json($request->all(), 500);
        }
    }

    public function show($id)
    {
        return response()->json(Enquete::with(array('perguntas.respostas'))->find($id));
    }

    public function showAll()
    {
        return response()->json(
            array_values(Enquete::all()->sortByDesc(function ($role) {
                return $role->created_at;
            })->toArray())
        );
    }

    public function delete($id)
    {
        $validator = Validator::make(
            [
                'id' => $id
            ],
            [
                'id' => 'required|integer'
            ]
        );

        if (!$validator->fails()) {
            $enquete = Enquete::find($id);
            $enquete->delete($id);

            return response()->json(array('retorno' => true));
        } else {
            return response()->json(array('retorno' => false));
        }

    }

    public function update(Request $request)
    {
        $enquete = Enquete::find($request->input('id'));
        $enquete->update($request->all());
    }
} 