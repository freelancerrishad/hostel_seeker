document.getElementById('signup').addEventListener('click',function(){
  document.querySelector('.overlay').style.display = 'flex';
});

document.querySelector('.close-btn').addEventListener('click',function(){
  document.querySelector('.overlay').style.display = 'none';
});

document.getElementById('login').addEventListener('click',function(){
  document.querySelector('.option').style.display = 'flex';
});

document.querySelector('.close-btn1').addEventListener('click',function(){
  document.querySelector('.option').style.display = 'none';
});