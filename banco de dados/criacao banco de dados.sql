-- criacao de db debroieventos --
CREATE SCHEMA `debroieventos`;

-- criacao de tabela priprietario --
create table Corretor(
	IdCorretor integer primary key auto_increment,
    Nome varchar(100) not null,
    Cpf BIGINT NOT NULL UNIQUE, 
    Telefone varchar(15) not null,
    Email varchar(255) NOT NULL, 
    Endereco varchar(255) not null,
    Descricao Varchar(550) 
);

-- criacao de INSERT priprietario --
INSERT INTO Corretor (Nome, Cpf, Telefone, Email, Endereco, Descricao)
VALUES
('Joao da Silva', 12345678901, '(11) 91234-5678', 'joao.silva@gmail.com', 'Rua das Flores, 123 - São Paulo, SP', 'Proprietário de imóveis comerciais.'),
('Maria Oliveira', 98765432100, '(21) 99876-5432', 'maria.oliveira@hotmail.com', 'Av. Atlântica, 456 - Rio de Janeiro, RJ', 'Especializada em administração de propriedades rurais.'),
('Carlos Pereira', 11223344556, '(31) 91234-8765', 'carlos.pereira@yahoo.com', 'Rua Minas Gerais, 789 - Belo Horizonte, MG', 'Responsável por locação de imóveis residenciais.'),
('Ana Souza', 55667788900, '(41) 99888-7766', 'ana.souza@outlook.com', 'Av. Paraná, 321 - Curitiba, PR', 'Proprietária de empreendimentos turísticos.'),
('Roberto Lima', 99887766554, '(61) 99333-4455', 'roberto.lima@empresa.com', 'SQN 302 Bloco B, Brasília, DF', 'Investidor e gestor de patrimônio imobiliário.');

select * from Corretor;

-- criacao de tabela estado --
create table estado(
IdEstado integer primary key auto_increment,
Estados varchar(100) not null
);

-- inserir dados estados
INSERT INTO estado (Estados)
VALUES
('Acre'),('Alagoas'),('Amapa'),('Amazonas'),('Bahia'),('Ceara'),('Distrito Federal'),('Espirito Santo'),
('Goias'),('Maranhao'),('Mato Grosso'),('Mato Grosso do Sul'),('Minas Gerais'),('Para'),('Paraiba'),('Parana'),
('Pernambuco'),('Piaui'),('Rio de Janeiro'),('Rio Grande do Norte'),('Rio Grande do Sul'),('Rondonia'),('Roraima'),
('Santa Catarina'),('Sao Paulo'),('Sergipe'),('Tocantins');
select * from estado;

-- criacao de tabela endereco --
create table endereco(
	IdEndereco integer primary key auto_increment,
    Cep BIGINT NOT NULL UNIQUE,
	rua varchar(100) not null,
    bairro varchar(100) not null,
    cidade varchar(100) not null,
    Estado_Id integer not null,
	numero integer not null,
    foreign key (Estado_Id) references estado(IdEstado)
);

-- criando dados para enderecos
INSERT INTO endereco (Cep, rua, bairro, cidade, Estado_Id, numero)
VALUES
(12345678901, 'Rua das Flores', 'Centro', 'São Paulo', 26, 123),  -- São Paulo (Estado_Id 26)
(23456789012, 'Avenida Brasil', 'Zona Norte', 'Rio de Janeiro', 19, 456),  -- Rio de Janeiro (Estado_Id 19)
(34567890123, 'Rua Goiás', 'Jardim Paulista', 'Belo Horizonte', 13, 789);  -- Minas Gerais (Estado_Id 13)

select * from endereco;

-- criacao de tabela infoChacaras --
create table infoChacaras(
	IdInfoChacaras integer primary key auto_increment,
    qtdMaxConvidados integer not null,
    qtdMinConvidados integer not null,
    Valor varchar(100) not null,
    Wifi TINYINT(1) NOT NULL, -- Campo booleano
    Piscina TINYINT(1) NOT NULL,
    Banheiro integer not null,
    Estacionamento integer not null
);

-- inserindo dados em infoChacaras
INSERT INTO infoChacaras (qtdMaxConvidados, qtdMinConvidados, Valor, Wifi, Piscina, Banheiro, Estacionamento)
VALUES
(100, 50, '500,00', 1, 1, 4, 20),  
(150, 80, '800,00', 0, 1, 6, 30),  
(200, 120, '1.200,00', 1, 0, 8, 40);  

select * from infochacaras;

-- criacao da tabela do proprietario da chacara
create table proprietario(
	IdProprietario integer primary key auto_increment,
    Nome varchar(100) not null,
    Cpf BIGINT NOT NULL, 
    Telefone varchar(15) not null,
    Email varchar(255) NOT NULL
);

