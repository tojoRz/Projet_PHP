<?php
    include'dashboard.php';

?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <table class="table " >
    <h3>Commande en attente</h3>
    <tbody>
        <tr class="table-active ">
        <th>Id_panier</th>
        <th>Id_user</th>
        <th>Titre</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Date de commande</th>
        <th></th>
        </tr>
        <?php
        $Produits=afficherPanier();
        ?>
        <?php foreach($Produits as $produit): ?>
        <tr>
            <td ><?= $produit->id_panier ?></td>
            <td ><?= $produit->id ?></td>
            <td ><?= $produit->titre ?></td>
            <td ><?= $produit->prix ?>Ar</td>
            <td ><?= $produit->qte ?></td>
            <td ><?= $produit->dateCommande ?></td>
            <td>
                <a href="../admin/vue.php?idPanier=<?= $produit->id_panier;?>"  style="text-decoration: none;  font-size: 1rem; font-weight: bold;"><i class="fa fa-eye me-2" aria-hidden="true"></i>Voir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>
