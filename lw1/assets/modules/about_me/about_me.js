import './about_me.css';
import './components/slider/slider.js';
import './components/update_button/update_button.js';
import {prevSlide} from "./components/slider/slider";
import {nextSlide} from "./components/slider/slider";
import {rewindX} from "./components/slider/slider";
import {bindButton, getUpdate} from "./components/update_button/update_button";

let slideInterval = 2000;

$('#next-btn').click(nextSlide);

$('#prev-btn').click(prevSlide);

$('.slide-nav-btn').click(rewindX);

$(document).ready(function () {
    let switchInterval = setInterval(nextSlide, slideInterval);

    $('#prev-next-btns').hover(function () {
        clearInterval(switchInterval);
    }, function () {
        switchInterval = setInterval(nextSlide, slideInterval);
    });

    const updateUrl = window.location.href + '/updateOne';

    bindButton('Buran', 'rockets', updateUrl);
    bindButton('ISS', 'exploration', updateUrl);
    bindButton('Space', 'space', updateUrl);
});