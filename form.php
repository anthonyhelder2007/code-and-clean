<?php
require_once "back-end/conexao.php";
session_start();

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? "");
    $senha = trim($_POST['senha'] ?? "");

    if ($email === "" || $senha === "") {
        $mensagem = "Preencha os dados";
    } else {
        $mensagem = validarLogin($email, $senha);
    }
}

function validarLogin($e, $s){
    global $pdo;

    if(!filter_var($e, FILTER_VALIDATE_EMAIL)){
        return "Digite um e-mail valido";
    }

    $sql = "SELECT id_adm, senha FROM adm WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $e]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // CORREÇÃO AQUI - era password_verify
    if ($usuario && $s === $usuario['senha']) {
        header("Location: back-end/adm.php");
        exit;
    } else {
        return "E-mail ou senha incorretos";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa - Anthony Code & Clean</title>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body>
    <main class="container-login">
        <div class="card-login">
            <div class="logo-topo">
                <img src="img/logo.jpeg" alt="Anthony Code & Clean">
                <div class="logo-text">
                    <strong>ANTHONY</strong>
                    <span>CODE & CLEAN</span>
                </div>
            </div>

            <h1>Área Administrativa</h1>
            <p class="subtitulo">Acesse com suas credenciais para gerenciar o sistema</p>

            <?php if ($mensagem !== ""): ?>
            <div class="alerta-erro">
                <p><?= htmlspecialchars($mensagem) ?></p>
            </div>
            <?php endif; ?>

            <form method="POST" action="">
                <label for="email">Usuário</label>
                <div class="input-box">
                    <i class="bi bi-person"></i>
                    <input type="text" id="email" name="email" placeholder="Digite seu e-mail">
                </div>

                <label for="senha">Senha</label>
                <div class="input-box">
                    <i class="bi bi-lock"></i>
                    <input type="password" id="senha" name="senha" placeholder="Digite sua senha">
                    <button type="button" class="olho" onclick="toggleSenha()"><i class="bi bi-eye" id="iconOlho"></i></button>
                </div>

                <div class="opcoes">
                    <label class="lembrar">
                        <input type="checkbox" name="lembrar">
                        Lembre-se de mim
                    </label>
                    <a href="#" class="esqueceu">Esqueceu a senha?</a>
                </div>

                <button type="submit" class="btn-entrar">Entrar</button>
            </form>

            <div class="seguro">
                <i class="bi bi-shield-check"></i>
                Ambiente seguro • Conexão protegida • SSL
            </div>
        </div>
        <footer>© 2024 ANTHONY CODE & CLEAN — Todos os direitos reservados.</footer>
    </main>

<script>
function toggleSenha(){
    const input = document.getElementById('senha');
    const icon = document.getElementById('iconOlho');
    if(input.type === 'password'){
        input.type = 'text';
        icon.classList.replace('bi-eye','bi-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('bi-eye-slash','bi-eye');
    }
}
</script>
</body>
</html>