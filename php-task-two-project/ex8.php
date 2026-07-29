<?php
    // Este array associativo tem a chave igual ao atributo 'name' do HTML,
    // e o valor é a resposta correta esperada.
    $answers = [
        "q1" => "php",
        "q2" => "echo",
        "q3" => "array"
    ];

    $points = 0;
    $showResult = false;

    // 1. Verifica se o formulário foi enviado (REQUEST_METHOD === 'POST')
    if ( $_SERVER["REQUEST_METHOD"] === "POST" ) {
        $showResult = true;

        $poll = array(
            "q1" => $_POST[ "q1" ] ?? "",
            "q2" => $_POST[ "q2" ] ?? "",
            "q3" => $_POST[ "q3" ] ?? ""
        );

        // Merge array to validate score, array length reveals score
        if ( $poll )
            $points = count( array_intersect_assoc( $poll, $answers ) );
        // Desafio:
        // 2. Compara $_POST['q1'] com $respostas_certas['q1']. Se for igual, soma 1 à $pontuacao.
        // 3. Faz o mesmo para a q2 e q3.
        // DICA: Se quiseres desafiar-te, tenta fazer isto com um ciclo foreach sobre o array $respostas_certas!
    }
?>

<h2>Mini-Quiz de Programação</h2>

<?php if ( $showResult ) : ?>
    <!-- 4. Usa if/else embutido no HTML para mudar a cor: Verde se pontuação == 3, Vermelho se < 3 -->
    <div style="background-color: <?= $points >= 3 ? "#90EE90" : "#F08080"; ?>; padding: 10px; margin-bottom: 20px;">
        <h3>A tua pontuação final é: <?= $points ?> / 3</h3>
    </div>
<?php endif; ?>

<form action="ex8.php" method="POST">
    <p>1. Que linguagem estamos a aprender?</p>
    <input type="radio" name="q1" value="java"> Java<br>
    <input type="radio" name="q1" value="php"> PHP<br>
    <input type="radio" name="q1" value="python"> Python<br>

    <p>2. Qual é o comando principal para imprimir texto no ecrã em PHP?</p>
    <input type="radio" name="q2" value="print"> print<br>
    <input type="radio" name="q2" value="echo"> echo<br>
    <input type="radio" name="q2" value="write"> write<br>

    <p>3. Qual é a estrutura que guarda múltiplos valores numa só variável?</p>
    <input type="radio" name="q3" value="string"> String<br>
    <input type="radio" name="q3" value="integer"> Integer<br>
    <input type="radio" name="q3" value="array"> Array<br><br>

    <button type="submit">Verificar Respostas</button>
</form>