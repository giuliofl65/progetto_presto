
const toggle = document.getElementById('toggleDark');
const body = document.querySelector('body');
const navbar = document.querySelector('nav');
const footer = document.querySelector('footer');

toggle.addEventListener('click', function(){
  this.classList.toggle('bi-moon');
  if(this.classList.contains('bi-moon')) {
    body.style.background = '#202020';
    body.style.color = 'white';
    navbar.style.backgroundColor = '#333';
    footer.style.backgroundColor = '#333';
    navbar.style.color = 'white';
    footer.style.color = 'white';
    document.querySelectorAll('*').forEach((element) => {
      element.style.color = 'white';
    });
  } else {
    body.style.background = 'white';
    body.style.color = 'black';
    navbar.style.backgroundColor = '';
    footer.style.backgroundColor = '';
    navbar.style.color = '';
    footer.style.color = '';
    document.querySelectorAll('*').forEach((element) => {
        element.style.color = '';

    });
  }
  body.style.transition = '0.3s';
});
