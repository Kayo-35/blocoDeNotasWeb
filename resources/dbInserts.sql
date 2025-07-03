-- Inserções em lote para a tabela 'usuario'
INSERT INTO usuario (name, email) VALUES
('Alice Silva', 'alice.silva@example.com'),
('Bruno Costa', 'bruno.costa@example.com'),
('Carla Oliveira', 'carla.oliveira@example.com');

-- Inserções em lote para a tabela 'notas'

-- Notas para Alice Silva (id_user = 1)
INSERT INTO notas (id_user, body, dt_nota) VALUES
(1, 'Lembrete: Comprar pão e leite para o café da manhã.', '2024-01-15'),
(1, 'Ideias para o projeto X: Pesquisar sobre inteligência artificial e machine learning.', '2024-01-16'),
(1, 'Reunião com a equipe às 10h na sala de conferências.', '2024-01-17'),
(1, 'Lista de compras: Arroz, feijão, carne, legumes e frutas.', '2024-01-18'),
(1, 'Anotações da aula de história: Revolução Francesa e seus impactos.', '2024-01-19'),
(1, 'Planejar viagem de férias para o litoral em julho.', '2024-01-20'),
(1, 'Exercícios físicos: 30 minutos de caminhada e 15 minutos de alongamento.', '2024-01-21'),
(1, 'Receita nova: Bolo de cenoura com cobertura de chocolate.', '2024-01-22'),
(1, 'Ligar para o encanador para consertar o vazamento na pia.', '2024-01-23'),
(1, 'Estudar para a prova de matemática na próxima semana.', '2024-01-24');

-- Notas para Bruno Costa (id_user = 2)
INSERT INTO notas (id_user, body, dt_nota) VALUES
(2, 'Tarefa pendente: Finalizar relatório financeiro até sexta-feira.', '2024-02-01'),
(2, 'Pesquisar sobre novas tecnologias para desenvolvimento web.', '2024-02-02'),
(2, 'Agendar consulta com o dentista para revisão anual.', '2024-02-03'),
(2, 'Ideias para o blog: Artigo sobre produtividade e gestão de tempo.', '2024-02-04'),
(2, 'Comprar presente de aniversário para a mãe.', '2024-02-05'),
(2, 'Assistir ao webinar sobre marketing digital.', '2024-02-06'),
(2, 'Revisar código do módulo de autenticação.', '2024-02-07'),
(2, 'Planejar o churrasco do fim de semana com os amigos.', '2024-02-08'),
(2, 'Aprender sobre a nova versão do framework JavaScript.', '2024-02-09'),
(2, 'Verificar as atualizações de segurança do sistema.', '2024-02-10'),
(2, 'Organizar a pasta de documentos no computador.', '2024-02-11');

-- Notas para Carla Oliveira (id_user = 3)
INSERT INTO notas (id_user, body, dt_nota) VALUES
(3, 'Preparar apresentação para a reunião de segunda-feira.', '2024-03-01'),
(3, 'Ler o livro "O Poder do Hábito" para o clube do livro.', '2024-03-02'),
(3, 'Comprar passagens aéreas para a conferência em São Paulo.', '2024-03-03'),
(3, 'Ideias para o novo design do site: Cores, fontes e layout.', '2024-03-04'),
(3, 'Fazer a matrícula na academia de ginástica.', '2024-03-05'),
(3, 'Pesquisar sobre cursos de fotografia online.', '2024-03-06'),
(3, 'Enviar e-mail de acompanhamento para o cliente X.', '2024-03-07'),
(3, 'Visitar a exposição de arte no museu.', '2024-03-08'),
(3, 'Planejar o cardápio da semana para uma alimentação saudável.', '2024-03-09'),
(3, 'Revisar o contrato com o fornecedor.', '2024-03-10'),
(3, 'Comprar material de escritório: Canetas, cadernos e post-its.', '2024-03-11'),
(3, 'Organizar o guarda-roupa e doar roupas antigas.', '2024-03-12');
