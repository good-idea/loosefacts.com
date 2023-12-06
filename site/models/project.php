<?php

class ProjectPage extends Page {

  public function background() {
    $image_str = (string)$this->background_image();
    if (null !== $this->files()->find($image_str)) {
      return $this->files()->find($image_str);
    } else {
      return site()->files()->find('default_cover.jpg');
    }
  }

  public function hover() {
    $image_str = (string)$this->hover_image();
    if (null !== $this->files()->find($image_str)) {
      return $this->files()->find($image_str);
    } else {
      return $this->background();
    }
  }

  public function images() {
  	$bg = (string)$this->background_image();
    $hv = (string)$this->hover_image();
    return parent::images()->not($bg)->not($hv)->sortBy('sort', 'ASC');
  }

}
