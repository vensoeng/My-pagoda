const currentDate = new Date();
const year = currentDate.getFullYear();
const month = currentDate.getMonth() + 1;
const day = currentDate.getDate();
const khmerMonth = [
    "មករា",
    "កុម្ភៈ",
    "មិនា",
    "មេសា",
    "ឧសភា",
    "មិថុនា",
    "កក្កដា",
    "សីហា",
    "កញ្ញា",
    "តុលា",
    "វិច្ឆិកា",
    "ធ្នូ",
];
function chang_English_num_to_Khmer(string) {
    // ផ្លាសបប្ដូរលេខពីអង់គ្លេស ទៅ ខ្មែរ
    let kh;
    const array = string.toString().split("");
    const khmerNumbers = [
        { N: "0", k: "០" },
        { N: "1", k: "១" },
        { N: "2", k: "២" },
        { N: "3", k: "៣" },
        { N: "4", k: "៤" },
        { N: "5", k: "៥" },
        { N: "6", k: "៦" },
        { N: "7", k: "៧" },
        { N: "8", k: "៨" },
        { N: "9", k: "៩" },
    ];

    const caughtNumbers = [];

    for (const number of array) {
        for (const khmerNumber of khmerNumbers) {
            if (number === khmerNumber.N) {
                caughtNumbers.push(khmerNumber.k);
            }
        }
    }
    kh = caughtNumbers.join("");
    return kh;
}
var fulldate = `ថ្ងៃទី${chang_English_num_to_Khmer(day)} ខែ${
    khmerMonth[month]
} ឆ្នាំ${chang_English_num_to_Khmer(year)}`;
document.addEventListener("DOMContentLoaded", function () {
    if (document.querySelectorAll(".taget_date") !== undefined) {
        var taget_date = document.querySelectorAll(".taget_date");
        taget_date.forEach((e) => {
            e.innerText = fulldate;
        });
    }
    if (document.querySelectorAll(".change_text") !== undefined) {
        var change_text = document.querySelectorAll(".change_text");
        change_text.forEach((e) => {
            var getText = chang_English_num_to_Khmer(e.innerText);
            e.innerText = getText;
        });
    }
});
