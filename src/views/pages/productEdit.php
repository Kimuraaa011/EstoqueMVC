<!DOCTYPE html>
<html lang="pt-br">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>Espaço Maravilha</title>


</head>

<body>
  <div class="container">
    <form action="<?=$base?>/productEdit/<?=$data['id']?>" method="POST">
      <label>
        Nome: <br>
        <input type="text" class="add" name="nome" value="<?=$data['nome']?>">
      </label> <br> <br>
      <label>
        Preço: <br>
        <input type="text" class="add" name="price" value="<?=$data['price']?>">
      </label> <br> <br>
      <label>
        Cor: <br>
        <input type="text" class="add" name="cor" value="<?=$data['cor']?>">
      </label> <br> <br>
      <label>
        Quantidade em Estoque: <br>
        <input type="text" class="add" name="estoque" value="<?=$data['qtd_estoque']?>">
      </label> <br> <br>
      <label>
        Tamanho: <br>
        <select name="tamanho">
        <option <?= ($data['tamanho'] === 'U') ? "selected" : "" ?>  value="U">U - Único</option>
        <option <?= ($data['tamanho'] === 'P') ? "selected" : "" ?>  value="P">P - Pequeno</option>
        <option <?= ($data['tamanho'] === 'M') ? "selected" : "" ?>  value="M">M - Médio</option>
        <option <?= ($data['tamanho'] === 'G') ? "selected" : "" ?>  value="G">G - Grande</option>
        <option <?= ($data['tamanho'] === 'GG') ? "selected" : "" ?>  value="GG">GG - Extra Grande</option>
      </select> <br> <br>
      </label>
      <label>
        Categoria: <br>
        <select name="categoria">
          <?php foreach($categoria as $item): ?>
            <option <?=($data["categoria"] ===  $item["id"]) ? "selected" : "" ?> value="<?=$item["id"]?>"><?=$item["nome"]?></option>
          <?php endforeach ;?>
        </select> <br> <br>
      </label>
      <input type="submit" placeholder="Enviar">

    </form>
  </div>

</body>


</html>