function verificarSenhas() {
    const senha = document.querySelector('input[name="senha"]').value;
    const confirmarSenha = document.querySelector('input[name="confirmar_senha"]').value;

    if (senha !== confirmarSenha) {
        alert("As senhas não coincidem.");
        return false;
    }
    return true;
}