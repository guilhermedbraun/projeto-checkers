CREATE DATABASE checkers;

USE checkers;

CREATE TABLE `pontuacao` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `dama` int(4) UNSIGNED NULL,
  `resposta` int(4) UNSIGNED NULL,
  PRIMARY KEY (id)
);

INSERT INTO `pontuacao` (`id`, `nome`, `senha`, `dama`, `resposta`) VALUES
(1, 'teste', '1234', '0', '0');
