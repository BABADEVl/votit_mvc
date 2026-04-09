<?php require __DIR__ . '/../header.php'; ?>

<h2>Résultats pour : "<?= htmlspecialchars($q) ?>"</h2>
<div class="row">
    <?php if (empty($polls)) { ?>
        <p>Aucun sondage trouvé.</p>
    <?php } else { ?>
        <?php foreach ($polls as $poll) { ?>
            <?php include __DIR__ . '/poll_part.php'; ?>
        <?php } ?>
    <?php } ?>
</div>

<?php require __DIR__ . '/../footer.php'; ?>
