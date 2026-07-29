<?php
    $price_base = 8.00;
    $price_by_ingredients = 1.50;
    $request_made = false;
    $total = $price_base;
    $selected_ingredients = [];

    if ( $_SERVER[ "REQUEST_METHOD" ] === "POST" ) {
        $request_made = true;

        if ( isset( $_POST[ "ingredients" ] ) ) {
            $selected_ingredients = $_POST[ "ingredients" ];
            $total += count( $selected_ingredients ) * 1.5;
        }

        // Desafio:
        // 1. Verifica se a variável $_POST['ingredientes'] existe usando isset() ✅
        // 2. Se existir, atribui o seu valor (que será um array) à variável $ingredientes_escolhidos.
        // 3. Calcula o total: Soma ao $preco_base o valor de ($preco_por_ingrediente * quantidade de ingredientes escolhidos).
        // Dica: A função count() diz-te quantos itens tem um array!

    }
?>

<h2>Pizzaria PHP - Monta a tua Pizza!</h2>
<p>Preço Base (Massa e Molho): <strong>8.00€</strong></p>

<form action="ex10.php" method="POST">
    <p>Escolhe os teus ingredientes extra ( +1.50€ cada ):</p>
    <!-- Repara no "[]" no atributo name. Isto diz ao PHP para criar um array! -->
    <input type="checkbox" name="ingredients[]" value="Queijo Extra"> Queijo Extra<br>
    <input type="checkbox" name="ingredients[]" value="Fiambre"> Fiambre<br>
    <input type="checkbox" name="ingredients[]" value="Cogumelos"> Cogumelos<br>
    <input type="checkbox" name="ingredients[]" value="Azeitonas"> Azeitonas<br>
    <input type="checkbox" name="ingredients[]" value="Pepperoni"> Pepperoni<br><br>

    <button type="submit">Fazer Pedido</button>
</form>

<hr>

<?php if ( $request_made ): ?>
    <h3>Resumo do Pedido</h3>

    <ul>
    <?php if ( count( $selected_ingredients ) === 0 ) { ?>
        <li>A tua pizza é apenas base.</li>
    <?php } else { foreach ( $selected_ingredients as $ingredient ) : ?>
        <li><?= $ingredient ?></li>
    <?php endforeach; } ?>
    </ul>
    <!-- 4. Se o array $ingredientes_escolhidos estiver vazio (empty), faz echo de "A tua pizza é apenas base."
     5. Se tiver itens, usa um foreach para fazer uma lista HTML (<ul><li>...</li></ul>) com os ingredientes escolhidos.-->


    <!-- 6. Mostra o preço total calculado -->
    <h4>Total a pagar: <?= $total ?> €</h4>
<?php endif; ?>
