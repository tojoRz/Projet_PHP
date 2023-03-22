<?php
    include'dashboard.php';

?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <table class="table " >
    <h3>Liste Users</h3>
    <tbody>
        <tr class="table-active ">
        <th>Id</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        </tr>
        <?php
        $Users=afficherClient();
        ?>
        <?php foreach($Users as $user): ?>
        <tr>
            <td ><?= $user->id ?></td>
            <td ><?= $user->name ?></td>
            <td ><?= $user->username ?></td>
            <td style=" color: blue;"><?= $user->email ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>