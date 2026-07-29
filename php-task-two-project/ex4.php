<?php
    header("Content-Type: application/json; charset=utf-8");
    // 1. Informa o browser que esta página não é HTML, mas sim JSON ✅
    // Dica: header("Content-Type: application/json");

// Base de dados simulada
    $movies = [
        ["title" => "Matrix", "genre" => "fiction"],
        ["title" => "Dune", "genre" => "fiction"],
        ["title" => "Gladiador", "genre" => "action"],
        ["title" => "John Wick", "genre" => "action"]
    ];

    $result = [];

    function filter( $array, $fn ) {
        $filteredArray = [];
        foreach ( $array as $object ) {
            if ( $fn( $object ) ) {
                $filteredArray[] = $object;
            }
        }

        return $filteredArray;
    }

// 2. Verifica se existe o parâmetro "género" no URL (ex: api.php?genero=ação)
// Dica: usa a função isset($_GET['género'])
    if ( isset( $_GET[ "genre" ] ) && strlen( $_GET[ "genre" ] ) !== 0 ) {
        $result = filter( $movies, function ( $movie ) {
            return strcmp( $movie[ "genre" ], $_GET[ "genre" ] ) === 0;
        } );
    } else {
        $result = &$movies;
    }

    echo json_encode([
        "status" => "success",
        "data" => $result
    ]);

// 3. Se existir, usa um foreach no array $filmes.
// Se o género do filme igualar o género pedido no $_GET, adiciona esse filme ao array $resultado.

// 4. Se não existir parâmetro nenhum no $_GET, o $resultado deve ser igual ao array completo de $filmes.

// 5. Por fim, converte o array $resultado para JSON e imprime-o no ecrã (echo).