
        <!-- Desafio:
        1. Inicia aqui um ciclo foreach para percorrer o array $produtos ✅
        2. Para cada produto, cria uma linha de tabela (<tr> e <td>) ✅
        3. Na coluna "Estado", usa um if se o ‘stock’ for 0, escreve "Esgotado", senão escreve "Em ‘Stock’" ✅
        4. Soma o (price * stock) à variável $valorTotalInventario ✅ -->

<?php
    // O nosso "banco de dados" de produtos
    $products = [
        ["id" => 1, "name" => "Teclado Mecânico", "price" => 75.50, "stock" => 10],
        ["id" => 2, "name" => "Rato Wireless", "price" => 25.99, "stock" => 0],
        ["id" => 3, "name" => "Monitor 24 polegadas", "price" => 150.00, "stock" => 5],
        ["id" => 4, "name" => "Tapete de Rato", "price" => 12.00, "stock" => 20]
    ];

    $valorTotalInventario = 0;
?>

<h2>Catálogo de Produtos</h2>
<table border="1" cellpadding="10">
    <?php foreach ( $products as $product ) : ?>
        <tr>
            <th><?= $product[ "id" ] ?></th>
            <th><?= $product[ "name" ] ?></th>
            <th><?= $product[ "price" ] ?></th>
            <th><?= $product[ "stock" ] > 0 ? $product[ "stock" ] : "Sold Out" ?></th>
        </tr>
    <?php $valorTotalInventario += $product[ "price" ]; endforeach; ?>
</table>

<!-- 5. Mostra aqui o $valorTotalInventario formatado -->
<h3>Valor Total do Inventário: <?= $valorTotalInventario ?>€</h3>
