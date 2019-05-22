(function(){
  window.onload = startBindings;

  function startBindings(){
    document.querySelector('#menu-btn').addEventListener('click', openMenu);
    document.querySelector('#language-btn').addEventListener('click', openLanguage);
    const photos = document.querySelectorAll('.image-item');
    photos.forEach((item) => item.addEventListener('click', openPhoto));
    window.addEventListener('keyup', closePhotoKeyboard);
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

  function getPhotoContainer(){
    let photoContainer = document.querySelector('#photo-container');
    if (!photoContainer){
      photoContainer = document.createElement('div');
      photoContainer.id = 'photo-container';
      photoContainer.addEventListener('click', closePhoto);

      let imageContainer = document.createElement('div');
      imageContainer.classList.add('full-image-container');

      let image = document.createElement('img');
      image.id = 'full-photo-image';
      imageContainer.appendChild(image);
      photoContainer.appendChild(imageContainer);

      let banner = document.createElement('div');
      banner.classList.add('full-image-banner');
      banner.id = 'full-photo-name';
      photoContainer.appendChild(banner);

      document.body.appendChild(photoContainer);
    }
    return photoContainer;
  }

  function openPhoto(item){
    const photoContainer = getPhotoContainer();
    document.getElementById('full-photo-image').src = item.target.src;
    document.getElementById('full-photo-name').innerHTML = item.target.title;
    photoContainer.classList.add('full-photo-show');
  }

  function closePhoto(){
    const photoContainer = getPhotoContainer();
    photoContainer.classList.remove('full-photo-show');
  }

  function closePhotoKeyboard(ev){
    if (ev.keyCode==27){
      let photoContainer = document.querySelector('#photo-container');
      if (photoContainer){
        closePhoto();
      }
    }
  }
})();