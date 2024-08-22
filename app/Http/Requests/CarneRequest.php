<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarneRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'valor_total' => 'required|numeric',
            'qtd_parcelas' => 'required|integer|min:1',
            'data_primeiro_vencimento' => 'required|date',
            'periodicidade' => 'required|in:mensal,semanal',
            'valor_entrada' => 'nullable|numeric|min:0',
        ];
    }
}
