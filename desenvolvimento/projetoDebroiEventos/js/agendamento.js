document.getElementById("agendamento-form").addEventListener("submit", function (event) {
    event.preventDefault();
    const nome = document.getElementById("nome").value;
    const email = document.getElementById("email").value;
    const telefone = document.getElementById("telefone").value;
    const data = document.getElementById("data").value;
    const horario = document.getElementById("horario").value;
    const chacara = document.getElementById("chacara").value;
    const mensagem = document.getElementById("mensagem").value;

    if (nome && email && telefone && data && horario && chacara) {
        alert(`Agendamento realizado com sucesso para ${data} às ${horario}.`);
        // Aqui você pode enviar os dados para um servidor
    } else {
        alert("Por favor, preencha todos os campos obrigatórios.");
    }
});
