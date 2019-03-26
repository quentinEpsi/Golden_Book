<?php
require_once 'class/Message.php';
$errors = null;
$sucess = null;
if(isset($_POST['username'], $_POST['message'])){
    $message = new Message($_POST['username'],$_POST['message']);
    if($message->isValid()){

    } else {
        $errors = $message->getErrors();
    }
}
$title = "Livre d'or";
require 'elements/header.php';
?>

<div class="container">
    <h1>Livre d'or</h1>

    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            Formulaire invalide
        </div>
    <?php endif ?>
    <form action="" method="post">
        <div class="form-group">
            <input value="<?= htmlentities($_POST['username']) ?? '' ?>" type="text" name="username" placeholder="Votre pseudo" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>">
            <?php if(isset($errors['username'])) : ?>
                <div class="invalid-feedback">
                    <?= $errors['username'] ?>
                </div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <textarea name="message" placeholder="Votre message" class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>"><?= htmlentities($_POST['username']) ?? '' ?></textarea>
            <?php if(isset($errors['message'])) : ?>
                <div class="invalid-feedback">
                    <?= $errors['message'] ?>
                </div>
            <?php endif ?>
        </div>
        <button class="btn btn-primary">Envoyer</button>
    </form>
</div>
<?php require 'elements/footer.php';
?>
