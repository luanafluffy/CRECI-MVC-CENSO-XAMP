CREATE TABLE DB_CRECI_CENSO.dbo.censos (
    id INT IDENTITY  PRIMARY KEY NOT NULL, 
    ano_exerc VARCHAR(255),
    creci_numero VARCHAR(255),
    inicio_censo VARCHAR(255),
    nome_corretor VARCHAR(255),
    cadastro_censo VARCHAR(255),
    p1_cadastro VARCHAR(255),
    p1_entrada VARCHAR(255),
    p1_status VARCHAR(255),
    p1_just VARCHAR(255),
    p1_atuali_status VARCHAR(255),
    p1_saida VARCHAR(255),
    p2_cadastro VARCHAR(255),
    p2_entrada VARCHAR(255),
    p2_status VARCHAR(255),
    p2_just VARCHAR(255),
    p2_atuali_status VARCHAR(255),
    p2_saida VARCHAR(255),
    p3_cadastro VARCHAR(255),
    p3_entrada VARCHAR(255),
    p3_status VARCHAR(255),
    p3_just VARCHAR(255),
    p3_atuali_status VARCHAR(255),
    p3_saida VARCHAR(255),

    -- Proibe que existam dois censos cadastrados de um mesmo corretor no mesmo ano
    FOREIGN KEY (creci_numero) REFERENCES corretores(creci_numero),
    CONSTRAINT  creci_numero UNIQUE (creci_numero, ano_exerc)
);

CREATE TABLE DB_CRECI_CENSO.dbo.usuarios (
	id INT IDENTITY  PRIMARY KEY NOT NULL, 
    nome_usuario VARCHAR(255) NOT NULL,
    nome_completo VARCHAR(255) NOT NULL,
    setor VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    ultimo_logout_hora VARCHAR(255),
    ultimo_logout_data VARCHAR(255),
	ultimo_login_hora VARCHAR(255),
    ultimo_login_data VARCHAR(255),
	status_OnOff BIT DEFAULT 0 NOT NULL,
    e_Admin VARCHAR(255),
);

INSERT INTO DB_CRECI_CENSO.dbo.usuarios (nome_usuario, nome_completo, setor, senha)
VALUES ('admin', 'Administrador', 'TI', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.');

INSERT INTO DB_CRECI_CENSO.dbo.usuarios (nome_usuario, nome_completo, setor, senha)
VALUES ('ma', 'Maria da Silva', 'Financeiro', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.');

INSERT INTO DB_CRECI_CENSO.dbo.usuarios (nome_usuario, nome_completo, setor, senha, ultimo_logout_hora, ultimo_logout_data, ultimo_login_hora, ultimo_login_data)
VALUES ('jo', 'João Nascimento da Silva', 'Administrativo', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', '11:00:00', '24/06/2020', '10:00:00', '23/06/2020');

-- Adiconando dados paa corretores - censo
INSERT INTO DB_CRECI_CENSO.dbo.censos (
    creci_numero, nome_corretor, cadastro_censo, inicio_censo, 
    p1_cadastro, p1_entrada, p1_status, p1_just, p1_atuali_status, 
    p1_saida, p2_cadastro, p2_entrada, p2_status, p2_just, p2_atuali_status, 
    p2_saida, p3_cadastro, p3_entrada, p3_status, 
    p3_just, p3_atuali_status, p3_saida, ano_exerc) 
VALUES (
    '6666', 'Joaquim Ferreira Campos' , 'Jeane Santos', '09/01/2020', 
    'Geraldo Maia', '27/02/2020', 'PARCELADO', '15/15/2020', 'Geraldo Maia, em 27/02/2020', 
    '27/02/2020', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 
    'NULL', 'Jeane Santos', '05/03/2020', 'OK', 
    'Jeane Santos', 'NULL', 'NULL', '2020');

INSERT INTO DB_CRECI_CENSO.dbo.censos (
    creci_numero, nome_corretor, cadastro_censo, inicio_censo, 
    p1_cadastro, p1_entrada, p1_status, p1_just, p1_atuali_status, 
    p1_saida, p2_cadastro, p2_entrada, p2_status, p2_just, p2_atuali_status, 
    p2_saida, p3_cadastro, p3_entrada, p3_status, 
    p3_just, p3_atuali_status, p3_saida, ano_exerc) 
VALUES (
    '1111', 'Maria dos Santos' , 'Jeane Santos', '07/01/2020', 
    'Geraldo Maia', '27/02/2020', 'PARCELADO', '15/15/2020', 'Geraldo Maia, em 27/02/2020', 
    '27/02/2020', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 
    'NULL', 'Jeane Santos', '05/03/2020', 'OK', 
    'Jeane Santos', 'NULL', 'NULL', '2020');