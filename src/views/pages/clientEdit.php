<!DOCTYPE html>
<html lang="pt-br">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>Espaço Maravilha</title>


</head>

<body>
  <div class="container">
    <form action="<?=$base?>/clientEdit/<?=$data['id']?>" method="POST">
      <input type="hidden" name="id" value='<?=$data['id']?>'>
      <label>
        Nome: <br>
        <input type="text" class="add" name='nome' value="<?=$data['nome']?>">
      </label> <br> <br>
      <label>
        Celular: <br>
        <input type="text" class="add" name="celular" value="<?=$data['celular']?>">
      </label> <br> <br>
      <label>
        Email: <br>
        <input type="email" class="add" name="email" value="<?=$data['email']?>">
      </label> <br> <br>
      <input type="submit" placeholder="Enviar">

    </form>
  </div>

</body>


</html>