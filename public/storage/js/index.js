
var swiper = new Swiper(".swiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 100,
        modifier: 2,
        slideShadows: true
    },
    spaceBetween: 60,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true
    },
    autoplay: {
        delay: 2000, // Change the delay to your desired value (in milliseconds)
        disableOnInteraction: false // Enable/disable autoplay on user interaction
    }
});
// let typed = new Typed('.auto-input', {
//     strings: ['Tìm kiếm tại đây...', 'Sản phẩm mới nhất của chúng tôi!', 'UI Designer!', 'Pianist!'],
//     typeSpeed: 50,
//     backSpeed: 100,
//     backDelay: 2000,
//     loop: true,
// })

var isHidden = true; // Biến để xác định trạng thái của header

var header = document.querySelector('.header__menu1');

window.addEventListener('scroll', function () {
    var currentScrollPos = document.documentElement.scrollTop;

    if (currentScrollPos >= 200 && isHidden) {
        isHidden = false;
        header.classList.add('hidden');
    } else if (currentScrollPos < 200 && !isHidden) {
        isHidden = true;
        header.classList.remove('hidden');
    }
});


var isHidden1 = true; // Biến để xác định trạng thái của header
var header1 = document.querySelector('.header__menu2');
window.addEventListener('scroll', function () {
    var currentScrollPos1 = document.documentElement.scrollTop;

    if (currentScrollPos1 >= 200 && isHidden1) {
        isHidden1 = false;
        header1.classList.add('hidden');
    } else if (currentScrollPos1 < 200 && !isHidden1) {
        isHidden1 = true;
        header1.classList.remove('hidden');
    }
});






$('.dropdown').mouseover(function () {
    $(this).find('.dropdown-menu').show();
}).mouseout(function () {
    $(this).find('.dropdown-menu').hide();
});
let slider = document.querySelector('.slider1 .list');
let items = document.querySelectorAll('.slider1 .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let dots = document.querySelectorAll('.slider1 .dots li');

let lengthItems = items.length - 1;
let active = 0;
next.onclick = function () {
    active = active + 1 <= lengthItems ? active + 1 : 0;
    reloadSlider();
}
prev.onclick = function () {
    active = active - 1 >= 0 ? active - 1 : lengthItems;
    reloadSlider();
}
let refreshInterval = setInterval(() => { next.click() }, 3000);
function reloadSlider() {
    slider.style.left = -items[active].offsetLeft + 'px';
    // 
    let last_active_dot = document.querySelector('.slider1 .dots li.active');
    last_active_dot.classList.remove('active');
    dots[active].classList.add('active');

    clearInterval(refreshInterval);
    refreshInterval = setInterval(() => { next.click() }, 3000);


}

dots.forEach((li, key) => {
    li.addEventListener('click', () => {
        active = key;
        reloadSlider();
    })
})
window.onresize = function (event) {
    reloadSlider();
};
$(document).ready(function () {
    $('.hero__categories1').hover(function () {
        $('ul.category1').slideToggle(400);
    });
});



document.querySelector('.back-to-top').addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

