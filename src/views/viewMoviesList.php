
<h1>Liste des films</h1>
<ul>
    <?php foreach ($result as $movie) { ?>
       <li><?=$movie ->getTitle()?><a href="<?=_URL?>printMovie/<?=$movie ->getId()?>"> //_afficher les détails</a></li><?php
    }?>
</ul>