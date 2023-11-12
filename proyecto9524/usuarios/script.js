function toggleMenu() {
    var sidenav = document.getElementById('sidenav');
    if (sidenav.style.width === '250px') {
      closeMenu();
    } else {
      openMenu();
    }
  }
  
  function openMenu() {
    var sidenav = document.getElementById('sidenav');
    sidenav.style.width = '250px';
    document.getElementsByClassName('main-content')[0].style.marginLeft = '250px';
  }
  
  function closeMenu() {
    var sidenav = document.getElementById('sidenav');
    sidenav.style.width = '0';
    document.getElementsByClassName('main-content')[0].style.marginLeft = '0';
  }
  