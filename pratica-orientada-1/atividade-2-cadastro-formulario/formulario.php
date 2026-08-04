<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 2 - Cadastro via Formulário</title>
</head>
<body>
    <h1>Simulador de Cadastro</h1>

    <form method="POST" action="processar.php">
        <label for="nome">Nome completo:</label><br>
        <input type="text" name="nome" id="nome"><br><br>

        <label for="email">E-mail:</label><br>
        <input type="text" name="email" id="email"><br><br>

        <label for="idade">Idade:</label><br>
        <input type="text" name="idade" id="idade"><br><br>

        <label for="cidade">Cidade:</label><br>
        <input type="text" name="cidade" id="cidade"><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
