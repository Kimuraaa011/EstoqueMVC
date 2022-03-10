


<!DOCTYPE html>
<html lang="pt-br">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <link rel="stylesheet" href="<?=$base?>/assets/css/client.css">
  <title>Espaço Maravilha</title>


</head>

<body>
  <div class="container">

    <table>

      <tr>

        <th>Código da Compra</th>
        <th>Data da Compra</th>
        <th>Valor Total</th>

      </tr>

      <?php foreach($debt as $item): ?>

        <tr>     

          <td><?=$item['saleId']?></td>
          <td><?=$item['data']?></td>
          <td><?=$item['valor_total']?></td>

        </tr>

      <?php endforeach; ?>

    </table> <br>
    
    <form action="<?=$base?>/debtEdit/<?=$debt[0]['id']?>" method="POST">

      Valor que o cliente irá quitar: <br>
      <input type="text" name="parcela">
      <input type="submit" value="quitar">

    </form>

  </div>


</body>


</html>