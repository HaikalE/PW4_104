const btn = document.getElementById('signup-tab');

btn.addEventListener('click', () => {
  console.log('CLICKED');
  
  const masuk = document.getElementById('logind');
  masuk.style.display = 'none';
  const masuk1 = document.getElementById('signupd');
  masuk1.style.display = '';
  const masuk0 = document.getElementById('forgotnd');
  masuk0.style.display = 'none';
  const masuk2 = document.getElementById('forgotpass');
  masuk2.style.setProperty('display', 'none', 'important');
  const masuk3 = document.getElementById('myTabContent');
  masuk3.style.setProperty('display', 'none', 'important');
  const masuk5 = document.getElementById('signup');
  masuk5.style.display='';
});

const btn1 = document.getElementById('login-tab');

btn1.addEventListener('click', () => {
  console.log('BOLOGNESSE');
  const masuk = document.getElementById('logind');
  masuk.style.display = '';
  const masuk1 = document.getElementById('signupd');
  masuk1.style.display = 'none';
  const masuk2 = document.getElementById('myTabContent');
  masuk2.style.display='';
  const masuk3 = document.getElementById('forgotnd');
  masuk3.style.display = 'none';
  const masuk4 = document.getElementById('forgotpass');
  masuk4.style.setProperty('display', 'none', 'important');
  const masuk5 = document.getElementById('signup');
  masuk5.style.setProperty('display','none','important');
});

const btn2 = document.getElementById('signup2');

btn2.addEventListener('click', () => {
  console.log('AYAM GOLEK');
  document.getElementById("signup-tab").click();
});
window.onload = function() {
  document.getElementById("login-tab").click();
};

const btn4 = document.getElementById('signup3');

btn4.addEventListener('click', () => {
  console.log('AYAM GOLEK');
  document.getElementById("signup-tab").click();
});
window.onload = function() {
  document.getElementById("login-tab").click();
};

const btn3 = document.getElementById('forgot2');

btn3.addEventListener('click', () => {
  /*
  const masuk0 = document.getElementById('myTabContent');
  masuk0.style.setProperty('display', 'none', 'important');
  */
  const masuk = document.getElementById('forgotnd');
  masuk.style.display = '';
  const masuk1 = document.getElementById('forgotpass');
  //masuk1.style.setProperty('display', 'block', 'important');
  masuk1.style.display = '';
  const masuk0 = document.getElementById('logind');
  masuk0.style.display = 'none';
  const masuk2 = document.getElementById('myTabContent');
  masuk2.style.setProperty('display', 'none', 'important');
});

const btn5 = document.getElementById('signup4');

btn5.addEventListener('click', () => {
  console.log('AYAM GOLEK');
  document.getElementById("login-tab").click();
});