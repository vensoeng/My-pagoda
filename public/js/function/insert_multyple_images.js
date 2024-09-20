function previewImage(
    event,
    inputElement,
    multipleImage = false,
    boxImg = ".soeng_book",
    getFileName = false,
    titleClass = ""
) {
    if (!multipleImage) {
        // Handle single image preview
        const reader = new FileReader();
        reader.onload = function (e) {
            const selectedImage = document.querySelector(`${boxImg} img`); // Assuming a single image element within the box
            if (selectedImage) {
                selectedImage.src = e.target.result;
                selectedImage.parentElement.classList.add(
                    "txt-photo-box-active"
                ); // Assuming class for active state
            } else {
                console.warn("No image element found within", boxImg);
            }

            // Handle filename display (if desired)
            if (getFileName) {
                const fileNameElement = document.querySelector(titleClass);
                if (fileNameElement) {
                    fileNameElement.value = inputElement.files[0].name;
                } else {
                    console.warn("No element found with class", titleClass);
                }
            }
        };
        reader.onerror = function (error) {
            console.error("Error reading image:", error);
        };
        reader.readAsDataURL(inputElement.files[0]);
    } else {
        // Handle multiple image preview (assuming you have multiple image elements within the box)
        const files = event.target.files;
        const imageContainer = document.querySelector(boxImg); // Assuming a container element for multiple images

        if (!imageContainer) {
            console.warn("No container element found with class", boxImg);
            return;
        }

        imageContainer.innerHTML = ""; // Clear existing content

        for (let i = 0; i < files.length; i++) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const newImage = document.createElement("img");
                newImage.src = e.target.result;
                imageContainer.appendChild(newImage);
            };
            reader.onerror = function (error) {
                console.error("Error reading image:", error);
            };
            reader.readAsDataURL(files[i]);
        }
    }
}
