function location_go(classData, Blank = false) {
    var mainClass = document.querySelector(classData);

    if (mainClass) {
        var sonClasses = mainClass.querySelectorAll(".data-location");

        sonClasses.forEach((element) => {
            element.addEventListener("click", function () {
                var dataLocat = element.getAttribute("data-id");

                if (dataLocat) {
                    if (Blank) {
                        window.open(dataLocat, "_blank");
                    } else {
                        location.href = dataLocat;
                    }
                } else {
                    if (typeof show_infor_alert === "function") {
                        show_infor_alert("មិនអាចស្វែងរកទីតាំងឃើញ។");
                    } else {
                        console.log("Error data location");
                    }
                }
                if (Blank == true) {
                    if (dataLocat) {
                        window.open(dataLocat, "_blank");
                    }
                }
            });
        });
    } else {
        console.log("Error get Class");
    }
}
