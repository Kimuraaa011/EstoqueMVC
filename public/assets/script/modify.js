function closeMenu(){

  left_side = document.querySelector('.left_side');
  left_side.style.display  = 'none';
  document.querySelector('.menu').style.display = 'block';

 }


function openMenu(){
  document.querySelector('.left_side').style.display = 'flex';
  document.querySelector('.menu').style.display = 'none';
}


window.addEventListener('resize', (search) => {
  if(window.outerWidth < 1010){
    closeMenu();
  }


});