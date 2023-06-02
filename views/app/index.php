<?php include(VIEWS . '_partials/header.php'); ?>


<?php 
// echo'<br>';
//     var_dump($_POST);
// echo'</br>';


?>
<?php if(isset($_SESSION['user'])): ?>
<div class="container">
    <div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header text-center" id="headingOne">
            <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Entrer un topic
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <form method="post" action="<?= BASE . 'topic'; ?>">
                <div class="form-group">
                    <label for="topic" class="form-label mt-4">Quel est votre sujet?</label>
                    <input type="text" class="form-control" id="topic" name="topic" placeholder="Entrer votre topic">
                    <small class="text-danger">
                        <?= $error['topic']?? ""; ?>
                    </small>
                </div>
                <button type="submit" class="btn btn-outline-secondary my-4">Ajouter</button>
            </form
        </div>
        </div>
    </div>
</div>
    


           
        <?php else:; ?>
        <h1 class="text-center text-primary mt-4">Connectez vous pour créer un nouveau topic</h1>
            
        <?php endif; ?>
    
        <div class="container">    
            <?php foreach($topics as $topic): ?>
            <div class="container bg-primary text-center text-white p-2 my-2">
                <img src="<?=UPLOAD .  $topic['picture_profile']; ?>" alt="" class="rounded-circle" width="100px" height="100px">
                <h2><?= $topic['title']; ?></h2>
                <p>par : <?= $topic['nickname']; ?></p>
                <p class="mb-3"><?= $topic['created_at']; ?></p>
                
                <a href="<?= BASE . 'topic/tchat?id=' . $topic['id_topic']; ?>" class="btn btn-info">Voir la discussion</a>
            </div>
            <?php if(isset($_SESSION['user']) && $topic['id_user'] == $_SESSION['user']['id_user']): ?>
            <a href="<?= BASE . 'topic/delete?id=' . $topic['id_topic']; ?>" class="btn btn-outline-warning">Supprimer</a>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
        
  




<?php include(VIEWS . '_partials/footer.php'); ?>
