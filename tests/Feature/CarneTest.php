<?php

namespace Tests\Feature;

use Tests\TestCase;

class CarneTest extends TestCase
{

    public function test_parcelas_sem_entrada_mensal(): void
    {
        $response = $this->postJson('/api/carne', [
            'valor_total' => 100.00,
            'qtd_parcelas' => 12,
            'data_primeiro_vencimento' => '2024-08-01',
            'periodicidade' => 'mensal',
            'valor_entrada' => 0.00
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'total' => 100.00,
                'valor_entrada' => 0.00,
                'qtd_parcelas' => 12,
            ]);
    }

    public function test_parcelas_com_entrada_semanal(): void
    {
        $response = $this->postJson('/api/carne', [
            'valor_total' => 0.30,
            'qtd_parcelas' => 2,
            'data_primeiro_vencimento' => '2024-08-01',
            'periodicidade' => 'semanal',
            'valor_entrada' => 0.1
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'total' => 0.3,
                'valor_entrada' => 0.1,
                'valor_parcelas' => 0.1,
                'qtd_parcelas' => 2,
            ]);
    }
}
