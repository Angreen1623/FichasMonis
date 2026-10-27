-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/10/2026 às 02:43
-- Versão do servidor: 10.11.16-MariaDB
-- Versão do PHP: 8.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_fichas_monis`
--

create database `bd_fichas_monis`;
use `bd_fichas_monis`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `attraca`
--

CREATE TABLE `attraca` (
  `id_att_raca` int(10) UNSIGNED NOT NULL,
  `id_raca` int(10) UNSIGNED NOT NULL,
  `atributo` varchar(20) NOT NULL
) ;

--
-- Despejando dados para a tabela `attraca`
--

INSERT INTO `attraca` (`id_att_raca`, `id_raca`, `atributo`) VALUES
(1, 1, 'agilidade'),
(2, 1, 'presenca'),
(3, 2, 'agilidade'),
(4, 2, 'percepcao'),
(5, 3, 'potencia'),
(6, 3, 'sagacidade'),
(7, 4, 'potencia'),
(8, 4, 'presenca'),
(9, 5, 'agilidade'),
(10, 5, 'espirito'),
(11, 6, 'agilidade'),
(12, 6, 'espirito'),
(13, 7, 'agilidade'),
(14, 7, 'espirito'),
(15, 8, 'agilidade'),
(16, 8, 'espirito'),
(17, 9, 'percepcao'),
(18, 9, 'sagacidade'),
(19, 10, 'potencia'),
(20, 10, 'agilidade'),
(21, 11, 'escolha'),
(22, 11, 'escolha'),
(23, 12, 'agilidade'),
(24, 12, 'espirito'),
(25, 13, 'presenca'),
(26, 13, 'espirito'),
(27, 14, 'presenca'),
(28, 14, 'potencia'),
(29, 15, 'potencia'),
(30, 15, 'sagacidade'),
(31, 16, 'agilidade'),
(32, 16, 'presenca'),
(33, 17, 'espirito'),
(34, 17, 'potencia'),
(35, 18, 'espirito'),
(36, 18, 'presenca'),
(37, 19, 'potencia'),
(38, 19, 'sagacidade'),
(39, 20, 'percepcao'),
(40, 20, 'presenca'),
(41, 21, 'agilidade'),
(42, 21, 'percepcao'),
(43, 22, 'agilidade'),
(44, 22, 'percepcao'),
(45, 23, 'potencia'),
(46, 23, 'espirito'),
(47, 24, 'espirito'),
(48, 24, 'percepcao'),
(49, 25, 'espirito'),
(50, 25, 'potencia'),
(51, 26, 'sagacidade'),
(52, 26, 'potencia'),
(53, 27, 'sagacidade'),
(54, 27, 'agilidade'),
(55, 28, 'espirito'),
(56, 28, 'potencia'),
(57, 29, 'presenca'),
(58, 29, 'sagacidade'),
(59, 30, 'presenca'),
(60, 30, 'sagacidade'),
(61, 31, 'presenca'),
(62, 31, 'sagacidade');

-- --------------------------------------------------------

--
-- Estrutura para tabela `caracteristica`
--

CREATE TABLE `caracteristica` (
  `id_car` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `nome` varchar(100) NOT NULL
) ;

--
-- Despejando dados para a tabela `caracteristica`
--

INSERT INTO `caracteristica` (`id_car`, `tipo`, `nome`) VALUES
(1, 'comum', 'Alada'),
(2, 'comum', 'Anfíbia'),
(3, 'comum', 'Camuflada'),
(4, 'comum', 'Conjuradora'),
(5, 'comum', 'Corpulenta'),
(6, 'comum', 'Inteligência Aprimorada'),
(7, 'comum', 'Metamorfa'),
(8, 'comum', 'Principiante'),
(9, 'comum', 'Resistente'),
(10, 'comum', 'Sentido Aguçado'),
(11, 'comum', 'Térmica'),
(12, 'comum', 'Transmutada'),
(13, 'comum', 'Visão Adaptada'),
(14, 'traco_unico', 'Ante'),
(15, 'traco_unico', 'Vida Rupestre'),
(16, 'traco_unico', 'Voltar as Origens'),
(17, 'traco_unico', 'Termófilos'),
(18, 'traco_unico', 'Filho da natureza (Filho das Águas)'),
(19, 'traco_unico', 'Filho da natureza (Filho das Chamas)'),
(20, 'traco_unico', 'Filho da natureza (Filho das Terras)'),
(21, 'traco_unico', 'Filho da natureza (Filho dos Ventos)'),
(22, 'traco_unico', 'Conhecimento Oculto'),
(23, 'traco_unico', 'Filhas da guerra'),
(24, 'traco_unico', 'Persistência'),
(25, 'traco_unico', 'Possessão Forçada'),
(26, 'traco_unico', 'Percepção Emocional'),
(27, 'traco_unico', 'Frenesi'),
(28, 'traco_unico', 'Quatro Invernos'),
(29, 'traco_unico', 'Espelho Gélido'),
(30, 'traco_unico', 'Honrando os Cinco'),
(31, 'traco_unico', 'Iluminados'),
(32, 'traco_unico', 'Foradores de reinos'),
(33, 'traco_unico', 'Fotossíntese'),
(34, 'traco_unico', 'Liquomancia'),
(35, 'traco_unico', 'Teletransporte'),
(36, 'traco_unico', 'Tempo Otimizado'),
(37, 'traco_unico', 'Vivos pela lua'),
(38, 'traco_unico', 'Tomar Energia'),
(39, 'traco_unico', 'Dimorfismo (Lanterna)'),
(40, 'traco_unico', 'Dimorfismo (Veneno na veia)'),
(41, 'traco_unico', 'Filhos de Wyndat'),
(42, 'traco_unico', 'Ascensão (Palácio Mental)'),
(43, 'traco_unico', 'Ascensão (Forja Essêncial)'),
(44, 'traco_unico', 'Ascensão (Conexão Colmeia)'),
(45, 'comum', 'Escolha');

-- --------------------------------------------------------

--
-- Estrutura para tabela `carraca`
--

CREATE TABLE `carraca` (
  `id_car_raca` int(10) UNSIGNED NOT NULL,
  `id_car` int(10) UNSIGNED NOT NULL,
  `id_raca` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `carraca`
--

INSERT INTO `carraca` (`id_car_raca`, `id_car`, `id_raca`) VALUES
(1, 6, 1),
(2, 10, 1),
(3, 13, 1),
(4, 14, 1),
(5, 6, 2),
(6, 10, 2),
(7, 13, 2),
(8, 15, 2),
(9, 6, 3),
(10, 9, 3),
(11, 13, 3),
(12, 16, 3),
(13, 1, 4),
(14, 4, 4),
(15, 11, 4),
(16, 17, 4),
(18, 4, 5),
(17, 7, 5),
(19, 11, 5),
(20, 18, 5),
(22, 4, 6),
(21, 7, 6),
(23, 11, 6),
(24, 19, 6),
(26, 4, 7),
(25, 7, 7),
(27, 11, 7),
(28, 20, 7),
(30, 4, 8),
(29, 7, 8),
(31, 11, 8),
(32, 21, 8),
(33, 6, 9),
(34, 8, 9),
(35, 10, 9),
(36, 22, 9),
(37, 1, 10),
(38, 9, 10),
(39, 13, 10),
(40, 23, 10),
(41, 6, 11),
(42, 8, 11),
(44, 24, 11),
(43, 45, 11),
(45, 4, 12),
(47, 12, 12),
(46, 13, 12),
(48, 25, 12),
(49, 4, 13),
(50, 10, 13),
(51, 13, 13),
(52, 26, 13),
(53, 1, 14),
(54, 3, 14),
(55, 4, 14),
(56, 27, 14),
(57, 6, 15),
(58, 11, 15),
(59, 13, 15),
(60, 28, 15),
(61, 3, 16),
(62, 7, 16),
(63, 11, 16),
(64, 29, 16),
(65, 4, 17),
(67, 5, 17),
(66, 9, 17),
(68, 30, 17),
(69, 4, 18),
(70, 8, 18),
(71, 11, 18),
(72, 31, 18),
(73, 4, 19),
(74, 5, 19),
(75, 11, 19),
(76, 32, 19),
(77, 4, 20),
(78, 9, 20),
(79, 12, 20),
(80, 33, 20),
(81, 2, 21),
(82, 4, 21),
(83, 8, 21),
(84, 34, 21),
(85, 3, 22),
(86, 10, 22),
(87, 13, 22),
(88, 35, 22),
(89, 8, 23),
(90, 9, 23),
(91, 10, 23),
(92, 36, 23),
(93, 8, 24),
(94, 10, 24),
(95, 13, 24),
(96, 37, 24),
(97, 2, 25),
(98, 4, 25),
(99, 8, 25),
(100, 38, 25),
(101, 2, 26),
(102, 9, 26),
(103, 10, 26),
(104, 39, 26),
(105, 2, 27),
(106, 9, 27),
(107, 10, 27),
(108, 40, 27),
(109, 1, 28),
(110, 8, 28),
(111, 13, 28),
(112, 41, 28),
(113, 2, 29),
(114, 9, 29),
(115, 12, 29),
(116, 42, 29),
(117, 8, 30),
(118, 9, 30),
(119, 12, 30),
(120, 43, 30),
(121, 6, 31),
(122, 9, 31),
(123, 12, 31),
(124, 44, 31);

-- --------------------------------------------------------

--
-- Estrutura para tabela `detalhecaracteristica`
--

CREATE TABLE `detalhecaracteristica` (
  `id_det_car` int(10) UNSIGNED NOT NULL,
  `id_hab` int(10) UNSIGNED NOT NULL,
  `id_car` int(10) UNSIGNED NOT NULL,
  `nv` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `detalhecaracteristica`
--

INSERT INTO `detalhecaracteristica` (`id_det_car`, `id_hab`, `id_car`, `nv`) VALUES
(1, 1, 1, 0),
(2, 2, 2, 0),
(3, 3, 3, 0),
(4, 4, 4, 0),
(5, 5, 5, 0),
(6, 6, 6, 0),
(7, 7, 7, 0),
(8, 8, 8, 0),
(9, 9, 9, 0),
(10, 10, 10, 0),
(11, 11, 11, 0),
(12, 12, 12, 0),
(13, 13, 13, 0),
(14, 14, 14, 0),
(15, 15, 15, 0),
(16, 16, 16, 0),
(17, 17, 17, 0),
(18, 18, 18, 0),
(19, 19, 19, 0),
(20, 20, 20, 0),
(21, 21, 21, 0),
(22, 22, 22, 0),
(23, 23, 23, 0),
(24, 24, 24, 0),
(25, 25, 25, 0),
(26, 26, 26, 0),
(27, 27, 27, 0),
(28, 28, 28, 0),
(29, 29, 29, 0),
(30, 30, 30, 0),
(31, 31, 31, 0),
(32, 32, 32, 0),
(33, 33, 33, 0),
(34, 34, 34, 0),
(35, 35, 35, 0),
(36, 36, 36, 0),
(37, 37, 37, 0),
(38, 38, 38, 0),
(39, 39, 39, 0),
(40, 40, 40, 0),
(41, 41, 41, 0),
(42, 42, 42, 0),
(43, 43, 43, 0),
(44, 44, 44, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `habilidade`
--

CREATE TABLE `habilidade` (
  `id_hab` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `habilidade`
--

INSERT INTO `habilidade` (`id_hab`, `nome`, `descricao`, `img`) VALUES
(1, 'Alada', 'A raça possui asas que tornam possivel ela voar.', NULL),
(2, 'Anfíbia', 'A raça possui a capacidade de respirar dentro ou fora d’água.', NULL),
(3, 'Camuflada', 'A raça consegue modificar seu corpo para se camuflar no ambiente.', NULL),
(4, 'Conjuradora', 'A raça tem naturalmente a capacidade de manipular um foco de magia.', NULL),
(5, 'Corpulenta', 'A raça possui um corpo grande seja por altura ou força.', NULL),
(6, 'Inteligência Aprimorada', 'A raça possui uma capacidade intuitiva bem desenvolvida.', NULL),
(7, 'Metamorfa', 'A raça consegue esticar seus membros.', NULL),
(8, 'Principiante', 'A raça possui um grande fluxo de mana em sua biologia.', NULL),
(9, 'Resistente', 'A raça tem uma carcaça protetiva para lidar com ameaças.', NULL),
(10, 'Sentido Aguçado', 'A raça consegue captar cheiros ou sons com maior facilidade.', NULL),
(11, 'Térmica', 'A raça tem maior resistência a temperaturas extremas', NULL),
(12, 'Transmutada', 'A raça consegue modificar a “carcaça” que habitam.', NULL),
(13, 'Visão Adaptada', 'A raça tem uma capacidade visual aprimorada podendo ver no escuro.', NULL),
(14, 'Ante', 'Alquinos apostaram tudo que tinha para alcançarem a maestria. Alquinos podem escalar com sua velocidade sem precisar de teste, além disso, podem uma vez por dia, gastar 2 de mana para recuperar 1d6 de mana como ação livre.', NULL),
(15, 'Vida Rupestre', 'Bunnypers evoluíram para viver em cavernas e montanhas com facilidade, você consegue pular até duas zonas de altura e pode atravessar inimigos pulando sem necessidade de teste. Sempre que fizer um teste envolvendo pular ou escalar você tem +1 dado no teste.', NULL),
(16, 'Voltar as Origens', 'Corvinos tem a inata capacidade de voltar a uma forma menos evoluída, gastando 4 de mana, o Corvino assume sua forma primal por 1d4+1 rodadas, nesta forma, seus ataques corpo a corpo tem mais um dado de dano e sua velocidade dobra, além disso, se receber algum dano que fizesse sua vida chegar em 0, você não cai até acabar a transformação, porém, você sempre vai ensandecido para cima de um alvo, caso este alvo morra escolha um outro alvo que possa ver.', NULL),
(17, 'Termófilos', 'Draconinos tem em si capacidade de lidar e controlar o fogo, conseguindo resistir a temperaturas altas. você é imune a dano de fogo e não tem penalidade por calor. Além disso pode criar uma fonte de fogo gastando 1 de mana e uma ação de movimento (pode ser utilizada para iluminar ou para ser ou foco de manipulação para magias de fogo).', NULL),
(18, 'Filho da natureza (Filho das Águas)', 'Você pode gastar uma ação completa e 2 de mana para conjurar uma poça de água que prende os pés de um inimigo a até 2 zonas de você começando a afunda-lo, o alvo roda um teste de resistência contra seu teste de Misticismo, se falhar ele não pode se mover e em 1d3 rodadas começará a sufocar.', NULL),
(19, 'Filho da natureza (Filho das Chamas)', 'Você pode gastar uma ação padrão e 2 de mana para Incendiar uma área, todos os seres em até 6 zonas são revelados e você sabe as posições. Além disso eles devem fazer um teste de Resistência contra sua magia, se falharem ficam em chamas.', NULL),
(20, 'Filho da natureza (Filho das Terras)', 'Você pode gastar uma ação padrão e 2 de mana para fazer um pilar de terra sobre você, ele conta como uma cobertura porém o bônus em defesa concedido por ele é igual os seus sucessos em misticismo.', NULL),
(21, 'Filho da natureza (Filho dos Ventos)', 'Você pode conjurar uma ventania que empurra seus inimigos, gastando uma ação padrão e 2 de mana você empurra eles um número de zonas igual metade do valor do seu dado de magia.', NULL),
(22, 'Conhecimento Oculto', 'Em cenas de exploração, investigação ou em qualquer teste para descobrir algo você pode gastar 2 de mana para diminuir a dificuldade do teste para 4 (passando tirando 4, 5 ou 6 no dado).', NULL),
(23, 'Filhas da guerra', 'Harpias foram forjadas para a batalha, e sabem se aproveitar das desvantagens inimigas, você pode fazer um teste de Luta ou Proteção como uma ação padrão, a cada 2 sucessos você sabe uma fraqueza do inimigo, se o inimigo não tiver fraquezas você tem +1 de dano em ataques contra ele.', NULL),
(24, 'Persistência', 'Humanos tem a incrível capacidade de esforço além de suas capacidades, indo atrás de superar seus problemas com a garra que nenhuma outra raça tem, uma vez por cena, você pode gastar 3 de mana para re-rolar todos os dados fracassados em um teste.', NULL),
(25, 'Possessão Forçada', 'A morte é só uma casca para a importancia da sua existencia, quando estiver tocando um cadaver você pode gastar 3 de mana para entrar no corpo como um fantasma em uma possessão, você passa a ter essa aparencia mantendo sua voz e cor dos olhos, após 1 mês o corpo rejeita sua existencia te empurrando para fora apodrecendo instantaneamente', NULL),
(26, 'Percepção Emocional', 'Você consegue ler as pessoas como livros abertos, seu terceiro olho é adaptado para captar os sentimentos daqueles ao seu redor, sempre que analisar alguém você consegue ter uma leitura sobre o que ela esta sentindo, além de ter um +1 dado em testes para identificar as intenções de alguém.', NULL),
(27, 'Frenesi', 'Mothis são caçadoras naturais, alguns acreditam que amaldiçoadas a viver caçando, Mothis alimentam-se apenas de carne, caso tenham se alimentado no dia, podem entrar em frenesi gastando 2 de mana, durante o frenesi seus bônus de atributos são dobrados, o frenesi dura 2 rodadas, após isso o personagem ficara faminto.', NULL),
(28, 'Quatro Invernos', 'Os Nevaliths evoluíram para sobreviver nas montanhas gélidas de snowlay, tendo um par de braços a mais para se locomover entre os grandes pináculos, você pode ter até 4 itens segurados e ate dois itens que precisam ser usados com as duas mãos, pode gastar 4 de mana para poder usar um item adicional na rodada até 4 vezes na rodada. itens de duas mãos só são podem ser ativos uma vez e gasta 8 de mana.', NULL),
(29, 'Espelho Gélido', 'Você consegue se transformar em outros seres, gastando 2 de mana você se transforma em alguém durante uma cena, você ganha +1 dado em testes para fingir ser esta pessoa mas não consegue usar nenhuma das características dela.', NULL),
(30, 'Honrando os Cinco', 'Orcs tem em seu sangue essência divina, em uma cena de descanso, podem fazer um louvor gastando 3 de mana para recuperar sua vida adicionalmente igual 5x seu nivel de traço uníco, você pode gastar 1 de mana adicionais por aliado que queira adicionar esse efeito.', NULL),
(31, 'Iluminados', 'Shamies tem marcas em seus corpos que brilham em uma intensiade que podem controlar, naturalmente até 2 zonas ao redor do shamie são iluminadas; alternativamente pode gastar 2 de mana para diminuir essa luz temporariamente, podendo aumentar a intensidade novamente como ação livre, caso faça isso você deve fazer um teste de espirito contra todos os inimigos que estiverem olhando você, quem falhar ficara ofuscado por 2 rodadas.', NULL),
(32, 'Foradores de reinos', 'Snowkins trazem suas terras consigo, mostrando como terra formaram snowlay, você pode gastar 3 de mana para Congelar até 3 zonas que você avançar, se fizer isso você pode adicionar ou remover terreno difícil no local, se adicionar é imune ao terreno causado por essa habilidade.', NULL),
(33, 'Fotossíntese', 'Viriths não precisam se alimentar se tiverem contato com a luz do sol, em cenas de descanso se estiver em contato com a luz do dia conta como se tivesse comido uma porção pequena, caso coma também os bônus se acumulam.', NULL),
(34, 'Liquomancia', 'Vykrens conseguem controlar os liquidos no corpo dele, sendo imunes a feitos causados por liquidos seja alcool, veneno ou qualquer impureza no sangue.', NULL),
(35, 'Teletransporte', 'Tewnys cresceram dentro de cavernas e tiveram que se desenvolver para se locomover nesses locais, uma vez por rodada como ação livre pode gastar 3 de Mana para se teletransportar para um lugar que possa ver em até 3 zonas.', NULL),
(36, 'Tempo Otimizado', 'Taimorks funcionam em um tempo diferente podendo acelerar para otimizar suas ações, uma vez por periodo do dia Taimorks podem gastar 3 de mana para ter uma ação adicional.', NULL),
(37, 'Vivos pela lua', 'Quando estiver lutando sobre a luz da lua ou em uma noite sobre campo aberto, você pode gastar 4 de mana para ter 1 Sucesso automático em todos os testes durante a cena.', NULL),
(38, 'Tomar Energia', 'Você tem uma capacidade de manipular mana em sua essência mais pura, você pode roubar mana de um alvo, gastando uma ação completa você deve rodar um teste de Espírito+Potência a cada sucesso você rouba 1 de mana do alvo.', NULL),
(39, 'Dimorfismo (Lanterna)', 'Se o dimorfismo for mais próximo do feminino, o Uila terá uma lanterna na testa que pode ser acessa a qualquer momento gastando 2 de mana, a lanterna não tem objetivo de iluminar, caso esteja ligada você pode gastar uma ação padrão para tentar fascinar um alvo com um teste contra a vontade do alvo.', NULL),
(40, 'Dimorfismo (Veneno na veia)', 'Se o dimorfismo for mais próximo do masculino, o Uila terá veneno em seu corpo, quando acerta um ataque corpo a corpo pode gastar 1 de mana para rodar um teste de luta contra a Fortitude do alvo, se ele falhar fica envenenado por 2 rodadas', NULL),
(41, 'Filhos de Wyndat', 'Dos primórdios de Monisland, os viajantes são feitos para explorar as grandes terras, dispensando as necessidades de outros mortais. você não pode se alimentar de comida e não sofre penalidades por sono, sempre que estiver voando você recupera 2 de mana a cada Período do dia, além disso em cenas de descanso se estiver voando recebe beneficio de um prato simples como se estivesse se alimentado.', NULL),
(42, 'Ascensão (Palácio Mental)', 'Você sabe entrar em um estado de meditação próprio, se estiver em um ambiente em que possa submergir seu corpo em água, pode gastar 3 de mana para conectar informações, você pode realizar perguntas para o profeta conectando informações e ele deve confirmar se está certo ou errado, cada 2 perguntas levam o tempo de 1 ação de descanso.', NULL),
(43, 'Ascensão (Forja Essêncial)', 'Você sabe modificações de além das estrelas, você recebe uma lista de modificações unicas que você sabe fazer', NULL),
(44, 'Ascensão (Conexão Colmeia)', 'Você pode gastar 3 de mana para conectar sua mente a de um aliado voluntario por 1 dia. caso o alvo seja outro Trodai o custo é 1', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `raca`
--

CREATE TABLE `raca` (
  `id_raca` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cap_carga` int(10) UNSIGNED NOT NULL,
  `descricao` text NOT NULL,
  `velocidade` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `raca`
