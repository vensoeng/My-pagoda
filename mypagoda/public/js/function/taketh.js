function taketh_ID(id, Class = ".web-form", activeClass = "web-form-active") {
    var eClass = document.querySelectorAll(Class);
    var eID = document.querySelector(id);
    eClass.forEach((e) => {
        e.classList.remove(activeClass);
    });
    eID.classList.toggle(activeClass);
}
function toggleClass(manClass, activeCalss = "web-form-active") {
    document.querySelector(manClass).classList.toggle(activeCalss);
}
