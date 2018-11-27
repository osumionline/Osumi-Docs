(function(){
  window.onload = startBindings;

  function startBindings(){
    document.querySelector('#menu-btn').addEventListener('click', openMenu);
    document.querySelector('#language-btn').addEventListener('click', openLanguage);
  }

  function openMenu(){
    const btn = document.querySelector('#menu-btn');
    const menu = document.querySelector('aside');
    if (!btn.classList.contains('pressed')){
      btn.classList.add('pressed');
      menu.classList.add('open');
    }
    else{
      btn.classList.remove('pressed');
      menu.classList.remove('open');
    }
  }

  function openLanguage(){
    const btn = document.querySelector('#language-btn');
    const languageSelector = document.querySelector('.language-selector-sm');
    if (!btn.classList.contains('pressed')){
      btn.classList.add('pressed');
      languageSelector.classList.add('open');
    }
    else{
      btn.classList.remove('pressed');
      languageSelector.classList.remove('open');
    }
  }
})();
