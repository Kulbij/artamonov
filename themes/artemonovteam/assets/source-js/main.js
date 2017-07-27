$('.button-nav').on('click', function () {
    $('.humburger').toggleClass('show-hide');

});

$(document).ready(function () {

    $(".button-in-item").on('click', function () {
        $('.modal-in-item').css('display', 'flex').animate({opacity: 1}, 500);
    });

    $(".button-in").on('click', function () {
        $('.modal-in').css('display', 'flex').animate({opacity: 1}, 500);
    });

    $(".button-reg").on('click', function () {
        $('.modal-reg').css('display', 'flex').animate({opacity: 1}, 500);
    });


    $(".button-cat").on('click', function () {
        $('.modal-cat').css('display', 'flex').animate({opacity: 1}, 500);
    });




    $('body').on('click', '.close', function () {
        $('.modal').css('display', 'none');
    });

});

