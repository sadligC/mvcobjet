
<h1>Liste des réalisateurs</h1>
<ul>
    <?php foreach ($res as $director) { ?>
       <li><?=$director -> getFirst_name()?> <?=$director -> getLast_name()?></li><?php
    }?>
</ul>