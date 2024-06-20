<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Identificação de Mês</title>
</head>

<body>
    <h2>Identificação de Mês</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="numero">Digite um número entre 1 e 12:</label>
        <input type="number" id="numero" name="numero" min="1" max="12" required>
        <input type="submit" value="Run">
    </form>

    <?php
    function nomeMes($numero)
    {
        switch ($numero) {
            case 1:
                return "Janeiro";
            case 2:
                return "Fevereiro";
            case 3:
                return "Março";
            case 4:
                return "Abril";
            case 5:
                return "Maio";
            case 6:
                return "Junho";
            case 7:
                return "Julho";
            case 8:
                return "Agosto";
            case 9:
                return "Setembro";
            case 10:
                return "Outubro";
            case 11:
                return "Novembro";
            case 12:
                return "Dezembro";
            default:
                return "Número inválido - não existe mês correspondente";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['numero'])) {
        $numero = intval($_POST['numero']);

        $nomeMes = nomeMes($numero);

        echo "<h3>O mês de número $numero é: $nomeMes</h3>";
    }
    ?>
</body>

</html>