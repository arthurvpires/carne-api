<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de Carnê</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<h1>API RESTful para Parcelas de Carnê</h1><br>
<body>
<div>
    <section>
        <h2>Cenário 1: Divisão de R$ 100,00 em 12 Parcelas</h2>
        <form action="/api/carne" method="POST">
            @csrf
            <label for="valor_total_1">Valor Total:</label>
            <input type="text" id="valor_total_1" name="valor_total" value="100.00" readonly>
            <br>

            <label for="qtd_parcelas_1">Quantidade de Parcelas:</label>
            <input type="text" id="qtd_parcelas_1" name="qtd_parcelas" value="12" readonly>
            <br>

            <label for="data_primeiro_vencimento_1">Data do Primeiro Vencimento:</label>
            <input type="text" id="data_primeiro_vencimento_1" name="data_primeiro_vencimento" value="2024-08-01" readonly>
            <br>

            <label for="periodicidade_1">Periodicidade:</label>
            <input type="text" id="periodicidade_1" name="periodicidade" value="mensal" readonly>
            <br>

            <label for="valor_entrada_1">Valor de Entrada:</label>
            <input type="text" id="valor_entrada_1" name="valor_entrada" value="0.00" readonly>
            <br>

            <button type="submit">Criar Carnê</button>
        </form>
    </section>


    <section>
        <h2>Cenário 2: Divisão de R$ 0,30 em 2 Parcelas com Entrada de R$ 0,10</h2>
        <form action="/api/carne" method="POST">
            @csrf
            <label for="valor_total_2">Valor Total:</label>
            <input type="text" id="valor_total_2" name="valor_total" value="0.30" readonly>
            <br>

            <label for="qtd_parcelas_2">Quantidade de Parcelas:</label>
            <input type="text" id="qtd_parcelas_2" name="qtd_parcelas" value="2" readonly>
            <br>

            <label for="data_primeiro_vencimento_2">Data do Primeiro Vencimento:</label>
            <input type="text" id="data_primeiro_vencimento_2" name="data_primeiro_vencimento" value="2024-08-01" readonly>
            <br>

            <label for="periodicidade_2">Periodicidade:</label>
            <input type="text" id="periodicidade_2" name="periodicidade" value="semanal" readonly>
            <br>

            <label for="valor_entrada_2">Valor de Entrada:</label>
            <input type="text" id="valor_entrada_2" name="valor_entrada" value="0.10" readonly>
            <br>

            <button type="submit">Criar Carnê</button>
        </form>
    </section>

</div>
</body>
</html>
<style>
</style>