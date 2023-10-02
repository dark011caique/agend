<?php
    include_once("templates/header.php")
?>

    <div class="container">
        <?php include_once("templates/backbtn.html"); ?>
        <h1 id="main-title">Criar contato</h1>

        <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
            <input type="hidden" name="type" value="create">
            <div class="form-group">
                <label for="name">Nome completo: </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome" required reque>
            </div>

            <div class="form-group">
                <label for="email">E-mail: </label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" >
            </div>

            <div class="form-group">
                <label for="phone">Telefone: </label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite seu phone" required reque>
            </div>

            <div class="form-group">
                <label for="observations">Obeservaçãoes: </label>
                <textarea type="text" class="form-control" id="observations" name="observations" placeholder="insira as obs" rows="3"></textarea>
            </div>

            <div class="btn-c">
                <button type="submit" class="btm btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>

<?php
    include_once("templates/footer.php")
?>