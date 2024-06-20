<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Desafio 6</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Desafios de Relacionamento de Tabelas em Vendas</h1>

    <?php

    $hostname = '127.0.0.1'; // Hostname do banco de dados
    $username = 'root'; // Nome de usuário do banco de dados
    $password = ''; // Senha do banco de dados
    $database = 'vendas_db'; // Nome do banco de dados

    // Conexão com o banco de dados usando PDO
    try {
        $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro ao conectar ao banco de dados: " . $e->getMessage());
    }

    // 1. Qual foi o produto que menos vendeu?
    try {
        $sql1 = "SELECT nome_produto, MIN(quantidade) AS quantidade_vendida
                 FROM produtos
                 JOIN vendas ON produtos.id_produto = vendas.id_produto
                 GROUP BY nome_produto
                 ORDER BY quantidade_vendida ASC
                 LIMIT 1";

        $stmt1 = $pdo->prepare($sql1);
        $stmt1->execute();
        $resultado1 = $stmt1->fetch(PDO::FETCH_ASSOC);

        echo "<h2>1. Qual foi o produto que menos vendeu?</h2>";
        echo "O produto que menos vendeu foi: " . $resultado1['nome_produto'] . " com " . $resultado1['quantidade_vendida'] . " unidades vendidas.";
    } catch (PDOException $e) {
        die("Erro ao executar a consulta 1: " . $e->getMessage());
    }

    // 2. Qual foi a categoria que mais vendeu?
    try {
        $sql2 = "SELECT nome_categoria, SUM(quantidade) AS total_vendido
                 FROM categorias
                 JOIN produtos ON categorias.id_categoria = produtos.id_categoria
                 JOIN vendas ON produtos.id_produto = vendas.id_produto
                 GROUP BY nome_categoria
                 ORDER BY total_vendido DESC
                 LIMIT 1";

        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute();
        $resultado2 = $stmt2->fetch(PDO::FETCH_ASSOC);

        echo "<h2>2. Qual foi a categoria que mais vendeu?</h2>";
        echo "A categoria que mais vendeu foi: " . $resultado2['nome_categoria'] . " com um total de " . $resultado2['total_vendido'] . " unidades vendidas.";
    } catch (PDOException $e) {
        die("Erro ao executar a consulta 2: " . $e->getMessage());
    }

    // 3. Qual foi o produto mais vendido em questão de valor?
    try {
        $sql3 = "SELECT nome_produto, SUM(valor_total) AS total_valor
                 FROM produtos
                 JOIN vendas ON produtos.id_produto = vendas.id_produto
                 GROUP BY nome_produto
                 ORDER BY total_valor DESC
                 LIMIT 1";

        $stmt3 = $pdo->prepare($sql3);
        $stmt3->execute();
        $resultado3 = $stmt3->fetch(PDO::FETCH_ASSOC);

        echo "<h2>3. Qual foi o produto mais vendido em questão de valor?</h2>";
        echo "O produto mais vendido em termos de valor foi: " . $resultado3['nome_produto'] . " com um total de R$ " . number_format($resultado3['total_valor'], 2, ',', '.') . ".";
    } catch (PDOException $e) {
        die("Erro ao executar a consulta 3: " . $e->getMessage());
    }

    // 4. Qual foi o produto mais vendido em questão de quantidade?
    try {
        $sql4 = "SELECT nome_produto, SUM(quantidade) AS total_quantidade
                 FROM produtos
                 JOIN vendas ON produtos.id_produto = vendas.id_produto
                 GROUP BY nome_produto
                 ORDER BY total_quantidade DESC
                 LIMIT 1";

        $stmt4 = $pdo->prepare($sql4);
        $stmt4->execute();
        $resultado4 = $stmt4->fetch(PDO::FETCH_ASSOC);

        echo "<h2>4. Qual foi o produto mais vendido em questão de quantidade?</h2>";
        echo "O produto mais vendido em termos de quantidade foi: " . $resultado4['nome_produto'] . " com um total de " . $resultado4['total_quantidade'] . " unidades vendidas.";
    } catch (PDOException $e) {
        die("Erro ao executar a consulta 4: " . $e->getMessage());
    }

    // 5. Listagem de categorias com seus respectivos produtos, quantidades vendidas e valor total das vendas
    try {
        $sql5 = "SELECT c.nome_categoria, p.nome_produto, SUM(v.quantidade) AS total_quantidade, SUM(v.valor_total) AS total_valor
                 FROM categorias c
                 JOIN produtos p ON c.id_categoria = p.id_categoria
                 JOIN vendas v ON p.id_produto = v.id_produto
                 GROUP BY c.nome_categoria, p.nome_produto
                 ORDER BY c.nome_categoria, p.nome_produto";

        $stmt5 = $pdo->prepare($sql5);
        $stmt5->execute();
        $resultados5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);

        echo "<h2>5. Listagem de Categorias com seus Produtos</h2>";
        echo "<table>";
        echo "<tr><th>Categoria</th><th>Produto</th><th>Total Quantidade</th><th>Total Valor</th></tr>";
        foreach ($resultados5 as $row) {
            echo "<tr>";
            echo "<td>" . $row['nome_categoria'] . "</td>";
            echo "<td>" . $row['nome_produto'] . "</td>";
            echo "<td>" . $row['total_quantidade'] . "</td>";
            echo "<td>R$ " . number_format($row['total_valor'], 2, ',', '.') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        die("Erro ao executar a consulta 5: " . $e->getMessage());
    }

    // Fechar a conexão com o banco de dados
    $pdo = null;
    ?>
</body>

</html>