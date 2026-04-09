<?php require __DIR__ . '/../header.php'; ?>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
        <img src="/assets/images/logo-votit.png" class="d-block mx-lg-auto img-fluid" alt="Logo VotIt" width="400" height="500" loading="lazy">
    </div>
    <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Votez sur des sujets de l'actualité IT</h1>
        <p class="lead">VotIt : Là où la communauté tech s'exprime. De la préférence entre frameworks front-end aux débats sur les meilleures pratiques DevOps, nous vous offrons une plateforme pour créer, participer et analyser des sondages spécifiquement centrés sur le monde du développement, de l'IT et du DevOps. Rejoignez-nous, partagez vos opinions et restez à jour avec les tendances de notre industrie !</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a href="/poll/list" class="btn btn-primary btn-lg px-4 me-md-2">Voir tous les sondages</a>
        </div>
    </div>
</div>

<div class="row text-center">
    <h2>Les derniers sondages :</h2>
    <div class="row">
        <?php foreach ($polls as $poll) : 
        include __DIR__ . '/../poll/poll_part.php'; 
        endforeach; ?>
    </div>
</div>

<?php require __DIR__ . '/../footer.php'; ?>