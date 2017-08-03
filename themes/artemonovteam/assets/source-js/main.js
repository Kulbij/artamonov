$(document).ready( function () {
    //validate init
    $("form").validate();


    $("input.phone-mask").mask("+38(999)999-9999");

    $('.button-nav').on('click', function () {
        $('.humburger').toggleClass('show-hide');

    });

    $(".button-in-item").on('click', function () {
        $('.modal').css('display', 'none');
        $('.wrapper').css('overflow', 'hidden');
        $('.modal-in-item').css('display', 'flex').animate({opacity: 1}, 500);
    });

    $(".button-in").on('click', function () {
        $('.modal').css('display', 'none');
        $('.wrapper').css('overflow', 'hidden');
        $('.modal-in').css('display', 'flex').animate({opacity: 1}, 500);
    });

    $("body").on("click", '.button-reg', function() {
        $('.modal').css('display', 'none');
        $('.wrapper').css('overflow', 'hidden');
        $('.modal-reg').css('display', 'flex').animate({opacity: 1}, 500);
    });


    $(".button-cat").on('click', function () {
        $('.modal').css('display', 'none');
        $('.wrapper').css('overflow', 'hidden');
        $('.modal-cat').css('display', 'flex').animate({opacity: 1}, 500);
    });

    $("body").on("click", '.button-prog', function(){
        $('.modal').css('display', 'none');
        $('.wrapper').css('overflow', 'hidden');
        $('.modal-prog').css('display', 'flex').animate({opacity: 1}, 500);
    });

    $("body").on("click", '.button-callback', function() {
        $('.modal').css('display', 'none');
        $('.wrapper').css('overflow', 'hidden');
        $('.modal-callback').css('display', 'flex').animate({opacity: 1}, 500);
    });
    $(".button-change-contact").on('click', function () {
        $('.modal').css('display', 'none');
        $('.wrapper').css('overflow', 'hidden');
        $('.modal-change-contact').css('display', 'flex').animate({opacity: 1}, 500);
    });


    $('body').on('click', '.close', function () {
        $('.modal').css('display', 'none');
        $('.wrapper').css('overflow', 'auto');
    });

});


