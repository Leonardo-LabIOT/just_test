<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Soma de Positivos e Total de Negativos</title>
</head>

<body>
    <h2>Entrar com 20 números</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <?php
        $numEntradas = 20;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $somaPositivos = 0;
            $totalNegativos = 0;

            for ($i = 1; $i <= $numEntradas; $i++) {
                if (isset($_POST["numero$i"])) {
                    $numero = intval($_POST["numero$i"]);

                    if ($numero >= 0) {
                        $somaPositivos += $numero;
                    } elseif ($numero < 0) {
                        $totalNegativos++;
                    }
                }
            }

            echo "<h3>Resultados:</h3>";
            echo "Soma dos números positivos: $somaPositivos<br>";
            echo "Total de números negativos: $totalNegativos<br><hr><br>";
        }

        for ($i = 1; $i <= $numEntradas; $i++) {
            echo "<label for='numero$i'>Número $i:</label>";
            echo "<input type='number' id='numero$i' name='numero$i' required><br><br>";
        }
        ?>
        <br>
        <input type="submit" value="Calcular">
    </form>
</body>

</html>