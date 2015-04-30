<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Response;
use App\Model\Enquete;
use App\Model\Pergunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerguntaController extends Controller
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
        $enquete_id = $request->input('enquete_id');

        /*
         * Infelizmente o Lumen não possui a camada de Requests do Laravel AINDA
         * toda validação deve ser feita ou na controladora ou nas rotas.
         * */
        $validator = Validator::make(
            [
                'nome' => $nome,
                'enquete_id' => $enquete_id
            ],
            [
                'nome' => 'required|max:255',
                'enquete_id' => 'required|integer'
            ]
        );

        if (!$validator->fails()) {
            $pergunta = Pergunta::create($request->all());

            return response()->json($pergunta);
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
            $enquete = Pergunta::find($id);
            $enquete->delete($id);

            return response()->json(array('retorno' => true));
        } else {
            return response()->json(array('retorno' => false));
        }
    }
} 