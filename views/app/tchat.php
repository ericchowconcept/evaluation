<?php include(VIEWS . '_partials/header.php'); ?>
<h1 class="text-primary text-center my-5">Hello</h1> 
<!-- recuperer id avec GET -->
<div class="container">
    <form method="post">
        <div class="form-group">
            <label for="content" class="form-label mt-4">Entrer vos idées de génie</label>
            <input type="text" class="form-control" id="content" name="content" placeholder="Entrer votre commentaire">
            <small class="text-danger">
                <?= $error['content']?? ""; ?>
            </small>
        </div>
        <button type="submit" class="btn btn-outline-secondary my-4">Ajouter</button>
    </form>
</div>

<h1 class="text-primary text-center my-5"><?= $topic['id_topic']; ?></h1>    
<?php foreach($topics as $topic): ?>

<div class="container">    
    
    <div class="container bg-primary text-center text-white p-2 my-2">
        <img src="<?=UPLOAD .  $topic['picture_profile']; ?>" alt="" class="rounded-circle" width="100px" height="100px">
        <p>par : <?= $topic['nickname']; ?></p>
        <p class="mb-3"><?= $topic['created_at']; ?></p>
        <a href="" class="btn btn-info">Voir la discussion</a>
    </div>
</div>
    <?php endforeach; ?>


<?php include(VIEWS . '_partials/footer.php'); ?>

