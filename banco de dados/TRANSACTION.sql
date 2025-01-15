DELIMITER $$
CREATE PROCEDURE ApagarCliente(
    IN IdClienteApagar INT         -- ID do cliente a ser apagado
)
BEGIN
    START TRANSACTION;
    
    DELETE FROM agendamentoVisita 
    WHERE IdCliente = IdClienteApagar;
    DELETE FROM Cliente 
    WHERE IdCliente = IdClienteApagar;
  
    COMMIT;
END$$
DELIMITER ;

CALL ApagarCliente(10);
SELECT 
    Cliente.IdCliente,
    Cliente.Nome,
    Cliente.Cpf,
    agendamentoVisita.IdAgendamentoVisita,
    agendamentoVisita.Data,
    agendamentoVisita.IdChacara,
    agendamentoVisita.ConfirmacaoAgendamento
FROM Cliente JOIN  agendamentoVisita ON Cliente.IdCliente = agendamentoVisita.IdCliente;
