<?php
    include'dashboard.php';

?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <table class="table " >
    <h3>Liste film</h3>
    <tbody>
        <tr class="table-active ">
        <th>Id</th>
        <th>Titre</th>
        <th>Image</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Editer</th>
        </tr>
        <?php
        $Produits=afficher();
        ?>
        <?php foreach($Produits as $produit): ?>
        <tr>
            <td ><?= $produit->id ?></td>
            <td ><?= $produit->titre ?></td>
            <td ><img src="../uploads/<?= $produit->image ?>" width="50vh"></td>
            <td ><?= substr($produit->description, 0, 100) ?>...</td>
            <td style="font-weight: bold; color: green;"><?= $produit->prix ?>Ar</td>
            <td>
                <a href="editer.php?pdt=<?= $produit->id?>" style="text-decoration: none; font-size: 1rem; font-weight: bold;"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>Modifier</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>
