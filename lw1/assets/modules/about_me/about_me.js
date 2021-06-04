import './about_me.css';
import './components/slider/slider.js';
import { prevSlide } from "./components/slider/slider";
import { nextSlide } from "./components/slider/slider";
import { rewindX } from "./components/slider/slider";

let slideInterval = 2000;

$('#next-btn').click(nextSlide);

$('#prev-btn').click(prevSlide);

$('.slide-nav-btn').click(rewindX);

$(document).ready(function () {
    let switchInterval = setInterval(nextSlide, slideInterval);

    $('#prev-next-btns').hover(function(){
        clearInterval(switchInterval);
    },function() {
        switchInterval = setInterval(nextSlide, slideInterval);
    });
});