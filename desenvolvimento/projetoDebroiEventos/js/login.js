document.getElementById("login-form").addEventListener("submit", function (e) {
    e.preventDefault(); // Impede o envio padrão do formulário

    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    // Validações básicas
    if (!email || !password) {
        alert("Por favor, preencha todos os campos.");
        return;
    }

    // Simulação de autenticação
    if (email && password) {
        alert("Login realizado com sucesso!");
        window.location.href = "/html/agendamento.html";
    } else {
        alert("E-mail ou senha incorretos.");
    }
});
