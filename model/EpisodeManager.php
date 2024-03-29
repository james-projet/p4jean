<?php


class EpisodeManager
{
  private $bdd;

  public function __construct()
  {
    $this->bdd = new PDO('mysql:host=localhost;dbname=p4jean;charset=utf8', 'root', '');
  }
/**
*Sert a stocker tous les episodes dans un tableau
*return un tableau d objet array(object)
**/
  public function findAll()
  {
     $bdd = $this->bdd;
     // Récupération des 10 derniers messages
     $reponse = $bdd->prepare('SELECT id, titre, episode FROM episode ORDER BY ID DESC');

     $reponse->execute();

    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
     while ($donnees = $reponse->fetch())
     {
      $episode = new Episode();
      $episode->setId($donnees['id']);
      $episode->setTitre($donnees['titre']);
      $episode->setEpisode($donnees['episode']);
      $episode->setCommentaires($this->findCommentaireById($donnees['id']));

      $episodes[] = $episode;
     };


     return $episodes;
  }
  /**
  *Sert a renvoyer un episode par rapport a son id
  *$id = int
  *return l objet episode = objet
  **/
  public function findBy($id)
  {
    $bdd = $this->bdd;
    $query = "SELECT id, titre, episode FROM episode WHERE id=:id";
    $reponse = $bdd->prepare($query);
    $reponse->bindValue('id', $id);
    $reponse->execute();
    $donnees = $reponse->fetch();
    $episode = new Episode();
    $episode->setId($donnees['id']);
    $episode->setTitre($donnees['titre']);
    $episode->setEpisode($donnees['episode']);
    $episode->setCommentaires($this->findCommentaireById($donnees['id']));
    return $episode;
  }

}
