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
    <h2>Dados do cliente:</h2>
    <table>
      <tr>

        <th>Nome</th>
        <th>Celular</th>
        <th>Email</th>
        <th>Opções</th>

      </tr>
      <tr>
        <td><?=$client['nome']?></td>
        <td><?=$client['celular']?></td>
        <td><?=$client['email']?></td>
        <td><a href="<?=$base?>/clientEdit/<?=$client['id']?>">Editar</a></td>
      </tr>
    </table>

    <h2>Lista de compras:</h2>

    <input type="text" name="search" id="searchInput" placeholder="pesquise o produto aqui"> <br> <br>

    <table class="selected">

      <tr>

        <th>nome</th>  
        <th>data da compra</th>      
        <th>forma de pagamento</th>        
        <th>preço</th>
        <th>quantidade</th>
        <th>total</th>

      </tr>

      <?php foreach($saleProduct as $item): ?>

        <tr>     

          <td class="searchName"><?=$product[$item['productId'] - 1]['nome']?></td>
          <td  class="searchDate"><?=$sale[$item['salesId'] - 1]['data']?></td>
          <td><?=$sale[$item['salesId'] - 1]['pagamento']?></td>
          <td>R$<?=$product[$item['productId'] - 1]['price']?></td>
          <td><?=$item['quantidade']?></td>
          <td>R$<?=$item['quantidade'] * $product[$item['productId'] - 1]['price']?></td>


        </tr>

      <?php endforeach; ?>

    </table>

    <h2>Divídas:</h2> <br>

    <table>

      <tr>

        <th>Código da Compra</th>
        <th>Data da Compra</th>
        <th>Valor Total</th>
        <th>Opções</th>

      </tr>

      <?php foreach($debt as $item): ?>

        <tr>     

          <td><?=$item['saleId']?></td>
          <td><?=$item['data']?></td>
          <td><?=$item['valor_total']?></td>
          <td><a href="<?=$base?>/debtEdit/<?=$item['id']?>">Quitar Dívida</a></td>

        </tr>

      <?php endforeach; ?>

    </table>



    <h3><a href="<?=$base?>/">Home</a></h3>
  </div>


  <script src="<?=$base?>/assets/script/searchProductDetails.js"></script>

</body>


</html>