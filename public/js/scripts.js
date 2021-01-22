$(document).ready(function(){
    $('.miembros-container').slick({
      dots: true,
      slidesToShow: 2,
      speed: 300,
      arrow: false,
      slidesToScroll: 1,
      responsive:[
          {
              breakpoint: 770,
              settings: {
                slidesToShow:1,
              }
          }
      ]
    });
  });