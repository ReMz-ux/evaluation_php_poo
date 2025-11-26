<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ?></title>
</head>

<body>
    <?php include 'component/navbar.php' ?>
    <h1>Liste des jeux enregistrés</h1>

    <?php if (!empty($data['games'])): ?>
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Type</th>
                    <th>Date de publication</th>
                    <th>Console</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['games'] as $game): ?>
                    <tr>
                        <td><?= htmlspecialchars($game['title']) ?></td>
                        <td><?= htmlspecialchars($game['type']) ?></td>
                        <td><?= htmlspecialchars($game['publish_at']) ?></td>
                        <td><?= htmlspecialchars($game['console']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun jeu enregistré pour le moment.</p>
    <?php endif; ?>
    </main>


</body>