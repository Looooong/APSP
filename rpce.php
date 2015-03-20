<?php
require_once 'inc/database.class.php';
require_once 'inc/config.php';
require_once "inc/languages.class.php";
  $query ="SELECT mkhang,ten,dchi,dthoai,msthue FROM donvi";
  $db->querySql($query);
  $suburbs = $db->fetchToArray();
  $term = trim(strip_tags($_GET['term']));
  $matches = array();
  foreach($suburbs as $suburb){
if(stripos($suburb['mkhang'], $term) !== false){
    $suburb['value'] = $suburb['mkhang'];
    $suburb['label'] = "{$suburb['mkhang']},{$suburb['ten']},{$suburb['msthue']}";
    $matches[] = $suburb;
    }
  } 
  $matches = array_slice($matches, 0, 5);
  print json_encode($matches);
  $db->closeConnect();
  ?>