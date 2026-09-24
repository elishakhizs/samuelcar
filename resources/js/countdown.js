document.addEventListener("DOMContentLoaded", function () {

    // 👉 Set your target date here
    const targetDate = new Date("2026-06-31T23:59:59").getTime();

    const countdownElement = document.getElementById("countdown");

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = targetDate - now;

        if (distance <= 0) {
            countdownElement.innerHTML = "EXPIRED";
            clearInterval(interval);
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        countdownElement.innerHTML = `
            <div class="time-box">
                <span>${days}</span>
                <small>Days</small>
            </div>
            <div class="time-box">
                <span>${hours}</span>
                <small>Hours</small>
            </div>
            <div class="time-box">
                <span>${minutes}</span>
                <small>Minutes</small>
            </div>
            <div class="time-box">
                <span>${seconds}</span>
                <small>Seconds</small>
            </div>
        `;
    }

    updateCountdown(); // Run once immediately
    const interval = setInterval(updateCountdown, 1000);
});

//this is the button that on clicks show the paragraph
document.addEventListener("DOMContentLoaded", function () {

    const button = document.getElementById("toggleButton");
    const paragraph = document.getElementById("paragraph");

    button.addEventListener("click", function () {

        if (paragraph.style.display === "none" || paragraph.style.display === "") {
            paragraph.style.display = "block";
        } else {
            paragraph.style.display = "none";
        }

    });

});

document.addEventListener("DOMContentLoaded", function () {

    const button = document.getElementById("toggleButton2");
    const paragraph2 = document.getElementById("paragraph2");

    button.addEventListener("click", function () {

        if (paragraph2.style.display === "none" || paragraph2.style.display === "") {
            paragraph2.style.display = "block";
        } else {
            paragraph2.style.display = "none";
        }

    });

});

document.addEventListener("DOMContentLoaded", function () {

    const button = document.getElementById("toggleButton3");
    const paragraph3 = document.getElementById("paragraph3");

    button.addEventListener("click", function () {

        if (paragraph3.style.display === "none" || paragraph3.style.display === "") {
            paragraph3.style.display = "block";
        } else {
            paragraph3.style.display = "none";
        }

    });

});

    setTimeout(() => {
        document.querySelectorAll('.popup-success, .popup-error')
            .forEach(el => el.style.display = 'none');
    }, 3000);


let correctAnswer = "Abuja";
let submitBtn = document.getElementById("submitBtn");




const slider = document.getElementById("slider");
const slides = document.querySelectorAll(".slide");

let index = 0;
let startX = 0;
let endX = 0;

function updateSlider() {
    slider.style.transform = `translateX(-${index * 100}%)`;
}

setInterval(() => {
    index = (index + 1) % slides.length;
    updateSlider();
}, 3000);

slider.addEventListener("touchstart", (e) => {
    startX = e.touches[0].clientX;
});

slider.addEventListener("touchend", (e) => {
    endX = e.changedTouches[0].clientX;

    let diff = startX - endX;

    if (diff > 50) {
        index = (index + 1) % slides.length;
    } else if (diff < -50) {
        index = (index - 1 + slides.length) % slides.length;
    }

    updateSlider();
});

// this is the front slider for the home page, it is a simple slider that changes every 3 seconds and also allows the user to swipe left or right to change the slide.

const sliderr = document.getElementById("heroSlider");
const slidess = document.querySelectorAll(".hero-slide");

let indexx = 0;
let startXx = 0;
let endXx = 0;

function updateHero() {
    sliderr.style.transform = `translateX(-${indexx * 100}%)`;
}

// 🔥 Auto slide
setInterval(() => {
    indexx = (indexx + 1) % slidess.length;
    updateHero();
}, 7000);

// 🔥 Swipe support
sliderr.addEventListener("touchstart", (e) => {
    startXx = e.touches[0].clientX;
});

sliderr.addEventListener("touchend", (e) => {
    endXx = e.changedTouches[0].clientX;
    let diff = startXx - endXx;

    if (diff > 50) {
        indexx = (indexx + 1) % slidess.length;
    } else if (diff < -50) {
        indexx = (indexx - 1 + slidess.length) % slidess.length;
    }

    updateHero();
});
