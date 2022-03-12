
<!DOCTYPE html>
<html lang="pt-br">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <script src="https://kit.fontawesome.com/2115d45bf2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?=$base?>/assets/css/style.css">
  <title>Espaço Maravilha</title>


</head>

<body>
  <div class="container">
    <div class="left_side">
      <h1>M</h1>
      <i onclick="closeMenu()" class="fa-solid fa-xmark"></i>
      <h2>Sistema Maravilha</h2> <br>

      <?php $all_months = ['Janeira', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'] ?>
      
      <form action="" method="post">
        <div class="selected-box">

          <select name="year" class="format"> 

            <?php foreach($years as $item): ?>

              <option value="<?=$item['year']?>">Ano <?=$item['year']?></option>
              
            <?php endforeach;?>

          </select>


        </div> <br>



        <div class="selected-box">

          <select name="year"> 

            <option value="0">Todos os meses</option>

            <?php foreach($months as $item): ?>

              <option value="<?=$item['month']?>"><?=$all_months[$item['month']-1]?></option>
                
            <?php endforeach;?>

          </select> <br>

        </div> <br>

        <input class="button" type="submit" value="Filtrar Datas">
      </form>

       <a href="<?=$base?>/sales" class='option'>Histórico de vendas</a>
       <a href="<?=$base?>/addClient" class='option'>Adicionar cliente</a>
       <a href="<?=$base?>/clients" class='option'>Visualizar clientes</a>
       <a href="<?=$base?>/addSale" class='option'>Adicionar venda</a>
       <a href="<?=$base?>/addProduct" class='option'>Adicionar Produto</a>
       <a href="<?=$base?>/products" class='option'>Visualizar Produtos</a>
       <a href="<?=$base?>/addExpense" class='option'>Visualizar Gastos</a>

    </div>  

    <div class="menu">
      <i onclick="openMenu()"  class="fa-solid fa-circle-chevron-down fa-2x"></i>
    </div>



    <div class="right_side">

      <h2 >Dashboard de Vendas</h2>
      <div class="right_side_content">
        <div class="item receita">
          <i class="fa-solid fa-file-invoice-dollar fa-4x"></i>
          <div class="content_container">
            <h3>Receita de vendas</h3>
            <span class="text">R$ <?=number_format($total, 2, ',', '.')?></span>

          </div>
        </div>
        <div class="item">
          <i class="fa-solid fa-basket-shopping fa-4x"></i>
          <div class="content_container">
            <h3>Produtos Vendidos</h3>
            <span class="text"><?=$productSale['quantidade']?></span>
          </div>
        </div>
        <div class="item">
          <i class="fa-solid fa-hand-holding-dollar fa-4x"></i>
          <div class="content_container">
            <h3>Lucro</h3>
            <span class="text">R$ <?=number_format($profit, 2, ',', '.')?></span>
          </div>
        </div>
        <div class="item">
          <i class="fa-solid fa-store fa-4x"></i>
          <div class="content_container">
            <h3>Total de Vendas</h3>
            <span class="text"><?=$salesCount['quantidade']?></span>
          </div>
        </div>
    </div>
  </div>

  <script src="<?=$base?>/assets/script/modify.js"></script>
</body>


</html>