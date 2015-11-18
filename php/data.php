<?php
  
  header('Access-Control-Allow-Origin: * ');
  header('Content-Type:application/json;charset=UTF-8');

  $conn = new mysqli("localhost","root","","bd_clientes");

  if($conn->connect_error){
  	die("Conexión fallida:". $conn->connect_error);
  }

  $result = $conn->query("SELECT Nomb_Compania,Ciudad,Pais FROM clientes");

  $outp = "";
  while($rs = $result->fetch_assoc()){
      if($outp != "") { $outp .= ","; }
      $outp .= '{"Nombre":"'  . $rs["Nomb_Compania"] . '",';
      $outp .= '"Ciudad":"'   . $rs["Ciudad"]        . '",';
      $outp .= '"Pais":"'. $rs["Pais"]     . '"}';  
  }

  $outp ='{"records":['.$outp.']}';
  $conn->close();
  echo($outp);

?>