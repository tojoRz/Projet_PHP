<?php
    include'dashboard.php';

?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <table class="table " >
    <h3>Commande en confirmer</h3>
    <tbody>
        <tr class="table-active ">
        <th>Id_commande</th>
        <th>Id_panier</th>
        <th>Id</th>
        <th>Titre</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Date commande</th>
        <th>Date confirmation</th>
        </tr>
        <?php
        $Produits=afficherCommande();
        ?>
        <?php foreach($Produits as $produit): ?>
        <tr>
            <td ><?= $produit->id_commande ?></td>
            <td ><?= $produit->id_panier ?></td>
            <td ><?= $produit->id ?></td>
            <td ><?= $produit->titre ?>Ar</td>
            <td ><?= $produit->prix ?></td>
            <td ><?= $produit->qte ?></td>
            <td ><?= $produit->dateComande ?></td>
            <td ><?= $produit->dateConfimer ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>