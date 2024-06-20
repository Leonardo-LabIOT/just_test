<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cálculo</title>
</head>

<body>
    <h2>Cálculo de Crescimento</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
        <label for="d_juca">Crescimento de Juca:</label>
        <input type="number" id="d_juca" name="d_juca" min="3" required>
        <input type="submit" value="Calcular">
    </form>

    <?php
    $hChico = 150;
    $hJuca = 110;
    $d_c = 2;

    if (isset($_GET['d_juca'])) {
        $d_j = intval($_GET['d_juca']);

        if ($d_j <= $d_c) {
            echo "Never!";
        } else {
            $years = 0;

            while ($hJuca <= $hChico) {
                $hChico += $d_c;
                $hJuca += $d_j;
                $years++;
            }

            // Exibe o resultado
            echo "<h3>$years anos!</h3>";
        }
    }
    ?>
</body>

</html>