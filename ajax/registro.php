<?php
session_start();
include '../config/config.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $usuario = $_POST["usuario"];
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);

    $validar_usuario = "Select * from registro where correo  = '". $correo  ."'";
    $q_validar_usuario = mysqli_query($conn, $validar_usuario);
    $numr_validar_usuario = mysqli_num_rows($q_validar_usuario);

    if($numr_validar_usuario > 0) {
        echo 'El nombre de usuario ya se encuentra en uso.';
    }
    $sql = "INSERT INTO registro (nombre, correo, usuario, contrasena) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $correo, $usuario, $contrasena);


    if ($stmt->execute()){
        echo "Registro Exitoso.";
    }else{
        echo "Error: ". $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

