<?php
    // Array com alguns distritos
    $districts = [ "Aveiro", "Beja", "Braga", "Faro", "Lisboa", "Porto", "Setúbal", "Guarda" ];
?>

<h2>Registo de Utilizador</h2>
<form action="" method="POST">
    <label>
        Nome:
        <input type="text" name="name"><br><br>
    </label>

    <!-- O nome do select é o que vai parar ao $_POST -->
    <label>
        Distrito de Residência:
        <select name="district">
            <option value="">-- Escolhe um distrito --</option>
            <?php foreach ( $districts as $district ) : ?>
                <option value="<?= $district ?>"><?= $district ?></option>
            <?php endforeach; ?>
        </select>
    </label><br><br>

    <button type="submit">Enviar</button>
</form>

<?php
// 3. (Opcional) Faz um if para detetar se o formulário foi enviado via POST.
// Se foi, mostra uma mensagem: "Olá [nome], vejo que moras em [distrito]!"
    if ( strcmp( $_SERVER[ "REQUEST_METHOD" ], "POST" ) === 0 ) {
        if ( isset( $_POST[ "name" ] ) && isset( $_POST[ "district" ] ) )
            $name = ucfirst( filter_input(
                INPUT_POST,
                "name",
                FILTER_SANITIZE_SPECIAL_CHARS
            ) );

            $district = $_POST[ "district" ];

            print "<p>Hello {$name}, I see you are from {$district}!</p>";
    }
?>
