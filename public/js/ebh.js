$(document).ready(function () {
    $("nav ul li a[href^='#']").on('click', function(e) {

        // prevent default anchor click behavior
        e.preventDefault();
        // store hash
        var hash = this.hash;

        // animate
        $('body').animate({
            scrollTop: $(hash).offset().top
        }, 600, function(){

            // when done, add hash to url
            // (default click behaviour)
            window.location.hash = hash;
        });
    });
});
