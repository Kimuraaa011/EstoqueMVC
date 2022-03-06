

document.getElementById('searchInput').addEventListener('input', (Search) => {
  input = document.querySelector('input').value;
  getName = document.querySelectorAll('.search');
  row = document.querySelectorAll('tr');
  tamanho = row.length;
  for(let i = 1; i < tamanho; i++){
    if(input == ""){
      row[i].classList.remove('delete');
    }else{
      if(getName[i-1].innerHTML.toUpperCase().indexOf(input.toUpperCase()) === -1){

        row[i].classList.add('delete');
  
      }else{
        row[i].classList.remove('delete');
      }
    }

  } 

});