-- criando inserts para proprietarios da chacaras
INSERT INTO proprietario (Nome, Cpf, Telefone, Email)
VALUES
('Carlos Oliveira', 12345678901, '(11) 91234-5678', 'carlos.oliveira@gmail.com'),
('Fernanda Souza', 98765432100, '(21) 99876-5432', 'fernanda.souza@hotmail.com'),
('Juliana Lima', 11223344556, '(31) 91234-8765', 'juliana.lima@yahoo.com');

select * from proprietario;

-- Criacao da tabela chacaras
create table chacaras(
	IdChacaras integer primary key auto_increment,
    IdProprietario integer not null,
    Nome varchar(100) not null,
    Descricao varchar(500) not null,
    IdInfoChacaras integer not null,
    IdEndereco integer not null,
    IdCorretor integer not null,
    foreign key (IdProprietario) references proprietario(IdProprietario),
    foreign key (IdInfoChacaras) references infochacaras(IdinfoChacaras),
    foreign key (IdEndereco) references endereco(IdEndereco),
    foreign key (IdCorretor) references corretor(IdCorretor)
);


-- inserindo dados em chacaras
INSERT INTO chacaras (IdProprietario, Nome, Descricao, IdInfoChacaras, IdEndereco, IdCorretor)
VALUES
(1, 'Chácara Jardim dos Lagos', 'Chácara com grande área verde, piscina, churrasqueira e 10 vagas de estacionamento.', 1, 1, 1),
(2, 'Chácara Recanto do Sol', 'Chácara com espaço para eventos, piscina e amplo jardim.', 2, 2, 2),
(3, 'Chácara Paraíso', 'Chácara tranquila com área para pesca e lazer em família.', 3, 3, 3);

select * from chacaras;
select * from proprietario;
select * from infochacaras;
select * from endereco;
select * from Corretor;

-- Criando tabela cliente
create table Cliente(
	IdCliente integer primary key auto_increment,
    Nome varchar(100) not null,
    Email varchar(255) not null,
    Telefone VARCHAR(15) not null,
	Senha  varchar(100) not null,
    Cpf BIGINT NOT NULL not null UNIQUE
);

-- criando inserts do cliente
INSERT INTO Cliente (Nome, Email, Telefone, Senha, Cpf)
VALUES
('João da Silva', 'joao.silva@gmail.com', '(11) 91234-5678', 'senha123', 12345678901),
('Maria Oliveira', 'maria.oliveira@hotmail.com', '(21) 99876-5432', 'segredo456', 98765432100),
('Carlos Pereira', 'carlos.pereira@yahoo.com', '(31) 91234-8765', 'minhasenha789', 11223344556);

select * from Cliente;


-- criando tabela de agendamento de visita
create table agendamentoVisita(
	IdAgendamentoVisita integer primary key auto_increment,
    IdCliente integer not null,
    Data DATE NOT NULL,
    Hora TIME NOT NULL,
    IdChacara INT NOT NULL,
    ConfirmacaoAgendamento int,
    Mensagem VARCHAR(500),
    foreign key (IdCliente) references Cliente(idCliente),
    foreign key (IdChacara) references chacaras(IdChacaras)
);

-- Criando inserts AgendamentoVisita
INSERT INTO agendamentoVisita (IdCliente, Data, Hora, IdChacara, ConfirmacaoAgendamento, Mensagem)
VALUES 
    (1, '2025-01-15', '10:00:00', 2, 1, 'Gostaria de agendar uma visita à chácara para avaliar o espaço.'),
    (3, '2025-01-17', '14:30:00', 1, 0, 'Preciso confirmar a disponibilidade da chácara para a data desejada.'),
    (2, '2025-01-20', '09:00:00', 3, 1, 'Confirmar visita para verificar o local para um evento.');

select * from agendamentoVisita;
select * from cliente;
select * from chacaras;


-- criacao Contato cliente Nao cadastrado
create table ContatoClienteNaoCadastrado(
	Id integer primary key auto_increment,
	Nome varchar(100) not null,
    Telefone VARCHAR(15) not null,
    Email varchar(255) not null,
    Mensagem varchar(550)
);

-- inserts de dados cliente nao cadastrado
INSERT INTO ContatoClienteNaoCadastrado (Nome, Telefone, Email, Mensagem)
VALUES 
    ('Maria Oliveira', '9876543210', 'maria.oliveira@example.com', 'Preciso de mais informações sobre as chácaras.'),
    ('Carlos Pereira', '5551234567', 'carlos.pereira@example.com', 'Estou interessado em agendar uma visita.'),
    ('Ana Costa', '4432109876', 'ana.costa@example.com', 'Quero saber se há chácaras com área para eventos.');

select * from ContatoClienteNaoCadastrado;













