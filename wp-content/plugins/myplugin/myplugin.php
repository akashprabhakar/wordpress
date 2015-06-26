<?php

/*
Plugin Name: Catify
Description: This plugin finds the word "dog" in text and replaces it with "cat"
*/

function catify($text) {

      $text = str_replace('cat', 'dog', $text);

      return $text;
}

add_filter('the_content', 'catify');
?>