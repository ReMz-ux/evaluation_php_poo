<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ?></title>

<body>
    <?php include 'component/navbar.php' ?>
    <main class="container">
        <h1>Ajouter un nouveau jeu</h1>

        <!-- Formulaire -->
        <form action="" method="post">
            <!-- Attributs de la classe Game -->
            <label for="titre">Titre du jeu :</label>
            <input type="text" name="title" required>
            <br><br>

            <label for="genre">Type :</label>
            <input type="text" name="type" required>
            <br><br>

            <label for="date_sortie">Date de sortie :</label>
            <input type="date" name="publish_at" required>
            <br><br>

            <!-- Liste déroulante des consoles -->
            <label for="console">Console :</label>
            <select id="console" name="console" required>
                <option value="PlayStation 5">PlayStation 5 (Sony)</option>
                <option value="Switch">Switch (Nintendo)</option>
                <option value="Xbox Series X">Xbox Series X (Microsoft)</option>
                <option value="Steam Deck">Steam Deck (Valve)</option>
            </select>
            <br><br>

            <!-- Bouton de soumission -->
            <input type="submit" value="Ajouter le jeu">
        </form>
</body>

</html>