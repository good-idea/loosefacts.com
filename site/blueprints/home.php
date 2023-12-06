<?php if(!defined('KIRBY')) exit ?>

title: Home
pages: false
files: true
fields:
  title:
    label: Title
    type:  text
  name:
    label: Name
    type: text
  background:
    label: Background Image
    type: selector
    mode: single
    types:
     - image