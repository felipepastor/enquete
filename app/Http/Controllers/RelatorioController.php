<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Response;
use App\Model\Enquete;

class RelatorioController extends Controller
{
    public function findAll($id)
    {
        $relatorio = Enquete::with(array('perguntas.respostas.avaliacoes'))->find($id)->toArray();

        $arrayReturn = [];
        foreach ($relatorio['perguntas'] as $k => $pergunta) {
            $arrayLabels = [];
            $arrayData = [];
            foreach($pergunta['respostas'] as $resposta) {
                $arrayLabels[] = $resposta['nome'];
                $arrayData[] = sizeof($resposta['avaliacoes']);
            }

            if(!array_filter($arrayData))
                $arrayReturn[$k]['data'] = [];
            else
                $arrayReturn[$k]['data'] = $arrayData;

            $arrayReturn[$k]['nome'] = $pergunta['nome'];
            $arrayReturn[$k]['label'] = $arrayLabels;
        }

//        dd(json_encode($arrayReturn));

        return response()->json($arrayReturn);
    }
} 