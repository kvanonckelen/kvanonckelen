import './bootstrap';

AOS.init({
    duration: 1000,
    once: false,
  });

window.onload = function () {
    setTimeout(function () {
      document.getElementById('loading-screen').style.opacity = '0';
      setTimeout(function () {
        document.getElementById('loading-screen').style.display = 'none';
      }, 500);
    }, 1000);
};