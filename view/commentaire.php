<form action="<?= HOST?>stockage" method="post">
  <p>
  <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
  <label for="message">Commentaire</label> :  <input type="text" name="commentaire" id="commentaire" /><br />

  <input type="submit" value="Envoyer" />
  <input type="hidden" name="episode_id" value="<?= $id;?>">
	</p>
</form>
<?php foreach ($episode->getCommentaires() as $commentaire):?>
  <p class="pseudocom"><?= $commentaire->getPseudo()?></p>
  <p class="datecom"><?= $commentaire->getDate_creation();?></p>
  <p class="messagecom"><?= $commentaire->getCommentaire();?></p>
<?php endforeach;?>
