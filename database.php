<?php

// recebe os dados de conexão com o banco e abre a conexão.
$connection = mysqli_connect(BD_SERVER, BD_USER, BD_PASSWORD, BD_DATABASE);

// verifica se houve erro de conexão.
if (mysqli_connect_errno($connection)) {
    echo "Problemas para conectar no banco. Erro: ";
    echo mysqli_connect_error(); // retorna um texto com o erro.
    die(); // encerra o programa.
}

