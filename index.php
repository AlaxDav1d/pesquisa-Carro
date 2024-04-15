<?php
     include('conexao.php');

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
          <input  name="envio" placeholder="pesquise algo"  type="text">
          <input type="submit" value="Enviar">
     </form>
     <table border="1">
          <tr>
               <th>Fabricante</th>
               <th>Modelo</th>
               <th>Veiculo</th>
          </tr>
          <?php
               if($_GET['envio'] == ''){ 
          ?>
               <tr>
                   <td colspan="3">Digite algo para pesquisar</td>
               </tr>
               
               <?php
               }else{
                    $pesquisa =  $mysqli->real_escape_string($_GET['envio']);
                    $sql_code = "SELECT * FROM veiculo WHERE Fabricante LIKE '%$pesquisa%' ";
                    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
                    if($sql_query->num_rows == 0){     
                    ?>
                         <p>Nada Encontrado</p>
               <?php
                    }else{
                         while($dados = $sql_query->fetch_assoc()){
               ?>
                    <tr>
                         <td><?php echo $dados['Fabricante']?></td>
                         <td><?php echo $dados['modelo']?></td>
                         <td><?php echo $dados['veiculo']?></td>
                    </tr>
                              <?php
                         }
                    }     
               }

               ?>
                 
     </table>
</body>
</html>