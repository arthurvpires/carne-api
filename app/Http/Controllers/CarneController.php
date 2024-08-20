<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Carne;
use App\Models\Parcela;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarneController extends Controller
{
    public function create(Request $request)
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
        $valorEntrada = $data['valor_entrada'] ?? false;

        $carne = $this->novoCarne($data);

        $valorRestante = $valorTotal - $valorEntrada;
        $valorParcela = round($valorRestante / $qtdParcelas, 2);
        $dataVencimento = new DateTime($dataPrimeiroVencimento);
        
        for ($i = 1; $i <= $qtdParcelas; $i++) {
            Parcela::create([
                'carne_id' => $carne->id,
                'data_vencimento' => $dataVencimento->format('Y-m-d'),
                'valor' => $valorParcela,
                'numero' => $i,
                'entrada' => $valorEntrada > 0 ? true : false
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
            'parcelas' => $carne->parcelas,
        ]);
    }

    public function recovery($id)
    {
        $carne = Carne::with('parcelas')->findOrFail($id);
        return response()->json($carne->parcelas);
    }

    private function novoCarne(array $data): Carne
    {
        return Carne::create([
            'valor_total' => $data['valor_total'],
            'qtd_parcelas' => $data['qtd_parcelas'],
            'data_primeiro_vencimento' => $data['data_primeiro_vencimento'],
            'periodicidade' => $data['periodicidade'],
            'valor_entrada' => $data['valor_entrada'] ?? false
        ]);
    }

}
