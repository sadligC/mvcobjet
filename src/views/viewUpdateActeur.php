<h1>Modifier un acteur</h1>

<h2>Choisir l'acteur.rice</h2>
<form action="selectActor" method="POST">
    <select name="acteur">
        <?php foreach ($actorList as $actor) { ?>
            <option value="<?=$actor->getId()?>"
            <?php if (isset($acteur)) {
                if ($actor->getId() == $acteur->getId()) {
                    echo "selected";
                } 
            }?>>
            <?=$actor->getLast_name()?> <?=$actor->getFirst_name()?>
            </option><?php
        } ?>
    </select>
    <input type="submit" value="OK">
</form>

<h2>Modifier l'acteur.rice</h2>
<form action="updateActor" method="POST" >
    <input type="text" name="prenom"
    <?php if (!isset($acteur)){
        echo"placeholder=\"prenom\" readonly";
    } else {
        echo 'name="prenom" value="' .$acteur->getLast_name(). '"';
    }
    ?>><br>

    <input type="text" name="nom" 
    <?php if (!isset($acteur)){
        echo"placeholder=\"nom\"readonly";
    } else {
        echo 'name="prenom" value="' .$acteur->getFirst_name(). '"';
    }?>><br>
    <?php if (isset($acteur)){?>
        <input type="hidden" name="id" value="<?=$acteur->getId()?>"><br><?php
    } ?>
    
    <input type="submit" value="OK" <?php if (!isset($acteur)){echo"disabled";}?>>
</form>