const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');

// check local storage to see if the last form submitted was register
if (localStorage.getItem('lastFormSubmitted') === 'register') {
  wrapper.classList.add('active');
} 

registerLink.addEventListener('click', ()=> {
  wrapper.classList.add('active');
  localStorage.setItem('lastFormSubmitted', 'register');
});

loginLink.addEventListener('click', ()=> {
  wrapper.classList.remove('active');
  localStorage.setItem('lastFormSubmitted', 'login');
});
