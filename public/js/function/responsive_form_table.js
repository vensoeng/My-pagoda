document.addEventListener("DOMContentLoaded", function () {
    function setTabelFormHeight(
        tagetClass = ".web-section-body > .box",
        headeCalss = ".web-header",
        contentHeaderClass = ".web-nav"
    ) {
        var sceen_height = window.innerHeight;
        var hearde = document.querySelector(headeCalss).offsetHeight;
        var contentHeader =
            document.querySelector(contentHeaderClass).offsetHeight;

        document.querySelector(tagetClass).style.height =
            sceen_height - (hearde + contentHeader) + "px";
    }
    // Set initial heights
    setTabelFormHeight();
    // Listen for window resize
    window.addEventListener("resize", setTabelFormHeight);
});
