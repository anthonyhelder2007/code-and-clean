<?php
require_once "conexao.php";
$mensagem = "<p>Preencha os dados abaixo e retornaremos em até 24 horas com seu orçamento.</p>";

$tipo = "";
$nome = "";
$numero = "";
$email = "";
$descricao = "" ;



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'];
    $nome = $_POST['nome'];
    $numero = $_POST['numero'];
    $email = $_POST['email'];
    $descricao = $_POST['descricao'];

    $mensagem = validarForm($tipo, $nome, $numero, $email, $descricao);
}
function validarForm($type, $name, $number, $e, $desc){
    $tipos_validos = ["criaSite", "limpaPc", "formataPc"];
    $number_limpo = preg_replace('/[^0-9]/', '', $number);
    $erroSalvar = "";
    
    if (empty($type) ||empty($name) || empty($number) || empty($e) || empty($desc)) {
        return '<p class="erro">Preencha todos os campos</p>';
    }
    
    if (strlen($number_limpo) != 11) {
        return '<p class="erro">Numero inválido</p>';
     }
    if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
        return '<p class="erro">E-mail inválido</p>';
    }
    else if (!in_array($type, $tipos_validos)) {
        return '<p class="erro">Tipo invalido</p>';
    }else{
         $erroSalvar = salvarOrcamento($type, $name, $number_limpo, $e, $desc);
         if ($erroSalvar != true) {
             return '<p class="erro">Os dados não foram salvos</p>';
         }
    }
    return '<p class="sucesso">Orçamento salvo com sucesso.</p>';
}

function salvarOrcamento($tp, $na, $nu, $e, $descri){
    try {
        global $pdo;
        $salvar = "INSERT INTO orcamento (tipo, nome, numero, email, descricao)
        VALUES (:tipo, :nome, :numero, :email, :descricao);";
        $stmt = $pdo->prepare($salvar);
        $stmt->execute([
            ":tipo" => $tp,
            ":nome" => $na,
            ":numero" => $nu,
            ":email" => $e,
            ":descricao" => $descri,
        ]);
        return true;
    } catch (PDOException $erroBanco) {
         return false;
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Code Clean</title>
	<link rel="stylesheet" href="../css/orcamento.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
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
			<li><a href="#">Sobre</a></li>
			<li><a href="https://wa.me/5575999999999?text=Ol%C3%A1%20Anthony!%20Vim%20pelo%20site%20e%20quero%20um%20or%C3%A7amento.">Contato</a></li>
		</ul>
	</nav>
	<div class="header-actions">
    <a href="orcamento.php" class="btn1">Orçamento</a>
    <a href="form.php" class="login-icon" title="Entrar">
      <i class="bi bi-person"></i>
    </a>
  </div>
	</header>

	<div class="container">
	    <div class="card1">
			<h1>Solicite seu orçamento</h1>
			<?php echo $mensagem;?>
			<form action="orcamento.php" method="post">
			<label for="tipo">Tipo de serviço</label>
			    <select name="tipo" id="tipo">
					<option value="">Selecione o serviço</option>
					<option value="criaSite">Criação de Site</option>
					<option value="limpaPc">Limpeza do Computador</option>
					<option value="formataPc">Formatação de PC</option>
				</select>
				<label for="nome">Nome completo</label>
				<input type="text" name="nome" placeholder="Digite seu nome completo">
				<label for="whatsapp">Whatsapp</label>
				<input type="number" name="numero" placeholder="EX: 75999999999">
				<label for="email">E-mail</label>
				<input type="email" name="email" placeholder="Digite seu E-mail">
				<label for="descricao">Descrição</label>
				<input type="text" name="descricao" placeholder="Conte mais sobre o serviço desejado">

				<button type="submit">Enviar solicitação</button>
			</form>
			<p>Ao enviar você concorda com a nossa politica de privacidade</p>
		</div>
		
		<div class="card2">
		    <h2>Como funciona</h2>
		<ol>
            <li>
                <span class="titulo-passo">Envie a solicitação</span>
                <ul>
                    <li>Recebemos os seus dados e analisamos a sua demanda.</li>
                </ul>
            </li>
            <li>
                <span class="titulo-passo">Receba seu orçamento</span>
                <ul>
                    <li>Retornaremos em até 24h com o orçamento detalhado.</li>
                </ul>
            </li>
            <li>
                <span class="titulo-passo">Aprovamos e executamos</span>
                <ul>
                    <li>Após aprovação iniciaremos o serviço no prazo combinado.</li>
                </ul>
            </li>
		</ol>
		
		<div class="card3">
		    <span class="titulo-passo">Orçamento 100% gratuito</span>
			<span class="titulo-passo">Sem compromisso</span>
		</div>
		</div>
	</div>

<footer class="footer">
  <p>© 2026 ANTHONY CODE & CLEAN • contato@anthonycodeclean@gmail.com • Alagoinhas - BA</p>
  </footer> 
</body>
</html>