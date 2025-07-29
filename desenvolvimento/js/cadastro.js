

function validarTudo() {

    const cpfValido = validarCPF();
    const senhaValida = verificarSenhas();

    return cpfValido && senhaValida;
}

function verificarSenhas() {
    const senha = document.querySelector('input[name="senha"]').value;
    const confirmar = document.querySelector('input[name="confirmar_senha"]').value;

    if (senha !== confirmar) {
        alert("As senhas não coincidem!");
        return false;
    }
    return true;
}

function validarCPF() {
    const cpfInput = document.querySelector('input[name="cpf"]');
    const cpf = cpfInput.value.replace(/[^\d]+/g, '');

    if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) {
        alert("CPF inválido!");
        return false;
    }

    // Validação dos dígitos verificadores
    let soma = 0;
    for (let i = 0; i < 9; i++) soma += parseInt(cpf.charAt(i)) * (10 - i);
    let dig1 = (soma * 10) % 11;
    if (dig1 === 10 || dig1 === 11) dig1 = 0;
    if (dig1 !== parseInt(cpf.charAt(9))) {
        alert("CPF inválido!");
        return false;
    }

    soma = 0;
    for (let i = 0; i < 10; i++) soma += parseInt(cpf.charAt(i)) * (11 - i);
    let dig2 = (soma * 10) % 11;
    if (dig2 === 10 || dig2 === 11) dig2 = 0;
    if (dig2 !== parseInt(cpf.charAt(10))) {
        alert("CPF inválido!");
        return false;
    }

    return true;
}
