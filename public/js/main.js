var url = 'http://worldnews.test';

window.addEventListener('load', function(){

    // BUSCADOR
    $('#tagsSearch').submit(function(e){
        // alert('ey');
        // e.preventDefault();
        $(this).attr('action',url+'/article/tags-search-result/'+$('#tagsSearch #search').val());
        // $(this).submit();
    });

      // Back to top button
    $(window).scroll(function() {

        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }

    });

    $('.back-to-top').click(function(){
        $('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
        return false;
    });


});
