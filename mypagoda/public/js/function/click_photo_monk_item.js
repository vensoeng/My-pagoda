var user_data = document.querySelector(".user_photo_data");
var photo_item_datas = document.querySelectorAll(".user_photo_data li");
var bg_photo_item_datas = document.querySelectorAll(
    ".user_photo_data li .bg-item"
);
bg_photo_item_datas.forEach((e, i) => {
    e.addEventListener("click", function () {
        var li_content = photo_item_datas[i].innerHTML;
        var li = document.createElement("li");
        li.classList.add("item-active");
        li.innerHTML = li_content;
        user_data.appendChild(li);

        var box_content = li.querySelector(".box-content");
        box_content.insertBefore(
            box_content.querySelector(".user-profile-sm"),
            box_content.children[0]
        );
        document.body.classList.toggle("body-form-active");

        li.querySelector(".box > .btn-close").addEventListener(
            "click",
            function () {
                li.remove();
                document.body.classList.toggle("body-form-active");
            }
        );
        li.querySelector(".bg-item").addEventListener("click", function () {
            li.remove();
            document.body.classList.toggle("body-form-active");
        });
    });
});
