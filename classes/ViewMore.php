<?php

class ViewMore {

  public $colWidth = '4';
  public $screenSizeSplitPoint = 'md';
  public $header;
  public $imgPath;
  public $idNumber;
  public $buttonType = 'primary';
  public $href;

  function __construct($name, $header, $imgPath, $pageToGoTo, $idNumber){
    $this->href = $this->createHref($pageToGoTo, $name);
    $this->header= $header;
    $this->imgPath = $imgPath;
    $this->idNumber = $idNumber;
  }

  function build() {
    $classes = 'view-more position-relative col-12 col-'.$this->screenSizeSplitPoint.'-'.$this->colWidth;
    $divId = 'view-more-'.$this->idNumber;
    $imgPath = $this->imgPath;
    $buttonId = 'view-more-button-'.$this->idNumber;
    $href = $this->href;

    $outputString = '';

    $outputString .= '<article class="' . $classes . '" id="' . $divId .'">';


      $outputString .= '<img src="' . $imgPath .'" alt="">';
      $outputString .= '<div class="overlay overlay-view-more">';
        $outputString .= '<div class="view-more-text">';
          $outputString .= '<h3>' . $this->header . '</h3>';
          $outputString .= '<a class="btn btn-primary" href="' . $href . '">View More</a>';
        $outputString .= '</div>';
      $outputString .= '</div>';
    $outputString .= '</article>';

    echo $outputString;
  }
  function createHref($page, $hook) {
    $page = strtolower($page);
    $hook = strtolower($hook);
    $newHook = '';
    $tempArray = explode(" ", $hook);

    for ($i=0; $i<sizeof($tempArray); $i++){
      $newHook .= $tempArray[$i];
      if ($i!==sizeof($tempArray)-1){
        $newHook .= '-';
      }
    }

    return $page . '.php?s=' . $newHook;
  }
}

?>
