<?php include(VIEWS . '_partials/header.php'); ?>

<div class="container mt-5 bg-dark p-4 rounded">
    <form method="post">
        <h1 class="text-center text-primary mt-4">CONNEXION</h1>
        <div class="form-group">
            <label for="email" class="form-label mt-4">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Entrer votre email" value="<?= $_POST['email'] ?? ''; ?>">
            <small class="text-danger"><?= $error['email']?? ""; ?></small>
        </div>
        <div class="form-group">
            <label for="password" class="form-label mt-4">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Entrer votre mot de passe">
            <small class="text-danger"><?= $error['password']?? ""; ?></small>
        </div>
        <button type="submit" class="btn btn-outline-secondary my-4">Se connecter</button>
        <a href="<?= BASE . 'inscription'; ?>"class="text-center">Pas encore inscrit? Inscrivez vous</a>
    </form>
</div>


<?php include(VIEWS . '_partials/footer.php'); ?>