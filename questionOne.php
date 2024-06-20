<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Classificação de Triângulo</title>
</head>

<body>
    <h2>Classificação de Triângulo</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="lado1">Lado 1:</label>
        <input type="text" id="lado1" name="lado1" required><br><br>

        <label for="lado2">Lado 2:</label>
        <input type="text" id="lado2" name="lado2" required><br><br>

        <label for="lado3">Lado 3:</label>
        <input type="text" id="lado3" name="lado3" required><br><br>

        <input type="submit" value="Classificar Triângulo">
    </form>

    <?php
    function classificarTriangulo($a, $b, $c)
    {
        if ($a + $b <= $c || $a + $c <= $b || $b + $c <= $a) {
            echo "Os lados fornecidos não formam um triângulo válido.\n";
            return;
        }

        if ($a == $b && $b == $c) {
            echo "Triângulo Equilátero\n";
        } elseif ($a == $b || $a == $c || $b == $c) {
            echo "Triângulo Isósceles\n";
        } else {
            echo "Triângulo Escaleno\n";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST['lado1'];
        $b = $_POST['lado2'];
        $c = $_POST['lado3'];

        $a = intval($a);
        $b = intval($b);
        $c = intval($c);

        classificarTriangulo($a, $b, $c);
    }
    ?>
</body>

</html>