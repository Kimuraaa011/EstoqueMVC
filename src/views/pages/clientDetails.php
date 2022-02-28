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
    <h2>Dados do cliente:</h2>
    <table>
      <tr>

        <th>Nome</th>
        <th>Celular</th>
        <th>Email</th>
        <th>Opções</th>

      </tr>
      <tr>
        <td><?=$data['nome']?></td>
        <td><?=$data['celular']?></td>
        <td><?=$data['email']?></td>
        <td><a href="<?=$base?>/clientEdit/<?=$data['id']?>">Editar</a></td>
      </tr>
    </table>
    <h3><a href="<?=$base?>/">Home</a></h3>
  </div>


</body>


</html>