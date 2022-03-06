var IdList =  [];
var quantidade = [];

document.getElementById('searchInput').addEventListener('input', (Search) => {
  input = document.querySelector('input').value;
  getName = document.querySelectorAll('.searchName');
  getId = document.querySelectorAll('.searchId');
  row = document.querySelectorAll('.selected tr');
  tamanho = row.length;
  for(let i = 1; i < tamanho; i++){
    if(input == ""){
      row[i].classList.remove('delete');
    }else{
      if((getName[i-1].innerHTML.toUpperCase().indexOf(input.toUpperCase()) === -1)
      && (getId[i-1].innerHTML.toUpperCase().indexOf(input.toUpperCase()) === -1))
      {

        row[i].classList.add('delete');
  
      }else{
        row[i].classList.remove('delete');
      }
    }

  } 

});

function selecionar(id){
  IdList.push(id);
  window.alert(IdList);
  row = document.querySelectorAll('.adicionados tr');
  getId = document.querySelectorAll('.productId');
  tamanho = row.length;
  for(let i = 1; i < tamanho; i++){
    if(IdList.indexOf(getId[i-1].innerHTML.trim()) === -1){
      row[i].classList.add("delete");
    }else{
      row[i].classList.remove("delete");
    }
  }
  if(IdList.length > 0){
    document.querySelector('.adicionados').style.display = 'table';
  }
}


function listar(){
  

}
