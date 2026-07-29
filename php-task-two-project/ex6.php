<?php
// 1. Verifica se existe o parâmetro "numero" no $_GET.
// Se existir, guarda-o na variável $numero. Se não existir, o $numero deve ser 5 (valor por defeito).
// Dica: podes usar o if/else ou o operador de coalescência nula (??).

    $number = ( isset( $_GET[ "number" ] ) && $_GET[ "number" ] !== "" && ( int )$_GET[ "number" ] != 0 )
            ? ( int )$_GET[ "number" ] : 5;
    // substitui pela tua lógica com o $_GET

    function table( $i, $x = 10 ) : string {
        if ( $x < 1 )
            return "";
        return "<li>$i * $x = " . ( $i * $x ) . "</li>" . table( $i, $x - 1 );
    }
?>

<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Tabuada Dinâmica</title>
</head>
<body>
<h2>Tabuada do <?= $number ?></h2>

<ul>
    <?php
    // 2. Cria um ciclo 'for' que vá do $i = 1 até ao $i = 10.
    // 3. Dentro do ciclo, calcula o resultado ($numero * $i).
    // 4. Faz echo de um <li> com a conta (Exemplo: <li> 7 x 1 = 7 </li>).
        print table( $number );
    ?>
</ul>

<hr>
<!-- Links para testar -->
<p>Testar outras tabuadas:</p>
    <a href="ex6.php?number=3">Tabuada do 3</a> |
    <a href="ex6.php?number=9">Tabuada do 9</a>
</body>
</html>
