INSERT INTO `usuario` (`name`, `email`, `password`) VALUES
("Ana Silva", "ana.silva@example.com", "$2b$12$3KbRjvupie0onRKJQIhQ8OOgo2Kcpt65lE0wLHJ3jzGq9S6.xoNMK"); -- senha: password123
INSERT INTO `usuario` (`name`, `email`, `password`) VALUES
("Bruno Costa", "bruno.costa@example.com", "$2b$12$lnsrVccLWUfA0v6Njuw1U.Ra7O1ZLxrFx3ZdLaTtcRsD4Jw94TIi."); -- senha: password456
INSERT INTO `usuario` (`name`, `email`, `password`) VALUES
("Carla Oliveira", "carla.oliveira@example.com", "$2b$12$RMM3tSkuoohiZ6IsTqEjYOjuSj5S5kPrdj4F00nXNycmrsRHkpxqO"); -- senha: password789

-- Inserções de Tags
INSERT INTO `tag` (`nm_tag`) VALUES
("Trabalho"), ("Pessoal"), ("Ideias"), ("Urgente"), ("Compras"), ("Saúde"), ("Finanças"), ("Viagem"), ("Receitas"), ("Livros");

-- Inserções de Notas (8-12 por usuário)
-- Notas da Ana Silva
INSERT INTO `notas` (`id_user`, `title`, `body`, `dt_nota`) VALUES
(1, "Reunião Q3", "Discutimos a estratégia do terceiro trimestre e a alocação de orçamento.", "2025-07-15"),
(1, "Projeto Alfa", "Fase 1 concluída, iniciando a fase 2 na próxima semana.", "2025-07-16"),
(1, "Blog Post", "Brainstorming de tópicos: IA no dia a dia, futuro do trabalho, colaboração remota.", "2025-07-17"),
(1, "Lista de Compras", "Leite, ovos, pão, café, frutas.", "2025-07-18"),
(1, "Plano de Treino", "Segunda: Peito e Tríceps, Terça: Costas e Bíceps, Quarta: Pernas.", "2025-07-19"),
(1, "Livro para Ler", "O Guia do Mochileiro das Galáxias.", "2025-07-20"),
(1, "Revisão Financeira", "Verifiquei despesas mensais e poupanças.", "2025-07-21"),
(1, "Planos de Viagem", "Pesquisando destinos para as férias de verão.", "2025-07-22"),
(1, "Receita Carbonara", "Ingredientes: espaguete, ovos, pancetta, pecorino romano.", "2025-07-23"),
(1, "Relatório Urgente", "Finalizar e enviar o relatório trimestral até o final do dia.", "2025-07-24"),
(1, "Aprender Espanhol", "Praticar diariamente por 30 minutos.", "2025-07-25"),
(1, "Cliente X", "Enviar proposta atualizada até sexta-feira.", "2025-07-26");

-- Notas do Bruno Costa
INSERT INTO `notas` (`id_user`, `title`, `body`, `dt_nota`) VALUES
(2, "Reunião Diária", "Discutimos impedimentos e progresso nas tarefas atuais.", "2025-07-15"),
(2, "Marketing", "Novas estratégias para engajamento em mídias sociais.", "2025-07-16"),
(2, "Orçamento Pessoal", "Revisei receitas e despesas do mês.", "2025-07-17"),
(2, "Fim de Semana", "Trilha com amigos.", "2025-07-18"),
(2, "Check-up Saúde", "Agendei exame físico anual.", "2025-07-19"),
(2, "Novo Software", "Explorando alternativas para ferramentas de gerenciamento de projetos.", "2025-07-20"),
(2, "Melhorias em Casa", "Pintar sala, consertar torneira vazando.", "2025-07-21"),
(2, "Curso Online", "Concluí o módulo 3 de programação Python.", "2025-07-22"),
(2, "Presente Aniversário", "Procurando algo único para o João.", "2025-07-23"),
(2, "Manutenção Carro", "Preciso trocar o óleo e fazer rodízio dos pneus.", "2025-07-24"),
(2, "Jardinagem", "Plantei novas ervas e vegetais.", "2025-07-25"),
(2, "Filmes para Noite", "Decidindo entre ação e comédia.", "2025-07-26");

-- Notas da Carla Oliveira
INSERT INTO `notas` (`id_user`, `title`, `body`, `dt_nota`) VALUES
(3, "Pauta Reunião", "Revisando marcos do projeto e atribuindo novas tarefas.", "2025-07-15"),
(3, "Artigo Científico", "Estruturando argumentos para a próxima publicação.", "2025-07-16"),
(3, "Portfólio Investimentos", "Analisando desempenho de ações e fazendo ajustes.", "2025-07-17"),
(3, "Aprendizado Idiomas", "Praticando vocabulário e gramática em francês.", "2025-07-18"),
(3, "Fitness Tracking", "Registrei passos diários e ingestão de calorias.", "2025-07-19"),
(3, "Planejamento Eventos", "Organizando o piquenique da empresa.", "2025-07-20"),
(3, "Escrita Criativa", "Ideias para contos e poemas.", "2025-07-21"),
(3, "Projeto DIY", "Reuni materiais e ferramentas.", "2025-07-22"),
(3, "Viagem Japão", "Planejando visitas a Tóquio, Kyoto, e Osaka.", "2025-07-23"),
(3, "Experimento Culinário", "Experimentando uma nova receita de pão de fermentação natural.", "2025-07-24"),
(3, "Fotografia", "Praticando composição e iluminação.", "2025-07-25"),
(3, "Trabalho Voluntário", "Inscrevi-me no abrigo de animais local.", "2025-07-26");

-- Inserções de notas_tags (Máximo 3 tags por nota)
-- Tags das Notas da Ana Silva
INSERT INTO `notas_tags` (`id_nota`, `id_tag`) VALUES
(1, 1), (1, 3),
(2, 1),
(3, 3),
(4, 5),
(5, 6),
(6, 10),
(7, 7),
(8, 8),
(9, 9),
(10, 4), (10, 1),
(11, 2),
(12, 1);

-- Tags das Notas do Bruno Costa
INSERT INTO `notas_tags` (`id_nota`, `id_tag`) VALUES
(13, 1),
(14, 1), (14, 3),
(15, 7),
(16, 2), (16, 8),
(17, 6),
(18, 1),
(19, 2),
(20, 1),
(21, 2),
(22, 1),
(23, 2),
(24, 2);

-- Tags das Notas da Carla Oliveira
INSERT INTO `notas_tags` (`id_nota`, `id_tag`) VALUES
(25, 1),
(26, 1), (26, 3),
(27, 7),
(28, 2),
(29, 6),
(30, 1),
(31, 3),
(32, 2),
(33, 8),
(34, 9),
(35, 2),
(36, 2);


