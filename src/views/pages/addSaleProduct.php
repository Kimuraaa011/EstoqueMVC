

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

    <h2>Dados do Cliente</h2>

    <table>
      <tr>

        <th>Nome</th>
        <th>Celular</th>
        <th>Email</th>
        <th>Opções</th>

      </tr>
      <tr>

        <td><?= $data['nome']?></td>
        <td><?= $data['celular']?></td>
        <td><?= $data['email']?></td>
        <td><a href="<?=$base?>/addSale">Alterar</a></td>

      </tr>
    </table>

    <h2>Produtos Selecionados:</h2>

    <form action="<?=$base?>/addSale/client/<?=$data['id']?>" method="POST">
      <table class="adicionados">

        <tr>

          <th>Código</th>
          <th>Nome</th>
          <th>Preço</th>
          <th>Cor</th>
          <th>Quantidade em Estoque</th>
          <th>Tamanho</th>
          <th>Categoria</th>
          <th>Quantidade</th>

        </tr>
        
        <?php foreach($products as $product): ?>

          <tr>

            <td class="productId"> <?=$product['id']?> </td>
            <td> <?=$product['nome']?> </td>
            <td> R$<?=$product['price']?> </td>
            <td> <?=$product['cor']?> </td>
            <td> <?=$product['qtd_estoque']?> </td>
            <td> <?=$product['tamanho']?> </td>
            <td> <?=$categoria[$product['categoria'] - 1]['nome']?> </td>
            <td><input type="text" value="1" name="<?='quantidade' . $product['id']?>"></td>

          </tr>

        <?php endforeach ; ?>

      </table> <br>

      <select name="pagamento">

        <option selected disabled>-- forma de pagamento --</option>
        <option value="dinheiro">dinheiro</option>
        <option value="debito">debito</option>
        <option value="credito">credito</option>
        <option value="fiado">fiado</option>

      </select> <br> <br>

      <input id="productIds" type="hidden" name="productIds">
      <input onclick="idList()" type="submit" value="Terminar venda">
      <?php
        if(isset($_SESSION['qtdWarn'])){
          echo '<h3 style="color: red">' . $_SESSION['qtdWarn'] . '</h3>';
          $_SESSION['qtdWarn'] = '';
        }
      ?>

    </form>



    <h2>Selecione o produto desejado:</h2>

    <label >

      <input  placeholder="Pesquise o produto" id="searchInput"type="text" name='search'>

    </label> <br> <br>


    <table class="selected">

      <tr>

        <th>Código</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Cor</th>
        <th>Quantidade em Estoque</th>
        <th>Tamanho</th>
        <th>Categoria</th>
        <th>Selecione o Produto</th>

      </tr>

      <?php foreach($products as $product): ?>

        <tr <?= ($product['id']%2 === 0)? 'class="colorir"' : 'class=""' ?>>

          <td class="searchId"> <?=$product['id']?> </td>
          <td class="searchName"><?=$product['nome']?> </td>
          <td> R$<?=$product['price']?> </td>
          <td> <?=$product['cor']?> </td>
          <td> <?=$product['qtd_estoque']?> </td>
          <td> <?=$product['tamanho']?> </td>
          <td> <?=$categoria[$product['categoria'] - 1]['nome']?> </td>
          <td> <button onclick="selecionar('<?=$product['id']?>')">Selecionar</button> </td>

        </tr>

      <?php endforeach ; ?>
    </table>
    
  </div>

  <script src="<?=$base?>/assets/script/searchProductt.js"></script>

</body>


</html>