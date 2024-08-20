<?php

namespace Database\Factories;

use App\Models\Carne;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carne>
 */
class CarneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'valor_total' => '100',
            'valor_entrada' => '0',
            'qtd_parcelas' => '12',
            'data_primeiro_vencimento' => '2024-08-01',
            'periodicidade' => Carne::PERIODICIDADE_MENSAL,
        ];
    }
}
