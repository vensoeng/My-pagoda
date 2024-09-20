function previewImage(
    event,
    inputElement,
    boxImg = ".soeng_book",
    getFileName = false,
    titleClass = ""
) {
    var ShowImg = document.querySelectorAll(boxImg);

    if (inputElement.files && inputElement.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            const img = new Image();
            img.src = e.target.result;

            img.onload = function () {
                const canvas = document.createElement("canvas");
                const ctx = canvas.getContext("2d");

                const maxWidth = 800;
                const maxHeight = 600;
                let width = img.width;
                let height = img.height;

                if (width > height) {
                    if (width > maxWidth) {
                        height *= maxWidth / width;
                        width = maxWidth;
                    }
                } else {
                    if (height > maxHeight) {
                        width *= maxHeight / height;
                        height = maxHeight;
                    }
                }

                const resizeAndCompress = (quality) => {
                    canvas.width = width;
                    canvas.height = height;
                    ctx.drawImage(img, 0, 0, width, height);

                    return pica()
                        .resize(canvas, canvas)
                        .then((result) =>
                            pica().toBlob(result, "image/jpeg", quality)
                        )
                        .then((blob) => {
                            if (blob.size <= 100 * 1024) {
                                // 100KB
                                const url = URL.createObjectURL(blob);
                                ShowImg.forEach((element) => {
                                    element.querySelector("img").src = url;
                                    element.classList.add(
                                        "txt-photo-box-active"
                                    );
                                });
                                if (getFileName !== false) {
                                    if (titleClass !== "") {
                                        var titleElement =
                                            document.querySelectorAll(
                                                titleClass
                                            );
                                        titleElement.forEach((element) => {
                                            var fileName =
                                                inputElement.files[0];
                                            element.value = fileName.name
                                                .split(".")
                                                .slice(0, -1)
                                                .join(".");
                                        });
                                    }
                                }

                                // Convert blob to file and set it to the form
                                const resizedFile = new File(
                                    [blob],
                                    inputElement.files[0].name,
                                    {
                                        type: "image/jpeg",
                                        lastModified: Date.now(),
                                    }
                                );

                                const dataTransfer = new DataTransfer();
                                dataTransfer.items.add(resizedFile);
                                inputElement.files = dataTransfer.files;
                            } else {
                                // If the size is greater than 100KB, reduce the quality and try again
                                resizeAndCompress(quality - 0.1);
                            }
                        });
                };

                resizeAndCompress(0.7); // Start with a quality of 0.7
            };
        };

        reader.readAsDataURL(inputElement.files[0]);
    } else {
        ShowImg.forEach((element) => {
            element.querySelector("img").src = "#";
            element.classList.remove("txt-photo-box-active");
        });
        if (getFileName !== false) {
            if (titleClass !== "") {
                var titleElement = document.querySelectorAll(titleClass);
                titleElement.forEach((element) => {
                    element.value = "";
                });
            }
        }
    }
}
