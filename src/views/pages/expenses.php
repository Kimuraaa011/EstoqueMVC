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

    <input type="text" id="searchInput" placeholder="Pesquise o nome aqui"> <br> <br>

    <table class="selected" cellspacing="0">
      <tr>

        <th>Tipo de gastos</th>
        <th>Data</th>
        <th>Forma de pagamento</th>
        <th>Valor</th>

      </tr>
      <?php foreach($data as $item): ?>
        <tr <?= ($item['id']%2 === 0)? 'class="colorir"' : 'class=""' ?> >
          <td class="searchName"><?= $item['nome']?></td> 
          <td class="searchDate"><?= $item['data']?></td>
          <td><?= $item['pagamento']?></td>
          <td>R$<?=number_format($item['valor'],2, ',', '.')?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>

  <script src="<?=$base?>/assets/script/searchProductDetails.js"></script>

</body>


</html>