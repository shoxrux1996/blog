jQuery(document).ready(function($){
    $('.crsl-items').carousel({ overflow: true, visible: 5, itemMinWidth: 200, itemMargin: 20 });
    $('.crsl-items').on('initCarousel', function(event, defaults, obj){
        // Hide controls
        $('#'+defaults.navigation).find('.previous, .next').css({ opacity: 0 });
        // Show controls on gallery hover
        // #gallery-07 wraps .crsl-items and .crls-nav
        // .stop() prevent queue
        $('#gallery').hover( function(){
            $(this).find('.previous').css({ left: 0 }).stop(true, true).animate({ left: '20px', opacity: 1 });
            $(this).find('.next').css({ right: 0 }).stop(true, true).animate({ right: '20px', opacity: 1 });
        }, function(){
            $(this).find('.previous').animate({ left: 0, opacity: 0 });
            $(this).find('.next').animate({ right: 0, opacity: 0 });
        });
    });

    $('#free-price,#cost-price').change(function () {
        if($('#free-price').is(':checked')){
            $('#phone-call-price').hide();
        }
        else{
            $('#phone-call-price').show();
        }
    }).filter('#order-call');

    $('#paid-questions').click(function () {
        $('#paid-questions').removeClass('not-active');
        $('#paid-questions').addClass('active');
        $('#paid-question-block').removeClass('hidden');
        $('#free-questions').removeClass('active');
        $('#free-questions').addClass('not-active');
        $('#free-question-block').addClass('hidden');
    }).filter('#questions-section');

    $('#free-questions').click(function () {
        $('#free-questions').removeClass('not-active');
        $('#free-questions').addClass('active');
        $('#free-question-block').removeClass('hidden');
        $('#paid-questions').removeClass('active');
        $('#paid-questions').addClass('not-active');
        $('#paid-question-block').addClass('hidden');
    }).filter('#questions-section');

    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).attr('href');
        $(index).siblings('.active').removeClass("active");
        $(index).addClass("active");
    });

    $('.price-table .package').click(function () {
        $(this).children('input').prop('checked', true);
    });

    //404.html page script
    $('.comment-list .row').hide();
    var childrens = $('.comment-list').children('.row');
    childrens.each(function (i) {
        $(this).delay(2000 * i).fadeIn(2000);
    });

    // ===== Scroll to Top ====
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
            $('#return-to-top').fadeIn(200);    // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200);   // Else fade out the arrow
        }
    });
    $('#return-to-top').click(function() {      // When arrow is clicked
        $('body,html').animate({
            scrollTop : 0                       // Scroll to top of body
        }, 500);
    });
});