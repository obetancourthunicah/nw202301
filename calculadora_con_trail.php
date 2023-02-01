<?php
    require_once "calculador_lib.php";
    /*
    include
    require
    include_once //solo una vez
    require_once
     */
    session_start();
    $intOperando1 = 0;
    $intOperando2 = 0;
    $numResultado = 0;
    $arrTrail = array();
    if(isset($_SESSION["arrTrail"])) {
        $arrTrail = $_SESSION["arrTrail"];
    }
    // btnAdd btnSub btnMul btnDiv
    if(
        isset($_POST["btnAdd"]) || // &&
        isset($_POST["btnSub"]) ||
        isset($_POST["btnMul"]) ||
        isset($_POST["btnDiv"])
    ) {
        $intOperando1 = floatval($_POST["intOperando1"]);
        $intOperando2 = floatval($_POST["intOperando2"]);

        if (isset($_POST["btnAdd"])) {
            $numResultado = sumar($intOperando1, $intOperando2);
            $arrTrail[] = sprintf(
                "%f + %f = %f",
                $intOperando1,
                $intOperando2,
                $numResultado
            );
        }
        if (isset($_POST["btnSub"])) {
            $numResultado = restar($intOperando1, $intOperando2);
            $arrTrail[] = sprintf(
                "%f - %f = %f",
                $intOperando1,
                $intOperando2,
                $numResultado
            );
        }
        if (isset($_POST["btnMul"])) {
            $numResultado = multiplicar($intOperando1, $intOperando2);
            $arrTrail[] = sprintf(
                "%f * %f = %f",
                $intOperando1,
                $intOperando2,
                $numResultado
            );
        }
        if (isset($_POST["btnDiv"])) {
            $numResultado = dividir($intOperando1, $intOperando2);
            $arrTrail[] = sprintf(
                "%f / %f = %f",
                $intOperando1,
                $intOperando2,
                $numResultado
            );
        }
        $_SESSION["arrTrail"] = $arrTrail;
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <h1>Calculadora</h1>
    <form action="calculadora_con_trail.php" method="post">
        <label for="intOperando1">Número 1</label>
        <input
            type="number" name="intOperando1"
            id="intOperando1"
            value="<?php echo $intOperando1; ?>"
        /> <br>
        <label for="intOperando2">Número 1</label>
        <input
            type="number" name="intOperando2"
            id="intOperando2"
            value="<?php echo $intOperando2; ?>"
        /> <br>
        <button type="submit" name="btnAdd">Sumar</button>&nbsp;
        <button type="submit" name="btnSub">Restar</button>&nbsp;
        <button type="submit" name="btnMul">Multiplicar</button>&nbsp;
        <button type="submit" name="btnDiv">Dividir</button>&nbsp;
    </form>
    <h2>Resultado: <?php echo $numResultado; ?></h2>
    <hr>
    <h2>Trail</h2>
    <ul>
        <?php
            foreach ($arrTrail as $strHistorico){
                echo '<li>' . $strHistorico . '</li>';
            }
        ?>
    </ul>
</body>
</html>
