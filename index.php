<?php
    include_once("templates/header.php")
?>

    <div class="container">
        <?php if(isset($printMsg) &&  $printMsg != ''):?>
            <p id="msg"><?= $prontMsg ?></p>
        <?php endif; ?>

        <h1 id="main-title">Minha agenda</h1>
        
        <?php if(count($contacts) > 0): ?>
           <table class="table" id="contavts-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($contacts as $contact): ?>
                        <tr>
                            <td scope="row"><?= $contact["id"] ?></td>
                            <td scope="row"><?= $contact["name"] ?></td>
                            <td scope="row"><?= $contact["email"] ?></td>
                            <td scope="row"><?= $contact["phone"] ?></td>
                            <td class="sctions">
                                <a href=""><i class="fas fa-eye check-icon"></i></a>
                                <a href=""><i class="far fa-edit edit-icon"></i></a>
                                <button type="submit"><i class="fas fa-times delete-icon"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
           </table> 
        <?php else: ?>
            <P id="empyt-list-text">Ainda não há contatos na sua agenda, <a href="<?= $BASE_URL ?>create.php"> click aqui para adicionar </a></P>
        <?php endif; ?>
    </div>

<?php
    include_once("templates/footer.php")
?>
    