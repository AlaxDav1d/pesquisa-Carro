<?php
      $host = 'localhost';
      $bd = 'carro';
      $user = 'root';
      $pass = '';
 
      $mysqli = new mysqli($host,$user,$pass,$bd);
      if( $mysqli->connect_errno)
           echo 'Erro Ao Conectar';
     