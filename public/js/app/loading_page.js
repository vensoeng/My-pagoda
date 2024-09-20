function loadContent() {
    return new Promise((resolve) => {
        window.addEventListener("load", resolve);
    });
}

async function showLoadingUntilContentLoaded() {
    const body = document.body;
    const loadingScreen = document.getElementById("load-page");
    const content = document.querySelector("main");

    // Show the loading screen
    loadingScreen.style.display = "flex";
    content.style.display = "none";
    body.classList.add("over-h");

    // Wait for the content to be fully loaded
    await loadContent();

    // Hide the loading screen and show the content
    loadingScreen.remove();
    content.style.display = "block";
    body.classList.remove("over-h");
}

showLoadingUntilContentLoaded();
