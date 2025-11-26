<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Repository\ConsoleRepository;
use App\Repository\GameRepository;
use App\Model\Console;
use App\Model\Game;
use App\Utils\Tools;


class GameController extends AbstractController
{
    //Attributs
    private ConsoleRepository $consoleRepository;
    private GameRepository $gameRepository;

    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->consoleRepository = new ConsoleRepository();
        $this->gameRepository = new GameRepository();
    }

    //Méthodes

    /**
     * Méthode pour ajouter un Jeu (Game)
     * @return mixed Retourne le template
     */
    public function saveGame(): mixed
    {
        return "template avec la méthode render";
    }

    /**
     * Méthode pour afficher la liste des Jeux (Game)
     * @return mixed Retourne le template
     */
    public function showAllGames(): mixed
    {
        //Creer le tableau (vide) $data
        $data = [];
        // Récupérer tous les jeux
        $games = $this->gameRepository->findAllGames();
        // Ajouter une colonne 'consoles' au tableau associatif $data
        $data['consoles'] = $games;

        // Afficher le template
        $this->render('show_all_games', 'Liste des jeux', $data);



        return "template avec la méthode render";
    }

    public function addGame(): void
    {
        // Créer un tableau $data (vide)
        $data = [];

        // Récupérer la liste des consoles
        $consoleRepository = new ConsoleRepository();
        $console = $consoleRepository->findAllConsoles();

        // Ajouter une colonne 'consoles' au tableau associatif $data
        $data['consoles'] = $console;
        // Retourne le template avec la méthode render
        // Paramètres : chemin du template, nom de l’onglet, tableau $data
        $this->render('add_game', 'Ajouter un jeu', $data);

        //Verifier si le formulaire est soumis
        if (isset($_POST["submit"])) {
            //Test les champs obligatoires sont renseignés
            if (
                !empty($_POST["title"]) &&
                !empty($_POST["type"]) &&
                !empty($_POST["publish_at"]) &&
                !empty($_POST["id_console"])
            ) {
                // Nettoyer les entrée
                $title = Tools::sanitize($_POST["title"]);
                $type = Tools::sanitize($_POST["type"]);
                $publishAt = new \DateTime(Tools::sanitize($_POST["publish_at"]));
                $id = Tools::sanitize($_POST["id_console"]);

                // Creation de l'objet Game  avec le constructeur du Model Game stocké  dans une variable $game
                $game = new Game(
                    $title,
                    $type,
                    $publishAt,
                    $id
                );

                // Setter tous les attributs avec les valeurs nettoyées
                $game->setTitle($title);
                $game->setType($type);
                $game->setPublishAt($publishAt);
                $game->setId($id);

                // Appeler la méthode saveGame du GameRepository
                $gameRepository = new GameRepository();
                $gameRepository->saveGame($game);

                // Message de validation
                $data['valid'] = "Le jeu a bien été ajouté.";
            } else {
                $data['error'] = "Veuillez remplir tous les champs.";
            }
        }
    }
}
