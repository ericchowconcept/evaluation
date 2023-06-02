<?php include(VIEWS . '_partials/header.php'); ?>




<div class="container mt-5 bg-dark p-4 rounded">
    <form method="post" enctype="multipart/form-data">
        <h1 class="text-center text-primary mt-4">INSCRIPTION</h1>
        <div class="form-group">
            <label for="email" class="form-label mt-4">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Entrer votre email" value="<?= $_POST['email'] ?? ''; ?>">
            <small class="text-danger"><?= $error['email']?? ""; ?></small>
        </div>
        <div class="form-group">
            <label for="password" class="form-label mt-4">mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Entrer votre mot de passe">
            <small class="text-danger"><?= $error['password']?? ""; ?></small>
        </div>
        <div class="form-group">
            <label for="checkPwd" class="form-label mt-4">Confirmez votre mot de passe</label>
            <input type="password" class="form-control" name="checkPwd"password id="checkPwd" placeholder="Entrer votre mot de passe à nouveau">
            <small class="text-danger"><?= $error['checkPwd']?? ""; ?></small>
        </div>
            <div class="form-group">
            <label for="photo" class="form-label mt-4">Photo</label>
            <input class="form-control" type="file" name="photo" id="photo">
            <small class="text-danger"><?= $error['photo']?? ""; ?></small>
        </div>
        <div class="form-group">
            <label for="nickname" class="form-label mt-4">Nickname</label>
            <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Entrer votre nickname" value="<?= $_POST['nickname'] ?? ''; ?>">
            <small class="text-danger"><?= $error['nickname']?? ""; ?></small>
        </div>
        

        <button type="submit" class="btn btn-outline-secondary my-3">Valider</button>
    </fieldset>
    </form>
</div>

<?php include(VIEWS . '_partials/footer.php'); ?>