--

INSERT INTO `raca` (`id_raca`, `nome`, `cap_carga`, `descricao`, `velocidade`) VALUES
(1, 'Alquino', 2, 'Das areias mais quentes de Sewny, na mais fria cidade de Snowlay, os comércios são dominados por Alquinos, a eras liderando o sistema monetário, nada surpreendente para os inventores da moeda. Os Alquinos vivem uma vida de luxo vivendo em reinados, sempre usufruindo do bom e do melhor e se aproveitando de sua vantagem social... Quem iria enfrentar as pessoas que movem o mundo?', 4),
(2, 'Bunnyper', 2, 'Nos subterrâneos, Staryté é supervisionada por Bunnypers, os guias do subterrâneo Bunnypers tem uma vida acostumada a viver nas grandes cavernas de Monisland, sendo a raça que mais se beneficia de minérios e os principais exportadores desse tipo de material, apesar de ter uma certa dificuldade com lidar com a população da superfície, Bunnypers sempre estão dispostos a descobrir as mais adversas novidades. Mineradores, Geólogos, Cientistas e Pesquisadores, Bunnypers usam de seus sentidos aprimorados para detectar os locais seguros e mais acessíveis, sendo curiosos, céticos e até um pouco egocêntricos quando se trata de seus conhecimentos.', 4),
(3, 'Corvino', 2, 'Nas frias terras de Snowlay, os corvinos sobreviveram entre as diversas guerras territoriais da época em que Snowlay era conhecida por suas batalhas sangrentas, se adaptando para um combate árduo, uma arma secreta que Wyndat os permitiu ter, com o avanço da terra para o berço da tecnologia, os Corvinos também mudaram sua forma de pensar, agir e desenvolver, usando de seu presente divino para proteger as terras que tanto lutaram para ter. Pesquisadores, inventores, guardas e mercenários, Corvinos usam de toda sua capacidade intelectual e bestial para ganhar vantagem neste mundo, alternando entre o intelecto e o instinto.', 3),
(4, 'Draconino', 4, 'Entre as terras tropicais de Stahaji, nas terras florais de Pantoelva e nos isolados vulcões em Terlik, os Draconinos rasgam os céus com suas grandes asas, vivendo da sua natural resistência e manipulação do fogo, utilizando-a no dia a dia. Ferreiros, cozinheiros, construtores e até guias para navegadores entre os mares árduos de toda Monisland.', 3),
(5, 'Elemental de Água', 4, 'O cerne da vida, o primor de Kaluha, os elementais de água também conhecidos como Yta’ã, vivem sobre os adversos mares em reclusão, sendo os principais responsáveis pela ajuda em proteger as vidas mais afetadas pelas marés dos mares de Monisland.', 3),
(6, 'Elemental de Fogo', 4, 'O cerne do renascimento, também chamados de Tanita’ã, elementais de fogos tem a benção do universo mesmo antes da ascensão de Ahitatá, Deus do Fogo e do Amor, fazendo florestas e áreas vulcânicas resistirem as consequências de queimadas ajudando a recuperar áreas que teriam sido completamente devastadas.', 3),
(7, 'Elemental de Terra', 4, '', 3),
(8, 'Elemental de Vento', 4, '', 3),
(9, 'Gnomo', 2, '', 2),
(10, 'Harpia', 2, '', 4),
(11, 'Humano', 3, 'Homo sapiens, são a única espécie viva do gênero Homo. Eles são mamíferos primatas conhecidos por andar em dois pés, ter cérebros grandes e usar a razão, a fala e a cultura para transformar o mundo ao seu redor.', 3),
(12, 'Kamariano', 2, '', 3),
(13, 'Medusa', 3, '', 4),
(14, 'Mothis', 3, '', 3),
(15, 'Nevalith', 6, '', 3),
(16, 'Oboreny', 3, '', 3),
(17, 'Orc', 4, '', 2),
(18, 'Shamie', 2, '', 3),
(19, 'Snowkin', 4, '', 3),
(20, 'Virith', 3, '', 3),
(21, 'Vykren', 3, '', 3),
(22, 'Tewny', 4, '', 3),
(23, 'Taimork', 6, '', 2),
(24, 'Tiefling', 3, '', 3),
(25, 'Uhale', 3, '', 3),
(26, 'Uila (Femea)', 3, '', 3),
(27, 'Uila (Macho)', 3, '', 3),
(28, 'Viajantes da noite', 6, '', 4),
(29, 'Voyageurs (Sophani)', 2, '', 2),
(30, 'Voyageurs (Luimeri)', 3, '', 3),
(31, 'Voyageurs (Trodai)', 3, '', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `requisitohabilidade`
--

CREATE TABLE `requisitohabilidade` (
  `id_req` int(10) UNSIGNED NOT NULL,
  `id_hab` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `id_alvo` int(10) UNSIGNED NOT NULL,
  `valor_min` int(10) UNSIGNED DEFAULT NULL,
  `grupo` tinyint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `attraca`
--
ALTER TABLE `attraca`
  ADD PRIMARY KEY (`id_att_raca`),
  ADD KEY `idx_attraca_raca` (`id_raca`);

--
-- Índices de tabela `caracteristica`
--
ALTER TABLE `caracteristica`
  ADD PRIMARY KEY (`id_car`),
  ADD UNIQUE KEY `uq_car_nome` (`nome`);

--
-- Índices de tabela `carraca`
--
ALTER TABLE `carraca`
  ADD PRIMARY KEY (`id_car_raca`),
  ADD UNIQUE KEY `uq_car_raca` (`id_raca`,`id_car`),
  ADD KEY `fk_carraca_car` (`id_car`);

--
-- Índices de tabela `detalhecaracteristica`
--
ALTER TABLE `detalhecaracteristica`
  ADD PRIMARY KEY (`id_det_car`),
  ADD UNIQUE KEY `uq_det_car_hab` (`id_car`,`id_hab`),
  ADD KEY `fk_detcar_hab` (`id_hab`);

--
-- Índices de tabela `habilidade`
--
ALTER TABLE `habilidade`
  ADD PRIMARY KEY (`id_hab`),
  ADD UNIQUE KEY `uq_habilidade_nome` (`nome`);

--
-- Índices de tabela `raca`
--
ALTER TABLE `raca`
  ADD PRIMARY KEY (`id_raca`),
  ADD UNIQUE KEY `uq_raca_nome` (`nome`);

--
-- Índices de tabela `requisitohabilidade`
--
ALTER TABLE `requisitohabilidade`
  ADD PRIMARY KEY (`id_req`),
  ADD UNIQUE KEY `uq_req` (`id_hab`,`grupo`,`tipo`,`id_alvo`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `attraca`
--
ALTER TABLE `attraca`
  MODIFY `id_att_raca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `caracteristica`
--
ALTER TABLE `caracteristica`
  MODIFY `id_car` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `carraca`
--
ALTER TABLE `carraca`
  MODIFY `id_car_raca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de tabela `detalhecaracteristica`
--
ALTER TABLE `detalhecaracteristica`
  MODIFY `id_det_car` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `habilidade`
--
ALTER TABLE `habilidade`
  MODIFY `id_hab` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `raca`
--
ALTER TABLE `raca`
  MODIFY `id_raca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `requisitohabilidade`
--
ALTER TABLE `requisitohabilidade`
  MODIFY `id_req` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `attraca`
--
ALTER TABLE `attraca`
  ADD CONSTRAINT `fk_attraca_raca` FOREIGN KEY (`id_raca`) REFERENCES `raca` (`id_raca`) ON DELETE CASCADE;

--
-- Restrições para tabelas `carraca`
--
ALTER TABLE `carraca`
  ADD CONSTRAINT `fk_carraca_car` FOREIGN KEY (`id_car`) REFERENCES `caracteristica` (`id_car`),
  ADD CONSTRAINT `fk_carraca_raca` FOREIGN KEY (`id_raca`) REFERENCES `raca` (`id_raca`) ON DELETE CASCADE;

--
-- Restrições para tabelas `detalhecaracteristica`
--
ALTER TABLE `detalhecaracteristica`
  ADD CONSTRAINT `fk_detcar_car` FOREIGN KEY (`id_car`) REFERENCES `caracteristica` (`id_car`),
  ADD CONSTRAINT `fk_detcar_hab` FOREIGN KEY (`id_hab`) REFERENCES `habilidade` (`id_hab`);

--
-- Restrições para tabelas `requisitohabilidade`
--
ALTER TABLE `requisitohabilidade`
  ADD CONSTRAINT `fk_req_hab` FOREIGN KEY (`id_hab`) REFERENCES `habilidade` (`id_hab`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
