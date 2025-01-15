----------------- Criacao de View para gerar relatorios de agendamento de visita -----------------

create view relatorio_agendamento_visita as
SELECT 
    av.IdAgendamentoVisita AS "Numero de controle",
    c.Nome AS "Nome Cliente",
    c.Telefone AS "Telefone Cliente",
    c.Email AS "Email Cliente",
    ch.Nome AS "Nome Chacara",
    av.Data AS "Data do agendamento",
    av.Hora AS "Hora do agendamento",
    av.Mensagem AS "Mensagem do cleinte",
    CASE 
        WHEN av.ConfirmacaoAgendamento = 1 THEN 'Confirmado'
        WHEN av.ConfirmacaoAgendamento = 0 THEN 'Não Confirmado'
        ELSE 'Indefinido'
    END AS "Confirmação Agendamento"
FROM 
    AgendamentoVisita av
JOIN 
    Cliente c ON av.IdCliente = c.IdCliente
JOIN 
    Chacaras ch ON av.IdChacara = ch.IdChacaras;
    
select * from relatorio_agendamento_visita;

----------------- Criacao de View de contato de cliente não cadastrado -----------------

create view cliente_nao_cadastrado as
SELECT 
    Nome AS "Nome Contato não cadastrado",
    Telefone AS "Telefone Contato" ,
    Email AS "Email Contato",
    Mensagem as "Mensagem"
FROM 
    ContatoClienteNaoCadastrado;
    
select * from ContatoClienteNaoCadastrado;

----------------- Criacao de View de Informacoes completas da chacara -----------------

create view informacoes_completas_chacara as
SELECT 
    ch.IdChacaras AS "Codigo Chacara",
    ch.Nome AS "Nome Chacara" ,
    ch.Descricao AS "Descricao Chacara",
    
    -- Informações sobre Wifi
    CASE 
        WHEN ic.Wifi = 1 THEN 'Sim'
        ELSE 'Não'
    END AS "Wifi Disponivel",
    
    -- Informações sobre Piscina
    CASE 
        WHEN ic.Piscina = 1 THEN 'Sim'
        ELSE 'Não'
    END AS "Piscina Disponivel",
    
    -- Outros detalhes
    ic.qtdMaxConvidados AS "Maximo de Convidados",
    ic.qtdMinConvidados AS "Minimo de Convidados",
    ic.Valor AS "Valor da Chacara",
    ic.Banheiro AS "Quantidade de chacara",
    ic.Estacionamento AS "Quantidade de vagas no estacionamento"
FROM 
    Chacaras ch
JOIN 
    InfoChacaras ic ON ch.IdInfoChacaras = ic.IdInfoChacaras;

select * from informacoes_completas_chacara;

----------------- Criacao de View de Informacoes do cliente -----------------
create view informacoes_cliente as
SELECT 
    IdCliente AS CodigoCliente,
    Nome AS "Nome Cliente",
    Email AS "Email Cliente",
    Telefone AS "TelefoneCliente",
    Cpf AS "CpfCliente"
FROM 
    Cliente;
select * from informacoes_cliente


