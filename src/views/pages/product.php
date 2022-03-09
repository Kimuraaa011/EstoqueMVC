<!DOCTYPE html>
<html lang="pt-br">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <link rel="stylesheet" href="<?=$base?>/assets/css/clients.css">
  <title>Espaço Maravilha</title>


</head>

<body>
  <div class="container">
    <h2><a href="<?=$base?>/">Home</a></h2>
    <h2>Lista de Produtos</h2>
    <table>
      <tr>

        <th>Nome</th>
        <th>Preço</th>
        <th>cor</th>
        <th>tamanho</th>
        <th>Quantidade em estoque</th>
        <th>Categoria</th>
        <th>Opções</th>

      </tr>
      <?php foreach($data as $product): ?>
        <tr <?= ($product['id']%2 === 0)? 'class="colorir"' : 'class=""' ?> >
          <td><?= $product['nome']?></td> 
          <td><?= $product['price']?></td>
          <td><?= $product['cor']?></td>
          <td><?= $product['tamanho']?></td>
          <td><?= $product['qtd_estoque']?></td>
          <td><?= $categoria[$product['categoria'] - 1]['nome']?></td>
          <td><a href="<?=$base?>/productEdit/<?=$product['id']?>">Editar</a></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>


</body>


</html>