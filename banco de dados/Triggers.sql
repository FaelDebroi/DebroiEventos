select * from agendamentovisita;

----------------- verificacao para apagar cliente com visita marcada -----------------
DROP TRIGGER IF EXISTS Verificacao_apagar_Cliente; -- APAGAR
 
DELIMITER $$
CREATE TRIGGER Verificacao_apagar_Cliente
BEFORE DELETE ON cliente
FOR EACH ROW
BEGIN
    DECLARE v_data_visita DATE;

    -- Obtendo a data do agendamento da visita para o cliente que está sendo deletado
    SELECT Data INTO v_data_visita
    FROM agendamentovisita
    WHERE IdCliente = OLD.IdCliente;  -- Usando 'IdCliente' como chave primária

    -- Comparando se a data da visita é maior que a data atual
    IF v_data_visita > CURDATE() THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Não é possível apagar um cliente antes da visita, apague a visita antes.';
    END IF;
END$$
DELIMITER ;

INSERT INTO Cliente (Nome, Email, Telefone, Senha, Cpf)
VALUES
('João Silva', 'joao.silva@email.com', '123456789', 'senha123', 45678912345),
('Maria Souza', 'maria.souza@email.com', '987654321', 'senha456', 98765432109);

select * from cliente;

INSERT INTO agendamentoVisita (IdCliente, Data, Hora, IdChacara, ConfirmacaoAgendamento, Mensagem)
VALUES
-- (id do cliente, '2025-01-15', '14:00:00', 1, 1, 'Agendamento confirmado para visita técnica.')
(9, '2025-01-15', '14:00:00', 1, 1, 'Agendamento confirmado para visita técnica.'),
(10, '2025-01-15', '14:00:00', 1, 0, 'Visita técnica para avaliação do espaço.');
select * from agendamentoVisita;

-- exemplos
-- delete from cliente c where c.IdCliente = id do cliente;
delete from cliente where c.IdCliente = 9;
SELECT * FROM agendamentovisita;


----------------- verificacao para apagar agendamento de visita com visita confirmada -----------------

DELIMITER $$
CREATE TRIGGER Verificacao_confirmacao_agendamento
BEFORE DELETE ON agendamentovisita
FOR EACH ROW
BEGIN
    -- Verificando se o campo ConfirmacaoAgendamento é diferente de 0
    IF OLD.ConfirmacaoAgendamento != 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Não é possível apagar o agendamento. A confirmação do agendamento ja foi feita pelo cliente. Remarque a visita primeiramente';
    END IF;
END$$
DELIMITER ;

DELETE FROM agendamentovisita WHERE IdAgendamentoVisita = 12;
select * from agendamentovisita;

