<h1><?=$movie ->getTitle()?></h1>

<div class="movie-info">
    <div class="movie-main">
        <div class="cover">
            <img src="<?=$movie ->getCover_image()?>" alt="<?=$movie ->getCover_image()?>">
        </div>
        <div class="casting">
            <h2>Equipe</h2>
            <h3>Réalisateur</h3>
            <p><?= $director ->getFirst_name()?><?= $director ->getLast_name()?></p>
            <h3>Casting</h3><?php 
            foreach ($casting as $actor) { ?>
                <p><?=$actor ->getFirst_name()?><?=$actor ->getLast_name()?></p><?php
            }?>
        </div>
    </div>

    <div class="movie-data">
        <h4>Genre</h4>
        <p><?=$genre ->getName()?></p>
        <h4>Date de sortie</h4>
        <p><?=$movie ->getDate()?></p>
        <h4>Durée</h4>
        <p><?=$movie ->getDuration()?></p>
        <h4>Résumé</h4>
        <p><?=$movie ->getDescription()?></p>
    </div>

    <div class="movie-comments">
        <h3>Commentaires:</h3><?php
        foreach($comments as $com) { ?>
            <div class="com">
                <aside>
                    <div>
                        <h4>Auteur:</h4>
                        <p><?=$com ->getAuthor()?></p>
                    </div>
                    <div>
                        <h4>Note:</h4>
                        <p><?=$com ->getMark()?>/10</p>
                    </div>
                </aside>
                <article>
                    <h4>Commentaire:</h4>
                    <p><?=$com ->getContent()?></p>
                </article>
                
            </div><?php
        }?>
        
    </div>
</div>