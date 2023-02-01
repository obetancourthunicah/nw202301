<?php
    session_start();
    $intCantidadPersonas = 0;

    if (isset($_SESSION["intCantidadPersonas"])){
        $intCantidadPersonas = $_SESSION["intCantidadPersonas"];
    }
    if (isset($_POST["btnAdd"])) {
        $intCantidadPersonas ++;
    }
    if (isset($_POST["btnSub"])) {
        $intCantidadPersonas --;
    }
    $_SESSION["intCantidadPersonas"] = $intCantidadPersonas;
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador  PHP</title>
</head>
<body>
    <h1>Contador PHP</h1>
    <form action="contador_de_persona.php" method="POST">
        <button type="submit" name="btnAdd">Entra</button>
        &nbsp;
        <button type="submit" name="btnSub">Sale</button>
    </form>
    <hr>
    <h2>Resumen</h2>
    <strong>
        Persona adentro: <?php echo $intCantidadPersonas; ?>
    </strong>

</body>
</html>
