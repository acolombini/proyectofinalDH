//ejecuta los efectos que dependen del scroll
window.onscroll = function() {
    StickyHeader()
    scrollFunction()
    barraProgreso()
};


// cambia a sticky la navbar
var header = document.getElementById("miMenu");
var sticky = header.offsetTop;
function StickyHeader() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}


//cambia el boton del menu
function toggleMenuBtn(x) {
    x.classList.toggle("change");
  }

  // agreba el boton para ir arriba cuando el scroll down es mayor a 100px
var mybutton = document.getElementById("myBtn");

function scrollFunction() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


function barraProgreso() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("myBar").style.width = scrolled + "%";
  }




  particlesJS("particles-js",
    {"particles":
        {
            "number":
                {"value":80,"density":
                    {
                        "enable":true,
                        "value_area":800
                    }
                },
            "color":
                {
                    "value":"#000000"
                },
            "shape":
                {
                    "type":"circle",
                    "stroke":
                        {
                            "width":0,
                            "color":"#000000"
                        },
                    "polygon":
                        {
                            "nb_sides":5
                        },
                    "image":
                        {
                            "src":"img/github.svg",
                            "width":100,
                            "height":100
                        }
                },
                "opacity":
                    {
                        "value":0.5,
                        "random":false,
                        "anim":
                            {
                                "enable":false,
                                "speed":1,
                                "opacity_min":0.1,
                                "sync":false
                            }
                    },
                "size":
                    {
                        "value":3,
                        "random":true,
                        "anim":
                            {
                                "enable":false,
                                "speed":40,
                                "size_min":0.1,
                                "sync":false
                            }
                    },
                    "line_linked":
                        {
                            "enable":true,
                            "distance":150,
                            "color":"#000000",
                            "opacity":0.4,
                            "width":1
                        },
                    "move":
                        {
                            "enable":true,
                            "speed":6,
                            "direction":"none",
                            "random":false,
                            "straight":false,
                            "out_mode":"out",
                            "bounce":false,
                            "attract":
                                {
                                    "enable":false,
                                    "rotateX":600,
                                    "rotateY":1200
                                }
                        }
        },
        "interactivity":
        {
            "detect_on":"canvas",
            "events":
                {
                    "onhover":
                    {
                        "enable":true,
                        "mode":"repulse"
                    },
                    "onclick":
                    {
                        "enable":true,
                        "mode":"push"
                    },
                    "resize":true
                },
            "modes":
            {
                "grab":
                    {
                        "distance":400,
                        "line_linked":
                            {
                                "opacity":1
                            }
                    },
                "bubble":
                    {
                        "distance":400,
                        "size":40,
                        "duration":2,
                        "opacity":8,
                        "speed":3
                    },
                "repulse":
                    {
                        "distance":200,
                        "duration":0.4
                    },
                "push":
                    {
                        "particles_nb":4
                    },
                "remove":
                    {
                        "particles_nb":2
                    }
            }
        },
        "retina_detect":true
    });


      $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
                nav:true
            },
            600:{
                items:3,
                nav:true
            },
            1000:{
                items:4,
                nav:true,
                loop:false
            }
        }
    })


    //search box
    function cajaBusqueda() {
        
        var x = document.getElementById("cajaBusqueda");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }




