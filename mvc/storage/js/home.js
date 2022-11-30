
// --------menu header---------------------
let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
};


// -----------search-form header---------------

let searchForm = document.querySelector('.search_form');

document.querySelector('#icon_search').onclick = () => {
    searchForm.classList.add('active2');
}

document.querySelector('#close_search').onclick = () => {
    searchForm.classList.remove('active2');
}


document.querySelectorAll('.image-slider img').forEach(images => {
    images.onclick = () => {
        var src = images.getAttribute('src');
        document.querySelector('.main-home-image').src = src;
    };
});

// ----------------------------------------------


$('.slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    lazyLoad: 'ondemand',
    autoplaySpeed: 2000,
    prevArrow: '<button type="button" class="slick-prev"><span class="text-2xl">&#10094;</span></button>',
    nextArrow: '<button type="button" class="slick-next"><span class="text-2xl">&#10095;</span></button>',
    responsive: [{

        breakpoint: 1400,
        settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
            infinite: true,
            dots: true
        }
    },
    { 
        breakpoint: 1300,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 3
        }
    },
     {
        breakpoint: 1024,
        settings: {
            slidesToShow: 2,
            slidesToScroll:2
        }
    },
    {
        breakpoint: 660,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});

$('.slider_banner').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: '<button type="button" class="slick-prev" style="left: 3%; top: 50%;"> <span class="prev">&#10094;</span>  </button>',
    nextArrow: '<button type="button" class="slick-next"style=" right: 5%; top: 50%;" ><span class="prev">&#10095;</span> </button>',

});






// ------------------------------------------------------------
// var slideIndex = 1;
// showSlides(slideIndex);

// function plusSlides(n) {
//     showSlides(slideIndex += n);
// }

// function currentSlide(n) {
//     showSlides(slideIndex = n);
// }

// function showSlides(n) {
//     var i;
//     var slides = document.getElementsByClassName("mySlides");
//     var dots = document.getElementsByClassName("dot");
//     if (n > slides.length) {
//         slideIndex = 1
//     }
//     if (n < 1) {
//         slideIndex = slides.length
//     }
//     for (i = 0; i < slides.length; i++) {
//         slides[i].style.display = "none";
//     }
//     for (i = 0; i < dots.length; i++) {
//         dots[i].className = dots[i].className.replace(" active", "");
//     }
//     slides[slideIndex - 1].style.display = "block";
//     dots[slideIndex - 1].className += " active";
// }


