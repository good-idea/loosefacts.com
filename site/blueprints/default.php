<?php if(!defined('KIRBY')) exit ?>

title: Page
pages: true
  template:
    - category
    - page
files: true
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  textarea