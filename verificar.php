<?php
    $user = $_POST['usuario'];
    $senha = $_POST['senha'];
    
    // Conexão com o banco de dados
    include 'connection.php';

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT username, senha FROM clientes WHERE username = '$user' and senha = '$senha'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        
        session_start();

        $_SESSION["log"] = 1;

        header('location: index.php?log');    
        
    } else {
        header('location: login.php?t=l');    
    }
    
    mysqli_close($conn);
    
?>