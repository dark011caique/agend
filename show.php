<?php
    include_once("templates/header.php")
?>
    <div class="container" id="view-contacts-container">
        <?php include_once("templates/backbtn.html"); ?>
        <h1 id="main-title"><?= $contact["name"] ?></h1>
        <p class="bold">Telefone:</p>
        <p><?= $contact["phone"] ?></p>
        <p class="bold">E-mail:</p>
        <p><?= $contact["email"] ?></p>
        <p class="bold">Observaçãoes:</p>
        <p><?= $contact["observations"] ?></p>
    </div>
<?php
    include_once("templates/footer.php")
?>