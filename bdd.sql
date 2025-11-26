-- Creation de la BDD game
CREATE DATABASE IF NOT EXISTS game CHARSET = utf8mb4;

-- Utilisation de la BDD game
USE game;

-- Creation de la table console
CREATE TABLE IF NOT EXISTS console (
  id_console INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  manufacturer VARCHAR(50) NOT NULL
  )ENGINE=innoDB;
  
-- Creation de la table video_game + Clé etrangere
  CREATE TABLE IF NOT EXISTS video_game (
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(50) NOT NULL,
  type VARCHAR(50) NOT NULL,
  publish_at DATE,
  CONSTRAINT console
    FOREIGN KEY (id_console)
    REFERENCES console(id_console)
  )ENGINE=innoDB;
  
  --Insertion de valeur dans la table console
  INSERT INTO console (name, manufacturer)
VALUES 
    ('PlayStation 5', 'Sony'),
    ('Switch', 'Nintendo'),
    ('Xbox Series X', 'Microsoft'),
    ('Steam Deck', 'Valve');