document.getElementById('enviar-btn').addEventListener('click', () => {
    const nome = document.getElementById('nome').value.trim();
    const email = document.getElementById('email').value.trim();
    const telefone = document.getElementById('telefone').value.trim();
    const mensagem = document.getElementById('mensagem').value.trim();
    const resultado = document.getElementById('mensagem-resultado');

    // Validação simples dos campos
    if (!nome || !email || !telefone || !mensagem) {
        resultado.style.color = 'red';
        resultado.textContent = 'Por favor, preencha todos os campos.';
        return;
    }

    if (!validateEmail(email)) {
        resultado.style.color = 'red';
        resultado.textContent = 'Por favor, insira um e-mail válido.';
        return;
    }

    if (!validateTelefone(telefone)) {
        resultado.style.color = 'red';
        resultado.textContent = 'Por favor, insira um telefone válido (apenas números).';
        return;
    }

    // Simulação de envio de dados
    resultado.style.color = 'green';
    resultado.textContent = 'Mensagem enviada com sucesso! Entraremos em contato em breve.';
    console.log({
        nome,
        email,
        telefone,
        mensagem
    });

    // Limpar campos após envio
    document.getElementById('contato-form').reset();
});

// Função para validar e-mail
function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

// Função para validar telefone (apenas números e mínimo de 10 dígitos)
function validateTelefone(telefone) {
    const regex = /^[0-9]{10,}$/;
    return regex.test(telefone);
}
