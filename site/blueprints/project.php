<?php if(!defined('KIRBY')) exit ?>

title: Project
pages: false
files: true
  sortable: true
  width: 2048
  fields:
    caption:
      type: text
      label: caption
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  wysiwyg
  hover_image:
    label: Hover Image
    type: selector
    mode: single
    size: 4
    types:
     - image
  background_image:
    label: Background Image
    type: selector
    mode: single
    size: 4
    types:
     - image
  outlink:
    label: Link
    type:  url
