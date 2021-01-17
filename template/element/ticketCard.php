<div class="card mb-3 shadow-sm">
    <div class="card-header">
        <span><?= $firstname . ' ' . $lastname ?></span>
    </div>
    <div class="card-body">
        <?= nl2br($message) ?>
    </div>
    <div class="card-footer text-end">
        <span class="text-muted"><?= date('d.m.Y H:i', $created) ?></span>
    </div>
</div>