<?php require __DIR__ . '/../header.php'; ?>
<img width="40" src="/assets/images/icon-arrow.png" alt="icone flèche haut"> 
<h1><?= $category->getName() ?></h1>
    <div class="row text-center">
    <h2>Liste des Sondages par Categorie</h2>
        <div class="row">
            <?php foreach ($polls as $poll) :
            include __DIR__ . '/../poll/poll_part.php'; 
            endforeach; ?>
        </div>
    </div>

<?php require __DIR__ . '/../footer.php'; ?>
