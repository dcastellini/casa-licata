$(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop:true,
            margin:10,
            autoplay:true,
            responsive:{
                0:{
                    items:2,
                    mouseDrag: false,
                    touchDrag: true
                },
                600:{
                    items:3,
                    mouseDrag: false,
                    touchDrag: true
                },
                1000:{
                    items:5
                }
            }
        });
});