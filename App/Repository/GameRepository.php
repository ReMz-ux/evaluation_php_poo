<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Model\Console;
use App\Model\Game;

class GameRepository
{
    //Attribut
    private \PDO $connect;


    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->connect = (new Mysql)->connectBDD();
    }

    //Méthodes

    /**
     * Méthode qui ajoute une jeu (Game) en BDD
     * @return void
     * @throws \Exception Erreurs SQL
     */
    public function saveGame(Game $game): void
    {
        //Ecrire la requete
        $sql = 'INSERT INTO video_game (id, title, type, publish_at, id_console) 
            VALUES (?,?,?,?,?)';
        //Preparer la requete
        $req = $this->connect->prepare($sql);
        //Assigner les parametres
        $req->bindValue(1, $game->getId(), \PDO::PARAM_INT);
        $req->bindValue(2, $game->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(3, $game->getType(), \PDO::PARAM_STR);
        $req->bindValue(4, $game->getPublishAt()->format('Y-m-d'), \PDO::PARAM_STR);
        $req->bindValue(5, $game->getConsole()->getId(), \PDO::PARAM_INT);
        // Execute la requete
        $req->execute();
    }

    /**
     * Méthode qui retourne la liste des jeux (Game)
     * @return array<Game> Retourne le tableau des jeux (Game)
     * @throws \Exception Erreurs SQL
     */
    public function findAllGames(): array
    {
        //Ecrire la requete sql avec la jointure de table
        $sql = 'SELECT vg.title, vg.type, vg.publish_at, c.name AS console_name FROM video_game vg INNER JOIN console c ON vg.id = c.id_console';
        //Preparation de la requete
        $req = $this->connect->prepare($sql);
        //Executer la requete
        $req->execute();
        //Fetch + return
        $game = $req->fetchAll(\PDO::FETCH_ASSOC);
        return $game;
    }
}
