<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Carne;
use App\Models\Parcela;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarneController extends Controller
{

    public function criarCarne(Request $request)
    {
        $data = $request->validate([
            'valor_total' => 'required|numeric',
            'qtd_parcelas' => 'required|integer|min:1',
            'data_primeiro_vencimento' => 'required|date',
            'periodicidade' => 'required|in:mensal,semanal',
            'valor_entrada' => 'nullable|numeric|min:0',
        ]);

        $valorTotal = $data['valor_total'];
        $qtdParcelas = $data['qtd_parcelas'];
        $dataPrimeiroVencimento = $data['data_primeiro_vencimento'];
        $periodicidade = $data['periodicidade'];
        $valorEntrada = $data['valor_entrada'] ?? 0;
        
        $carne = Carne::create([
            'valor_total' => $valorTotal,
            'qtd_parcelas' => $qtdParcelas,
            'data_primeiro_vencimento' => $dataPrimeiroVencimento,
            'periodicidade' => $periodicidade,
            'valor_entrada' => $valorEntrada
        ]);

        $valorRestante = $valorTotal - $valorEntrada;
        $valorParcela = round($valorRestante / $qtdParcelas, 2);
        $dataVencimento = new DateTime($dataPrimeiroVencimento);

        if ($valorEntrada > 0) {
            Parcela::create([
                'carne_id' => $carne->id, 
                'data_vencimento' => $dataPrimeiroVencimento,
                'valor' => $valorEntrada,
                'numero' => 0,
                'entrada' => true
            ]);
        }

        for ($i = 1; $i <= $qtdParcelas; $i++) {
            Parcela::create([
                'carne_id' => $carne->id,
                'data_vencimento' => $dataVencimento->format('Y-m-d'),
                'valor' => $valorParcela,
                'numero' => $i,
            ]);

            if ($periodicidade == Carne::PERIODICIDADE_MENSAL) {
                $dataVencimento->modify('+1 month');
            } elseif ($periodicidade == Carne::PERIODICIDADE_SEMANAL) {
                $dataVencimento->modify('+1 week');
            }
        }

        return response()->json([
            'total' => $valorTotal,
            'valor_entrada' => $valorEntrada,
            'valor_parcelas' => $valorParcela,
            'qtd_parcelas' => $qtdParcelas,
        ]);
    }

    public function recuperarParcelas($id)
    {
        $carne = Carne::with('parcelas')->findOrFail($id);
        return response()->json($carne->parcelas);
    }
}
