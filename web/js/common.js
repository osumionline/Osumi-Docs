(function(){
	var btnMenu = null;
	var btnLanguage = null;
	var menu = null;
	var overlay = null;
	var languageSelector = null;
	var menuOpen = false;
	var languageOpen = false;
	window.onload = startBindings;

	function startBindings() {
		btnMenu = document.querySelector('#menu-btn');
		btnMenu.addEventListener('click', openMenu);
		btnLanguage = document.querySelector('#language-btn');
		btnLanguage.addEventListener('click', openLanguage);
		overlay = document.querySelector('#overlay');
		overlay.addEventListener('click', closeOverlay);

		const photos = document.querySelectorAll('.image-item');
		photos.forEach((item) => item.addEventListener('click', openPhoto));
		window.addEventListener('keyup', closePhotoKeyboard);

		menu = document.querySelector('aside');
		languageSelector = document.querySelector('.language-selector-sm');
	}

	function openMenu() {
		if (!menuOpen) {
			btnMenu.classList.add('pressed');
			menu.classList.add('open');
			menuOpen = true;
		}
		else {
			btnMenu.classList.remove('pressed');
			menu.classList.remove('open');
			menuOpen =  false;
		}
		openOverlay();
	}

	function openLanguage() {
		if (!languageOpen) {
			btnLanguage.classList.add('pressed');
			languageSelector.classList.add('open');
			languageOpen = true;
		}
		else {
			btnLanguage.classList.remove('pressed');
			languageSelector.classList.remove('open');
			languageOpen = false;
		}
		openOverlay();
	}

	function openOverlay() {
		if (!menuOpen && !languageOpen) {
			overlay.classList.remove('open');
		}
		else {
			overlay.classList.add('open');
		}
	}

	function closeOverlay() {
		if (menuOpen) {
			btnMenu.classList.remove('pressed');
			menu.classList.remove('open');
			menuOpen =  false;
		}
		if (languageOpen) {
			btnLanguage.classList.remove('pressed');
			languageSelector.classList.remove('open');
			languageOpen = false;
		}
		overlay.classList.remove('open');
	}

	function getPhotoContainer() {
		let photoContainer = document.querySelector('#photo-container');
		if (!photoContainer) {
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

	function openPhoto(item) {
		const photoContainer = getPhotoContainer();
		document.getElementById('full-photo-image').src = item.target.src;
		document.getElementById('full-photo-name').innerHTML = item.target.title;
		photoContainer.classList.add('full-photo-show');
	}

	function closePhoto() {
		const photoContainer = getPhotoContainer();
		photoContainer.classList.remove('full-photo-show');
	}

	function closePhotoKeyboard(ev) {
		if (ev.keyCode==27) {
			let photoContainer = document.querySelector('#photo-container');
			if (photoContainer) {
				closePhoto();
			}
		}
	}
})();