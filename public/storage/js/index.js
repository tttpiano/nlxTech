

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

let lengthItems = items.length - 1;
let active = 0;
