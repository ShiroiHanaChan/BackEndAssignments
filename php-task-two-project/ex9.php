<?php
    $message_error = "";
    $message_success = "";

    // 1. Verifica se o formulário foi submetido via POST ✅
    if ( $_SERVER[ "REQUEST_METHOD" ] === "POST" ) {
        // 2. Guarda os dados em variáveis ✅
        $name = trim( $_POST[ 'name' ] );
        $email = trim( $_POST[ 'email' ] );
        $password = $_POST[ 'password' ];
        $confirmation = $_POST[ 'confirmation' ];

        if ( !empty( $name ) && !empty( $email ) ) {
            if ( strcmp( $password, $confirmation ) != 0 )
                $message_error = "Passwords don't match";
            $message_success = "Welcome!";
        } else {
            $message_error = "Please fill the required camps";
        }

        // Desafio - Cria a seguinte lógica de validação:
        // 3. Se o $nome ou o $email estiverem vazios, a $mensagem_erro = "Preenche todos os dados básicos."
        // 4. Se não estiverem vazios, verifica as senhas. Se $password for diferente de $confirmacao, $mensagem_erro = "As passwords não coincidem!"
        // 5. Se estiver tudo bem (else), $mensagem_sucesso = "Conta criada com sucesso para o email $email!"

    }
?>

<h2>Criar Conta</h2>

<!-- Zona de Mensagens -->
<?php if ( !empty( $message_error ) ) : ?>
    <p style="color: red; font-weight: bold;"><?= $message_error ?></p>
<?php endif; ?>

<?php if ( !empty( $message_success ) ) : ?>
    <p style="color: green; font-weight: bold;"><?= $message_success ?></p>
<?php endif; ?>

<form action="ex9.php" method="POST">
    <label>Nome Completo:
        <br>
        <input type="text" name="name"><br><br>
    </label>

    <label>Email:
        <br>
        <input type="email" name="email"><br><br>
    </label>

    <label>Password:
        <br>
        <input type="password" name="password"><br><br>
    </label>

    <label>Confirmar Password:
        <br>
        <input type="password" name="confirmation"><br><br>
    </label>

    <button type="submit">Registar</button>
</form>
