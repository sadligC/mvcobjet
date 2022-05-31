
<h1>Liste des acteurs</h1>
<ul>
    <?php foreach ($res as $acteur) { ?>
       <li><?=$acteur -> getFirst_name()?> <?=$acteur -> getLast_name()?></li><?php
    }?>
</ul>