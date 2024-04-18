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
<style>
     *{
          padding: 0;
          margin: 0;
          box-sizing: border-box;
     }
     body{
          color: #fff;
          background-image: linear-gradient(to left bottom,rgb(117, 0, 0),rgb(0, 0, 0));
          height: 100%;
     }
     h1{
          margin-top: 2%;
          font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
     }
     form{
          display: flex;
          flex-direction: column;
          align-items: center;
          height: 10vh;
          width: 60vh;
          margin-top: 2%;
          padding: 1%;
          gap: 10px;
     }
     input[type='text']{
          border-radius: 20px;
          text-transform: capitalize;
          padding: 3% 5%;
          margin-bottom: 1%;
          width: 100%;
     }
     input[type='submit']{
          margin-bottom: 5%;
          border-radius: 40px;
          padding: 5% 10%;
          transform: scale(80%);
          font-size: 120%;
          cursor: pointer;
          transition: 800ms;
          border: none;
     }
     input[type='submit']:hover{
          background-color: black;
          color: #fff;
          transform: scale(100%);
          border-radius: 0px;
     }
     table{
          display: flex;
          align-items: center;
          justify-content: center;
          margin-top: 5%;
          margin-bottom: 5%;
          padding: 1%;
     }
     tbody{
          padding: 1%;
          overflow: scroll;
          overflow-x: hidden;
          height: 70vh;
          width: 50%;
          border: 1px solid #fff;
          margin: 0;
     }
     tr,th,td{
          margin: 0;
          width: 16.6%;
          border: 1px dotted #fff;
          font-size: 120%;
          text-shadow: 0.2px 0.2px 2px red;
          padding: 1%;
     }
     th{
          text-shadow: 0.2px 0.2px 2px white;
          color: black;
     }
     .tudo{
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
     }
     p{
          margin-top: 10%;
          font-size: 120%;
          display: flex;
          align-items: end;
          justify-content: center;
     }
</style>
<body>
     <div class="tudo">
          <h1>Pesquisa</h1>
     <form action="">
          <input  name="envio" placeholder="pesquise algo"  type="text">
          <input type="submit" value="Enviar">
     </form>
     </div>
     <table>
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
                    $sql_code = "SELECT * FROM veiculo WHERE Fabricante LIKE '%$pesquisa%' OR modelo LIKE '%$pesquisa%' OR veiculo LIKE '%$pesquisa%' ";
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
