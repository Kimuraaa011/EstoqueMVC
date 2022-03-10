document.getElementById('searchInput').addEventListener('input', (Search) => {
  input = document.querySelector('#searchInput').value;
  getName = document.querySelectorAll('.searchName');
  getDate = document.querySelectorAll('.searchDate');
  row = document.querySelectorAll('.selected tr');
  tamanho = row.length;
  for(let i = 1; i < tamanho; i++){
    if(input == ""){
      row[i].classList.remove('delete');
    }else{
      if((getName[i-1].innerHTML.toUpperCase().indexOf(input.toUpperCase()) === -1)
      && (getDate[i-1].innerHTML.indexOf(input) === -1))
      {

        row[i].classList.add('delete');
  
      }else{
        row[i].classList.remove('delete');
      }
    }

  } 

});
