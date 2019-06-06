<?php

class View
{

  private $template;

  public function __construct($template)
  {
    $this->template = $template;
  }

  public function render($datas = null)
  {

    extract($datas);

    ob_start();
    include(VIEW.$this->template.'.php');
    $content = ob_get_clean();
    include_once (VIEW.'gabarit.php');
  }
}

 ?>
