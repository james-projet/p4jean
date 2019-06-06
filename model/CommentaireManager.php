<?php
class CommentaireManager
{
  private $bdd;

  public function __construct()
  {
    $this->bdd = new PDO('mysql:host=localhost;dbname=p4jean;charset=utf8', 'root', '');
  }

  /**
  *Sert a renvoyer un commentaire par rapport a son id
  *$id = int
  *return l objet episode = objet
  **/
  public function findCommentaireById($id)
  {
    $commentaires = array();
    $bdd = $this->bdd;
    $reponse = $bdd->prepare('SELECT c.pseudo, c.commentaire, c.date_creation, c.episode_id
                              FROM commentaire c
                              INNER JOIN episode e
                              ON c.episode_id = e.id
                              WHERE c.episode_id=:id');
    $reponse->bindValue('id', $id);
    $reponse->execute();
    while ($donnees = $reponse->fetch())
    {
     $commentaire = new Commentaire();
     $commentaire->setPseudo($donnees['pseudo']);
     $commentaire->setCommentaire($donnees['commentaire']);
     $commentaire->setDate_creation($donnees['date_creation']);
     $commentaire->setEpisode_id($donnees['episode_id']);

     $commentaires[] = $commentaire;
   };

      return $commentaires;

  }
  /**
  *Sert a stocker les commentaire en BDD
  *$pseudo= string , $commentaire = string, $episode_id = int
  **/
  public function stockageCommentaire($pseudo, $commentaire, $episode_id)
  {
    $bdd = $this->bdd;

    $req = $bdd->prepare('INSERT INTO commentaire (pseudo, commentaire, episode_id, date_creation) VALUES(?, ?, ?, NOW())');
    $req->execute(array($pseudo, $commentaire, $episode_id));
  }
}

