-- Inserção de usuários
INSERT INTO usuario (name, email,password) VALUES
('João Silva', 'joao.silva@example.com',"$2y$10$SdNwKeynYOFBLFR99DMSQej3P5YNIFeaqH6Od.7gWkHXCg48iXXMC"),
('Maria Souza', 'maria.souza@example.com',"$2y$10$SdNwKeynYOFBLFR99DMSQej3P5YNIFeaqH6Od.7gWkHXCg48iXXMC"),
('Pedro Almeida', 'pedro.almeida@example.com',"$2y$10$SdNwKeynYOFBLFR99DMSQej3P5YNIFeaqH6Od.7gWkHXCg48iXXMC");

-- Inserção de anotações para o usuário 1 (João Silva)
INSERT INTO notas (id_user, title, body, dt_nota) VALUES
(1, 'Lembrete de Reunião', 'Não esquecer da reunião de equipe às 10h na sala principal.', '2025-01-15'),
(1, 'Ideias para Projeto X', 'Brainstorming inicial para o projeto X: funcionalidade A, B, C.', '2025-01-16'),
(1, 'Lista de Compras', 'Leite, pão, ovos, frutas, café.', '2025-01-17'),
(1, 'Acompanhamento Cliente Alfa', 'Verificar o status do projeto com o cliente Alfa até o final do dia.', '2025-01-18'),
(1, 'Planejamento de Férias', 'Pesquisar destinos de praia para as férias de julho.', '2025-01-19'),
(1, 'Estudar SQL', 'Revisar conceitos de JOINs e subqueries para a prova.', '2025-01-20'),
(1, 'Manutenção do Carro', 'Agendar a revisão anual do carro na concessionária.', '2025-01-21'),
(1, 'Feedback Reunião de Vendas', 'Pontos positivos e negativos da última reunião de vendas.', '2025-01-22'),
(1, 'Artigo para Blog', 'Esboçar o tópico e os pontos chave para o próximo artigo do blog.', '2025-01-23'),
(1, 'Pagar Contas', 'Contas de água, luz e internet com vencimento esta semana.', '2025-01-24');

-- Inserção de anotações para o usuário 2 (Maria Souza)
INSERT INTO notas (id_user, title, body, dt_nota) VALUES
(2, 'Agendar Consulta Médica', 'Marcar consulta com o cardiologista para revisão anual.', '2025-01-15'),
(2, 'Livro para Ler', 'Iniciar a leitura de "A Arte da Guerra" de Sun Tzu.', '2025-01-16'),
(2, 'Receita Nova', 'Testar a receita de bolo de cenoura com cobertura de chocolate.', '2025-01-17'),
(2, 'Exercícios Físicos', 'Plano de treino para a semana: 3x musculação, 2x corrida.', '2025-01-18'),
(2, 'Workshop de Fotografia', 'Confirmar inscrição no workshop de fotografia de paisagem.', '2025-01-19'),
(2, 'Organizar Armário', 'Separar roupas para doação e organizar o armário.', '2025-01-20'),
(2, 'Revisar TCC', 'Ler e revisar o trabalho de conclusão de curso.', '2025-01-21'),
(2, 'Presente de Aniversário', 'Comprar presente para o aniversário da Ana.', '2025-01-22'),
(2, 'Curso Online', 'Avançar nos módulos do curso online de Python.', '2025-01-23'),
(2, 'Plantar Flores', 'Comprar sementes e plantar novas flores no jardim.', '2025-01-24');

-- Inserção de anotações para o usuário 3 (Pedro Almeida)
INSERT INTO notas (id_user, title, body, dt_nota) VALUES
(3, 'Reunião com Fornecedor', 'Preparar pauta para a reunião com o novo fornecedor X.', '2025-01-15'),
(3, 'Orçamento Anual', 'Finalizar a revisão do orçamento anual da empresa.', '2025-01-16'),
(3, 'Contratar Estagiário', 'Revisar currículos e agendar entrevistas para a vaga de estagiário.', '2025-01-17'),
(3, 'Viagem a Negócios', 'Confirmar voos e hotel para a viagem de negócios a São Paulo.', '2025-01-18'),
(3, 'Atualizar Software', 'Instalar a última versão do software de gestão.', '2025-01-19'),
(3, 'Análise de Mercado', 'Pesquisar tendências de mercado para o próximo trimestre.', '2025-01-20'),
(3, 'Jantar com Clientes', 'Reservar mesa para o jantar com os clientes Y e Z.', '2025-01-21'),
(3, 'Relatório Mensal', 'Compilar dados para o relatório mensal de desempenho.', '2025-01-22'),
(3, 'Treinamento Equipe', 'Preparar material para o treinamento da nova equipe de vendas.', '2025-01-23'),
(3, 'Reunião de Diretoria', 'Organizar a apresentação para a próxima reunião de diretoria.', '2025-01-24');
