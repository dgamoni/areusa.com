$(document).ready(function() {
    function scrollToElement(element, offset) {
        $(element).click(function (e) {
            var elementClick = $(this).attr("href");
            var destination = $(elementClick).offset().top;
            if (destination < 0) {
                destination = 0;
            }
            $('html, body').animate({scrollTop: destination - offset}, "slow");
            e.preventDefault();
        });
    };
    scrollToElement("a[href='#formSection']", 0);
    scrollToElement("a[href='#reports']", 0);
    $('.burger').click(function () {
        $(this).toggleClass('active');
        $('header .menu').slideToggle();
    })
    $('header .menu li.menu-item-has-children > a').click(function () {
        $(this).parent().toggleClass('active')
        $(this).siblings().slideToggle();
    })
    $('header .menu .menu-item-has-children a span').click(function(e){
        e.preventDefault();
    })
});