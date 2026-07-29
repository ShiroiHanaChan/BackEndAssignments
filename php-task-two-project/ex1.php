<?php
// 1. Cria as variáveis aqui: $nome, $idade, $profissao.
// 2. Cria uma variável $corFundo.
// Se a idade for >= 18, a cor deve ser '#e0f7fa' (azul claro). Se for < 18, '#ffebee' (vermelho claro).

    $name = "Surume";
    $age = 16;
    $job = "PHP Master";

    $adult = function ( $conditional ) {
        return $conditional >= 18 ? "#e0f7fa" : "#ffebee";
    };

?>
<!DOCTYPE html>
<html>
<head>
    <title>Perfil de Utilizador</title>
</head>
<!-- 3. Aplica a variável $corFundo no estilo do body -->
<body style="background-color: <?= $adult( $age ) ?>; font-family: sans-serif; padding: 20px;">

<div style="border: 1px solid #ccc; padding: 20px; border-radius: 10px; width: 300px; background: white;">
    <!-- 4. Substitui os valores abaixo pelas tuas variáveis PHP -->
    <h2>Welcome <?= $name ?>!</h2>
    <p>Idade: <?= $age ?> anos</p>
    <p>Profissão: <?= $job ?></p>

    <p>
        <strong>Status: <?= $age >= 18 ? "Adult" : "Child" ?></strong>
        <!-- 5. Usa um if/else em PHP para escrever "Maior de Idade" ou "Menor de Idade" -->
    </p>
</div>

</body>
</html>
