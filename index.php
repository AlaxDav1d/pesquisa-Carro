<?php
     include('conexao.php');

     $pesquisa =  $mysqli->real_escape_string($_GET['envio'])  ;

     $sql_code = "SELECT * FROM veiculo WHERE Fabricante LIKE  '%$pesquisa%'  AND modelo LIKE '%$pesquisa%' 
     AND veiculo LIKE '%$pesquisa%' ";

     $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Pesquisa de no banco de dados</title>
</head>
<body>
     <h1>Pesquisa</h1>
     <form action="">
          <input  name="envio" placeholder="pesquise algo" type="text">
          <input type="submit" value="Enviar">
     </form>
     <table border="1">
          <tr>
               <th>Fabricante</th>
               <th>Modelo</th>
               <th>Veiculo</th>
          </tr>
          <tr>
               <td colspan="3">Pesquise algo para aparecer os resultados</td>
          </tr>
     </table>
</body>
</html>