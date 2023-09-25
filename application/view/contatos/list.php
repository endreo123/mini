<table>
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($listOfContacts as $obj) { ?>
        <tr>
            <td><?= $obj->name ?></td>
            <td><?= $obj->cellphone ?></td>
            <td>
                <a href="/contact/edit/<?= $obj->id ?>">Editar</a>
                <a href="/contact/deleteContacById/<?= $obj->id ?>">Excluir</a>
            </td>
        </tr>
    <?php } ?>
</table>
