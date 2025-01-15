----------------- criando alterecao de novo valor das chacaras com PROCEDURE -----------------
DELIMITER $$
CREATE PROCEDURE AtualizarValorChacaras(
    IN idChacara INT,
    IN NovoValor VARCHAR(100) 
)
BEGIN
    UPDATE infochacaras
    SET valor = NovoValor
    WHERE IdInfoChacaras = (
        SELECT ch.IdInfoChacaras
        FROM Chacaras ch
        WHERE ch.IdChacaras = idChacara
    );
END$$
DELIMITER ;

CALL AtualizarValorChacaras(2, '2000,00'); -- Passar idChacara e valor

SELECT 
    ch.IdChacaras AS "Código Chacara", 
    ic.IdInfoChacaras as  "Código InfoChacara",
    ch.Nome AS "Nome Chacara", 
    ic.Valor AS "Valor"
FROM Chacaras ch
INNER JOIN  InfoChacaras ic ON ch.IdInfoChacaras = ic.IdInfoChacaras;
    
----------------- PROCEDURE para cancelar visita -----------------

DELIMITER $$
CREATE PROCEDURE CancelamentoDeAgendamento(
    IN IdAgendamento INT
)
BEGIN
	DELETE FROM agendamentoVisita
	WHERE IdAgendamentoVisita = IdAgendamento;
END$$
DELIMITER ;

INSERT INTO agendamentoVisita (IdCliente, Data, Hora, IdChacara, ConfirmacaoAgendamento, Mensagem)
VALUES 
(1, '2025-01-15', '14:00:00', 1, 0, 'Agendamento confirmado para visita técnica.');

CALL CancelamentoDeAgendamento(1);

select * from agendamentovisita;

----------------- PROCEDURE alteracao de confirmacao de visita -----------------

DELIMITER $$
CREATE PROCEDURE AlterecaoConfirmacaoVisita(
    IN IdAgendamento INT,
	IN NovoConfirmacaoAgendamento int 	
)
BEGIN
	UPDATE agendamentovisita
    SET ConfirmacaoAgendamento = NovoConfirmacaoAgendamento
    WHERE IdAgendamentoVisita = IdAgendamento;
END$$
DELIMITER ;

CALL AlterecaoConfirmacaoVisita(17,1); -- passar parametros IdAgendamento e confirmacaoAgendamento: 0 Não Confirmado e 1 Confirmado

select * from agendamentovisita;

----------------- FUNCTION desconto na chacara -----------------
DELIMITER $$
CREATE FUNCTION AplicarDesconto(valorOriginal VARCHAR(100), descontoPorcentagem DECIMAL(5,2))
RETURNS VARCHAR(100)
DETERMINISTIC
BEGIN
    DECLARE valorComDesconto DECIMAL(10,2);
    DECLARE valorOriginalDecimal DECIMAL(10,2);
    
    -- Substituindo a vírgula por ponto e convertendo o valorOriginal para DECIMAL
    SET valorOriginalDecimal = CAST(REPLACE(valorOriginal, ',', '.') AS DECIMAL(10,2));
    
    -- Calculando o valor com desconto
    SET valorComDesconto = valorOriginalDecimal - (valorOriginalDecimal * (descontoPorcentagem / 100));
    
    -- Retornando o valor com desconto como VARCHAR usando CONVERT
    RETURN CONVERT(valorComDesconto, CHAR(100));
END$$
DELIMITER ;

SELECT 
    IdInfoChacaras, 
    Valor, 
    AplicarDesconto(Valor, 10) AS "ValorComDesconto" FROM infoChacaras;

----------------- PROCEDURE remarcao data e hora  de visita de agendamento -----------------

DELIMITER $$
CREATE PROCEDURE AlterarDataHoraAgendamento(
    IN p_idAgendamento INT,         -- ID do agendamento a ser alterado
    IN p_novaData DATE,             -- Nova data do agendamento
    IN p_novaHora TIME              -- Nova hora do agendamento
)
BEGIN
    UPDATE agendamentovisita
    SET Data = p_novaData,
        Hora = p_novaHora,
        ConfirmacaoAgendamento = 0
    WHERE IdAgendamentoVisita = p_idAgendamento;
END$$
DELIMITER ;

select * from agendamentovisita;
select * from cliente;
CALL AlterarDataHoraAgendamento(12, '2025-02-20', '14:30:00'); -- passar id do agendamento, nova data e nova hora para remarcar




