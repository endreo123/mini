<?php
$url = $_SERVER['REQUEST_URI'];
?>

<form action="/contact/<?= $url == '/contact/create' ? 'createContact': 'saveContact' ?>" method="POST">
    <?php if(isset($contact)){ ?>
        <input type="number" name="id" value="<?= $contact->id ?>" hidden>
    <?php }?>
    <div>
        <label for="name">Nome do contato:</label>
        <input type="text" name="name" id="name" placeholder="Digite o nome do contato" required min="3" max="30" value="<?= isset($contact) ? $contact->name : '' ?>">
    </div>
    <div>
        <label for="name">Numero:</label>
        <input type="tel" name="cellphone" id="cellphone" placeholder="Digite o numero de telefone" min="10" value="<?= isset($contact) ? $contact->cellphone : '' ?>">
    </div>
    <button><?= $url == '/contact/create' ? 'Criar': 'Salvar' ?></button>
</form>
<script src="/js/criarContatos.js"></script>
