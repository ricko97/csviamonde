<?= $this->extend('template') ?>

<?= $this->section('title') ?>
    Modifier
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h2 class="title">Modifier une entrée</h2>
    <hr>
    <div class="row">
       <div class="col-md-4">
           <form action="<?= site_url('/modifierPost/'.$post["id"]) ?>" method="POST">
              <?= csrf_field() ?>
              <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="titre" value="<?=$post['titre']?>">
              </div>
              <div class="form-group">
                <label for="contenu">Contenu</label>
                <textarea class="form-control" id="contenu" name="contenu" rows="3"><?=$post['contenu']?></textarea>
              </div>
              <button type="submit" class="btn btn-light mb-3">Modifier</button>
            </form>
            <a href="/accueil">Retourner</a>
       </div> 
    </div>
<?= $this->endSection() ?>
