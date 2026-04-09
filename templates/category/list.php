<?php require __DIR__ . '/../header.php'; ?>
<div class="row text-center">
    <h2>Liste des catégories</h2>
    <div class="row">
        <?php foreach ($categories as $category) :
        include __DIR__ . '/../category/category_part.php'; 
        endforeach; ?>
    </div>
<?php require __DIR__ . '/../footer.php'; ?>