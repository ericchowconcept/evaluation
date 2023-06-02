<?php include(VIEWS . '_partials/header.php'); ?>
<h1 class="text-primary text-center my-5">Hello</h1> 
<!-- recuperer id avec GET -->
<?php foreach($topics as $topic): ?>

<h1 class="text-primary text-center my-5"><?= $topic['title']; ?></h1>    
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