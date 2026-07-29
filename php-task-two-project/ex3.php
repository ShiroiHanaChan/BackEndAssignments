<?php
    // 1. Verifica se o formulário foi submetido usando o método POST
    // Dica: $_SERVER["REQUEST_METHOD"] ✅

    // 2. Se for POST, guarda o $_POST['username'] e $_POST['password'] em variáveis.
    // 3. Valida: Se o username for "admin" e a password for "12345":
    //    $mensagem = "Acesso Concedido!";
    //    Senão:
    //    $mensagem = "Credenciais Inválidas!";

    $message = "";

    if ( strcmp( $_SERVER[ "REQUEST_METHOD" ], "POST" ) === 0 ) {
        if ( isset( $_POST[ "username" ] ) && isset( $_POST[ "password" ] ) )
            $username = filter_input(
                INPUT_POST,
                "username",
                FILTER_SANITIZE_SPECIAL_CHARS
            );

            $password = filter_input(
                INPUT_POST,
                "password",
                FILTER_VALIDATE_INT
            );

            if ( strcmp( $username, "admin") === 0 && strcmp( $password, "12345" ) === 0 ) {
                $message = "Access granted";
            } else {
                $message = "Access denied!";
            }
    }
?>

<!-- HTML do Formulário -->
<h2>Login do Sistema</h2>

<!-- Mostra a mensagem de erro ou sucesso aqui, se existir -->
<p style="color: red; font-weight: bold;"> <?= $message ?> </p>

<form method="POST" action="ex3.php">
    <label>Username:
        <input type="text" name="username" required>
    </label>
        <br>
        <br>

    <label>Password:
        <input type="password" name="password" required>
    </label>
        <br>
        <br>
    <button type="submit">Entrar</button>
</form>

<hr>
<!-- Desafio Extra: Usa o $_SERVER para mostrar no ecrã o endereço IP do cliente (REMOTE_ADDR) e o nome do servidor (SERVER_NAME) -->
<small>Estás ligado a partir do IP: <?= $_SERVER[ "REMOTE_ADDR" ] ?> no servidor <?= $_SERVER[ "SERVER_NAME" ] ?></small>
<?= phpinfo(); ?>
