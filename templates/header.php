<?php
    $mainMenu = [
        '/' => 'Accueil',
        "/about/" => 'A propos',
        "/category/list/" => 'Catégories',
        '/poll/list' => 'Listes des sondages',
        '/poll/create' => 'Créer un sondage',
    ];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/override-bootstrap.css">
    <title>Votit</title>
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img src="/assets/images/logo-votit.png" alt="Logo VotIt" width="170">
            </a>
        </div>

        <ul class="nav nav-pills">
            <?php foreach ($mainMenu as $page => $titre) { ?>
                <li class="nav-item">
                    <a href="<?= $page; ?>" class="nav-link<?php if ($_SERVER['REQUEST_URI'] === $page) { echo ' active'; } ?>"><?= $titre; ?></a>
                </li>
            <?php } ?>  
        </ul>

        <div class="col-md-3 text-end">
            <?php if (!empty($_SESSION['user'])) { ?>
                <span class="me-2">Bienvenue, <?= htmlspecialchars($_SESSION['user']->getNickname() ?? $_SESSION['user']->getEmail()) ?></span>
                <a href="/logout" class="btn btn-primary">Déconnexion</a>
            <?php } else { ?>
                <a href="/login" class="btn btn-outline-primary me-2">Connexion</a>
                <a href="/register" class="btn btn-primary">Inscription</a>
            <?php } ?>
        </div>
    </header>
