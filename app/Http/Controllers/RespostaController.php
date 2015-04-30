<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Response;
use App\Model\Avaliacao;
use App\Model\Pergunta;
use App\Model\Resposta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RespostaController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input('id');
        return response()->json(
            array_values(Pergunta::all()->sortByDesc(function ($role) {
                return $role->created_at;
            })->where('enquete_id', $id)->toArray())
        );
    }

    public function store(Request $request)
    {
        $nome = $request->input('nome');
        $pergunta_id = $request->input('pergunta_id');

        $validator = Validator::make(
            [
                'nome' => $nome,
                'pergunta_id' => $pergunta_id
            ],
            [
                'nome' => 'required|max:255',
                'pergunta_id' => 'required|integer'
            ]
        );

        if (!$validator->fails()) {
            $resposta = Resposta::create($request->all());

            return response()->json($resposta);
        } else {
            return response()->json($request->all(), 500);
        }
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
            $enquete = Resposta::find($id);
            $enquete->delete($id);

            return response()->json(array('retorno' => true));
        } else {
            return response()->json(array('retorno' => false));
        }
    }

    public function storeAvaliacao(Request $request)
    {
        $resposta_id = $request->input('selectedResposta');

        $validator = Validator::make(
            [
                'resposta_id' => $resposta_id,
            ],
            [
                'resposta_id' => 'required|integer',
            ]
        );

        if (!$validator->fails()) {
//            dd($request->all());

            $avaliacao = Avaliacao::create(array('resposta_id' =>$resposta_id));

            return response()->json($avaliacao);
        } else {
            dd($validator->messages());
            return response()->json($request->all(), 500);
        }
    }
} 