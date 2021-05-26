import './about_me.css';
import './components/slider/slider.js';

$(document).ready(function () {
    let switchInterval = setInterval(nextSlide, slideInterval);

    $('#prev-next-btns').hover(function(){
        clearInterval(switchInterval);
    },function() {
        switchInterval = setInterval(nextSlide, slideInterval);
    });
});