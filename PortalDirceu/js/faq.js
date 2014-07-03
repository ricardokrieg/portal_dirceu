$(document).ready(function(){
    $('#faq').on('show.bs.collapse', function(e){
        $(e.target).parent().find('h4 a').addClass('open');
    });

    $('#faq').on('hide.bs.collapse', function(e){
        $(e.target).parent().find('h4 a').removeClass('open');
    });

    $('.navbar-collapse').on('show.bs.collapse', function(e){
        $('.da-slider').hide();
        $('.slide-shadow').hide();
    });

    $('.navbar-collapse').on('hide.bs.collapse', function(e){
        $('.da-slider').show();
        $('.slide-shadow').show();
    });

    var hash = window.location.hash;
    $('input[type=radio][value="'+ hash.substring(1) +'"]').attr('checked', true);
});
