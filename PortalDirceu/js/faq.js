$(document).ready(function(){
    $('#faq').on('show.bs.collapse', function(e){
        $(e.target).parent().find('h4 a').addClass('open');
    });

    $('#faq').on('hide.bs.collapse', function(e){
        $(e.target).parent().find('h4 a').removeClass('open');
    });
});
