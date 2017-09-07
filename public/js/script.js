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
    $('[data-toggle="tooltip"]').tooltip();
});