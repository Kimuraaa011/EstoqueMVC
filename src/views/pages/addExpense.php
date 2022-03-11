<!DOCTYPE html>
<html lang="pt-br">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>Espaço Maravilha</title>


</head>

<body>

  <div class="container">
    <form action="" method="POST">
      <h2>Adicione seus gastos aqui</h2><br>
      <label>

        Tipo de gasto: <br>
        <input type="text" name="nome">

      </label> <br> <br>
      <label>
        Valor do pagamento: <br>
        <input type="text" name="valor">

      </label> <br> <br>
      <label>


        <select name="pagamento">
          <option selected disabled>--> Forma de pagamento <--</option>
          <option value="debito">débito</option>
          <option value="credito">crédito</option>
          <option value="dinheiro">dinheiro</option>

        </select>

      </label> <br> <br> 
      
      <input type="submit" value="Enviar">

    </form>

  </div>

</body>


</html>