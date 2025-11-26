<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Model\Console;
use App\Model\Game;

class ConsoleRepository
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
     * Méthode qui retourne la liste des consoles (Console)
     * @return array<Console> Retourne le tableau des consoles (Console)
     * @throws \Exception Erreurs SQL
     */
    public function findAllConsoles(): array
    {
        //Ecrire la requete
        $sql = 'SELECT id_console, `name`, manufacturer FROM console';
        //Prepararion de la requete
        $req = $this->connect->prepare($sql);
        // Executer la requete
        $req->execute();
        //Fetch de tous les enregistrements
        $console = $req->fetchAll(\PDO::FETCH_ASSOC);

        return [$console];
    }
}
