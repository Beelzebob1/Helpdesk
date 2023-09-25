document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('overzicht-btn');
    const dropdownMenu = document.getElementById('dropdown-menu');
  
    button.addEventListener('click', () => {
      button.classList.toggle('clicked');
  
      if (dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '') {
        dropdownMenu.style.display = 'flex';
      } else {
        dropdownMenu.style.display = 'none';
      }
    });
  });

