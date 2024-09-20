function enterFullscreen() {
    const element = document.documentElement;

    if (element.requestFullscreen) {
        element.requestFullscreen();
    } else if (element.mozRequestFullScreen) {
        // Firefox
        element.mozRequestFullScreen();
    } else if (element.webkitRequestFullscreen) {
        // Chrome, Safari, and Opera
        element.webkitRequestFullscreen();
    } else if (element.msRequestFullscreen) {
        // IE/Edge
        element.msRequestFullscreen();
    }
}

// Check screen size and request fullscreen on user interaction
window.addEventListener("load", function () {
    if (window.innerWidth <= 650) {
        document.addEventListener("click", enterFullscreen);
        document.addEventListener("touchstart", enterFullscreen);
    }
});

// Handle fullscreen change events
document.addEventListener("fullscreenchange", function () {
    if (!document.fullscreenElement) {
        console.log("");
    }
});

document.addEventListener("webkitfullscreenchange", function () {
    if (!document.webkitFullscreenElement) {
        console.log("");
    }
});

document.addEventListener("mozfullscreenchange", function () {
    if (!document.mozFullScreenElement) {
        console.log("");
    }
});

document.addEventListener("MSFullscreenChange", function () {
    if (!document.msFullscreenElement) {
        console.log("");
    }
});
