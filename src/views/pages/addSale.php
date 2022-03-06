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
    <h2>Selecione o cliente:</h2>
    <label >
      <input  placeholder="Pesquise o nome aqui"id="searchInput"type="text" name='search'>
    </label> 
    <br> <br>
    <table>
      <tr>

        <th>Nome</th>
        <th>Celular</th>
        <th>Email</th>
        <th>Opções</th>

      </tr>
      <?php foreach($data as $client): ?>
        <tr <?= ($client['id']%2 === 0)? 'class="colorir"' : 'class=""' ?> >
          <td class="search"><?= $client['nome']?></td> 
          <td><?= $client['celular']?></td>
          <td><?= $client['email']?></td>
          <td><a href="<?=$base?>/addSale/client/<?=$client['id']?>">[Adicionar Venda]</a></td>
        </tr>
      <?php endforeach; ?>
    </table>

    <script src="<?=$base?>/assets/script/searchClient.js"></script>
  </div>


</body>


</html>