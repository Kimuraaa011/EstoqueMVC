<!DOCTYPE html>
<html lang="pt-br">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <link rel="stylesheet" href="<?=$base?>/assets/css/sale_style.css">
  <title>Espaço Maravilha</title>


</head>

<body>
  <div class="container">

    <h2>Histórico de Vendas</h2>

    <input id="searchInput" type="text" placeholder="procure pelo nome aqui"> <br> <br>

    <table class="selected">

      <tr>

        <th>nome</th>
        <th>data da compra</th>
        <th>produto</th>        
        <th>forma de pagamento</th>        
        <th>preço</th>
        <th>quantidade</th>
        <th>total</th>

      </tr>

      <?php foreach($saleProduct as $item): ?>

        <tr>     

          <td class="searchName"><?=$client[$sale[$item['salesId'] - 1]['clientId'] - 1]['nome']?></td>
          <td class="searchDate"><?=$sale[$item['salesId'] - 1]['data']?></td>
          <td><?=$product[$item['productId'] - 1]['nome']?></td>
          <td><?=$sale[$item['salesId'] - 1]['pagamento']?></td>
          <td>R$<?=$product[$item['productId'] - 1]['price']?></td>
          <td><?=$item['quantidade']?></td>
          <td>R$<?=$item['quantidade'] * $product[$item['productId'] - 1]['price']?></td>


        </tr>

      <?php endforeach; ?>

    </table>

  </div>

  <script src="<?=$base?>/assets/script/searchProductDetails.js"></script>

</body>


</html>