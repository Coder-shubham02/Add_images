
function toggleFullScreen(img) {
    var fullscreenImg = document.createElement('img');
    fullscreenImg.src = img.src;
    fullscreenImg.classList.add('fullscreen-img');
    fullscreenImg.onclick = function() {
        document.body.removeChild(fullscreenImg);
    };
    document.body.appendChild(fullscreenImg);
}
