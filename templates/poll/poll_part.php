<div class="col-md-4 my-2 d-flex">
    <div class="card w-100">
        <div class="card-header">
            <img width="40" src="/assets/images/icon-arrow.png" alt="icone flèche haut"> 
            <?= $poll->getCategory()?->getName() ?>
        </div>
        <div class="card-body d-flex flex-column">
            <h3 class="card-title">
                <?= $poll->getTitle() ?>
            </h3>
            <div class="mt-auto">
                <a href="/poll/?id=<?= $poll->getId() ?>" class="btn btn-primary">Voir le sondage</a>
            </div>
        </div>
    </div>
</div>
