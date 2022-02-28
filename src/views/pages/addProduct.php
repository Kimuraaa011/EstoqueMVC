<!DOCTYPE html>
<html lang="pt-br">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>Espaço Maravilha</title>


</head>

<body>
  <div class="container">
    <form action="<?=$base?>/addProduct" method="POST">
      <label>
        Nome: <br>
        <input type="text" class="add" name="nome">
      </label> <br> <br>
      <label>
        Preço: <br>
        <input type="text" class="add" name="price">
      </label> <br> <br>
      <label>
        Cor: <br>
        <input type="text" class="add" name="cor">
      </label> <br> <br>
      <label>
        Quantidade em Estoque: <br>
        <input type="text" class="add" name="estoque">
      </label> <br> <br>
      <label>
        Tamanho: <br>
        <select name="tamanho">
        <option disabled selected value> -- Selecione uma Opção -- </option>
        <option value="U">U - Único</option>
        <option value="P">P - Pequeno</option>
        <option value="M">M - Médio</option>
        <option value="G">G - Grande</option>
        <option value="GG">GG - Extra Grande</option>
      </select> <br> <br>
      </label>
      <label>
        Cetegoria: <br>
        <select name="categoria">
          <option disabled selected value> -- Selecione uma Opção -- </option>
          <?php foreach($data as $item): ?>
            <option value="<?=$item["id"]?>"><?=$item["nome"]?></option>
          <?php endforeach ;?>
        </select> <br> <br>
      </label>
      <input type="submit" placeholder="Enviar">

    </form>
  </div>

</body>


</html>