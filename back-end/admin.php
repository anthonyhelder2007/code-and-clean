<?php
require_once "conexao.php";
global $pdo;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['status'])) {
    foreach ($_POST['status'] as $id => $novo_status) {
        $sql = "UPDATE orcamento SET status = :status WHERE id_orcamento = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'status' => $novo_status,
            'id' => $id
        ]);
    }
    header("Location: ".$_SERVER['PHP_SELF']); 
    exit;
}

// 1 - EM AVALIACAO
$stmtAv = $pdo->query("SELECT * FROM orcamento WHERE status = 'em avaliacao'");
$dadosAv = $stmtAv->fetchAll(PDO::FETCH_ASSOC);
$orcamentosAv = [];
foreach($dadosAv as $orc){
    $id = $orc['id_orcamento'];
    $orcamentosAv[$id] = $orc;
}

// 2 - EM ANDAMENTO
$stmtA = $pdo->query("SELECT * FROM orcamento WHERE status = 'em andamento'");
$dadosA = $stmtA->fetchAll(PDO::FETCH_ASSOC);
$orcamentosA = [];
foreach($dadosA as $orc){
    $id = $orc['id_orcamento'];
    $orcamentosA[$id] = $orc;
}

// 3 - DESISTIU
$stmtD = $pdo->query("SELECT * FROM orcamento WHERE status = 'desistiu'");
$dadosD = $stmtD->fetchAll(PDO::FETCH_ASSOC);
$orcamentosD = [];
foreach($dadosD as $orc){
    $id = $orc['id_orcamento'];
    $orcamentosD[$id] = $orc;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Serviços</title>
	<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <header>
	<div class="header1">
	    <div class="logo"><img src="../img/logo.jpeg" alt="logo"></div>
		<h1>Anthony <br>
		Code and Clean
		</h1>
	</div>
	<nav>
	    <ul>
			<li><a href="../index.html">Home</a></li>
			<li><a href="../servicos.html">Serviços</a></li>
			<li><a href="../sobre.html">Sobre</a></li>
		</ul>
	</nav>
	</header>

<h2>Em Avaliação</h2>
<table>
    <thead>
        <tr>
            <th>Nome</th><th>Serviço</th><th>Whatsapp</th><th>Status</th><th>Tipo</th><th>Altera Status</th><th>Mudar status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orcamentosAv as $id => $orcamento): ?>
        <tr>
            <td><?= htmlspecialchars($orcamento['nome']) ?></td>
            <td><?= htmlspecialchars($orcamento['descricao']) ?></td>
            <td><?= htmlspecialchars($orcamento['numero']) ?></td>
            <td><?= htmlspecialchars($orcamento['status']) ?></td>
            <td><?= htmlspecialchars($orcamento['tipo']) ?></td>
            <td>
                <form method="POST">
                    <select name="status[<?= $id ?>]">
                        <option value="em avaliacao" <?= $orcamento['status'] == 'em avaliacao' ? 'selected' : '' ?>>Em avaliação</option>
                        <option value="em andamento" <?= $orcamento['status'] == 'em andamento' ? 'selected' : '' ?>>Em andamento</option>
                        <option value="desistiu" <?= $orcamento['status'] == 'desistiu' ? 'selected' : '' ?>>Desistiu</option>
                    </select>
            </td>
            <td><button type="submit" class="btn1">Salvar</button></form></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h2>Em Andamento</h2>
<table>
    <thead>
        <tr>
            <th>Nome</th><th>Serviço</th><th>Whatsapp</th><th>Status</th><th>Tipo</th><th>Altera Status</th><th>Mudar status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orcamentosA as $id => $orcamento): ?>
        <tr>
            <td><?= htmlspecialchars($orcamento['nome']) ?></td>
            <td><?= htmlspecialchars($orcamento['descricao']) ?></td>
            <td><?= htmlspecialchars($orcamento['numero']) ?></td>
            <td><?= htmlspecialchars($orcamento['status']) ?></td>
            <td><?= htmlspecialchars($orcamento['tipo']) ?></td>
            <td>
                <form method="POST">
                    <select name="status[<?= $id ?>]">
                        <option value="em avaliacao" <?= $orcamento['status'] == 'em avaliacao' ? 'selected' : '' ?>>Em avaliação</option>
                        <option value="em andamento" <?= $orcamento['status'] == 'em andamento' ? 'selected' : '' ?>>Em andamento</option>
                        <option value="desistiu" <?= $orcamento['status'] == 'desistiu' ? 'selected' : '' ?>>Desistiu</option>
                    </select>
            </td>
            <td><button type="submit" class="btn1">Salvar</button></form></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h2>Desistiu</h2>
<table>
    <thead>
        <tr>
            <th>Nome</th><th>Serviço</th><th>Whatsapp</th><th>Status</th><th>Tipo</th><th>Altera Status</th><th>Mudar status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orcamentosD as $id => $orcamento): ?>
        <tr>
            <td><?= htmlspecialchars($orcamento['nome']) ?></td>
            <td><?= htmlspecialchars($orcamento['descricao']) ?></td>
            <td><?= htmlspecialchars($orcamento['numero']) ?></td>
            <td><?= htmlspecialchars($orcamento['status']) ?></td>
            <td><?= htmlspecialchars($orcamento['tipo']) ?></td>
            <td>
                <form method="POST">
                    <select name="status[<?= $id ?>]">
                        <option value="em avaliacao" <?= $orcamento['status'] == 'em avaliacao' ? 'selected' : '' ?>>Em avaliação</option>
                        <option value="em andamento" <?= $orcamento['status'] == 'em andamento' ? 'selected' : '' ?>>Em andamento</option>
                        <option value="desistiu" <?= $orcamento['status'] == 'desistiu' ? 'selected' : '' ?>>Desistiu</option>
                    </select>
            </td>
            <td><button type="submit" class="btn1">Salvar</button></form></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>