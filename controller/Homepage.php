<?php

class Homepage
{
  /**
  *Sert a creer la vue
  *$params = tableau des elements de l url
  **/
  public function showHomepage($params)
  {
    $manager = new EpisodeManager();
    $episodes = $manager->findAll();

    $myView = new View('homepage');
    $myView->render(array('episodes' => $episodes));
  }

  public function showEpisode($params)
  {

    $id = $params['id']; // $request->get('id');
    $manager = new EpisodeManager();
    $comManager = new CommentaireManager();
    $episodes = $manager->findAll(); // tableau d'objet => récupérer les données dans un tableau
    $myEpisode = $manager->findBy($id); // objet
    $commentaires = $manager->findCommentaireById($id);


    $myView = new View('episode');
    $myView->render(array('episodes' => $episodes, 'myEpisode' => $myEpisode, 'commentaires' => $commentaires, 'id' =>$id));
  }

  public function stockCommentaire($params)
  {
    $episode_id = $params['episode_id'];
    $pseudo = $params['pseudo'];
    $commentaire = $params['commentaire'];

    $manager = new CommentaireManager();

    $stockage = $manager->stockageCommentaire($pseudo, $commentaire, $episode_id);
    header("location:episode/id/$episode_id");
  }

  public function showContact()
  {
    $manager = new EpisodeManager();
    $episodes = $manager->findAll();
    $myView = new View('contact');
    $myView->render(array('episodes' => $episodes));
  }

}
