  <img src="<?= HOST?>public/photos/alaska.jpg" alt="montagne" id="montagne">
  <div class="title">
    <h1>Jean forteroche</h1>
    <p>Billet simple pour l'Alaska</p>
  </div>

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto col-lg-12">
            <li class="nav-item active col-lg-2">
              <a class="nav-link" id="home" href="<?= HOST?>homepage">A Propos...</a>
            </li>
            <li class="nav-item col-lg-2">
              <a class="nav-link" href="<?= HOST?>episode/id/<?= $episodes[0]->getId();?>">Dernier Episode : <?= $episodes[0]->getTitre();?></a>
            </li>
            <li class="nav-item dropdown col-lg-2">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tous les episodes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php foreach ($episodes as $episode):?>
            <a class="dropdown-item" href="<?= HOST?>episode/id/<?= $episode->getId();?>"><?= $episode->getTitre();?></a>
          <?php endforeach;?>

        </div>
      </li>
            <li class="nav-item col-lg-2">
              <a class="nav-link" href="<?= HOST?>contact">Contact</a>
            </li>
        </ul>
  </div>
  </nav>
