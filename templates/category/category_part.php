<div class="col-md-4 my-2 d-flex">
    <div class="card w-100">
        <div class="card-header">
            <img width="40" src="/assets/images/icon-arrow.png" alt="icone flèche haut"> 
            <?= $category->getName() ?>
        </div>
        <div class="card-body d-flex flex-column">
            <div class="mt-auto">
                <a href="/category/?id=<?= $category->getId() ?>" class="btn btn-primary">Voir la catégorie</a>
            </div>
        </div>
    </div>
</div>
