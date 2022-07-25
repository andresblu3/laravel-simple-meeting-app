import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// --------------------------------

var del_alert = document.querySelectorAll('.del_alert');
  del_alert.forEach((alert) =>
    alert.addEventListener('click', function () {
      alert.parentElement.classList.add('hidden');
    })
  );