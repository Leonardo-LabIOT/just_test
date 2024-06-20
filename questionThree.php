<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Tabuada de um Número</title>
</head>

<body>
    <h2>Tabuada de um Número</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="numero">Digite um número:</label>
        <input type="number" id="numero" name="numero" required>
        <input type="submit" value="Mostrar Tabuada">
    </form>

    <?php
    // Verifica se foi enviado um número pelo formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['numero'])) {
        $numero = intval($_POST['numero']);

        echo "<h3>Tabuada do número $numero:</h3>";
        echo "<table style='padding:3px' border='1'>";
        for ($i = 1; $i <= 10; $i++) {
            echo "<tr style='padding:3px'>";
            echo "<td>$numero x $i </td>";
            echo "<td>" . ($numero * $i) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>

</html>