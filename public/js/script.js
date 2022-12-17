const roll = document.querySelector(".roll");
const save = document.querySelector(".save");
const total = document.querySelector(".total");
const dice = document.querySelector(".dice");

let sum = 0;
let random;

roll.addEventListener("click", rollFunction);

function rollFunction() {
    random = Math.ceil(Math.random() * 6);
    dice.setAttribute("src", `./public/imgs/${random}.svg`);
    if (random == 1) {
        sum = 0;
    }
    else {
        sum += random;
    }
    total.textContent = sum;
}

save.addEventListener("click", saveFunction);

function saveFunction() {
    let req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.status == 100 && req.readyState == 2) {
            console.log(req.response);
        }
    }
    req.open("POST", "/Dice-game/index.php");
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req.send(`score=${total.textContent}`);
}