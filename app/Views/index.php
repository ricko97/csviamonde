<?= $this->extend('template') ?>

<?= $this->section('title') ?>
    Home
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h2 class="title">Blogue</h2>
    <a href="/ajouter">Ajouter une entrée</a>
    <?php foreach($posts as $p){ ?>
    <div class="article">
        <h1 class="article-header"><?= $p['titre'] ?></h1>
        <small>Date crée: <?= date("Y-m-d H:i:s", $p['creation']);?></small>
        <hr>
        <p><?= $p['contenu'] ?></p>
        <small>
            <a href="/modifier/<?= $p['id']?>">Modifier</a> | <a onClick="if(!confirm('Voulez-vous supprimer ce poste?')){return false;}" href="/supprimer/<?= $p['id']?>">Supprimer</a>
        </small>
    </div>
    <?php } ?>
<?= $this->endSection() ?>
