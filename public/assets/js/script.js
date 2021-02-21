// navbar Sticky top
var $navbar = $('.navbar');
$navbar.waypoint(function(direction){
    if(direction == 'down'){
        $navbar.addClass('fixed-top');
    }
    else {
        $navbar.removeClass('fixed-top');
    }   
})

/* Code for changing active link on clicking */ 
$(document).ready(function () {
    var url = window.location;
    $('ul.navbar-nav li.nav-item a[href="'+ url +'"]').addClass('active'); 
    $('ul.navbar-nav li.nav-item a').filter(function() {
        return this.href != url;
   }).removeClass('active');
    $('ul.navbar-nav li.nav-item a').filter(function() {
         return this.href == url;
    }).addClass('active');
});


// Go to header from bottom
$(".footer .footer-copyright .scroll-to-top-button a").on('click', function(e) {
    e.preventDefault();
    var hash = this.hash;
    $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 
     800, 
     function(){
        window.location.hash = hash;
     });
 });
 
 // owl carousel
 $(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        autoplay: true,
        autoplayHoverPause: true,
        nav: true,
        dots: false,
        loop: false,
        rewind: true,
        margin: 10,
        lazyLoad: true,
        smartSpeed: 450,
        stagePadding: 5,
        responsiveClass:true,
        responsive: {
            0: {
                items: 1,
                nav: false,
                autoplay: false,
                rewind: false,
            },
            480: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    });
  });

// Product detail image slider
const imgs = document.querySelectorAll('.img-select a');
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage(){
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);


// Show form elements based on advertisement type selection
$(document).ready(function(){
    $(".seller-type-select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});

$(document).ready(function(){
    $(".buyer-type-select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});


// Summernote
// $('#seller-general-summernote').summernote({
//     tabsize: 2,
//     height: 120,
//     toolbar: [
//       ['style', ['style']],
//       ['font', ['bold', 'underline', 'clear']],
//       ['color', ['color']],
//       ['para', ['ul', 'ol', 'paragraph']],
//       ['table', ['table']],
//     ],
// });

//   $('#seller-property-summernote').summernote({
//     tabsize: 2,
//     height: 120,
//     toolbar: [
//       ['style', ['style']],
//       ['font', ['bold', 'underline', 'clear']],
//       ['color', ['color']],
//       ['para', ['ul', 'ol', 'paragraph']],
//       ['table', ['table']],
//     ]
//   });

//   $('#seller-job-summernote').summernote({
//     tabsize: 2,
//     height: 120,
//     toolbar: [
//       ['style', ['style']],
//       ['font', ['bold', 'underline', 'clear']],
//       ['color', ['color']],
//       ['para', ['ul', 'ol', 'paragraph']],
//       ['table', ['table']],
//     ]
//   });

//   $('#buyer-general-summernote').summernote({
//     tabsize: 2,
//     height: 120,
//     toolbar: [
//       ['style', ['style']],
//       ['font', ['bold', 'underline', 'clear']],
//       ['color', ['color']],
//       ['para', ['ul', 'ol', 'paragraph']],
//       ['table', ['table']],
//     ]
//   });

//   $('#buyer-property-summernote').summernote({
//     tabsize: 2,
//     height: 120,
//     toolbar: [
//       ['style', ['style']],
//       ['font', ['bold', 'underline', 'clear']],
//       ['color', ['color']],
//       ['para', ['ul', 'ol', 'paragraph']],
//       ['table', ['table']],
//     ]
//   });

//   $('#buyer-job-summernote').summernote({
//     tabsize: 2,
//     height: 120,
//     toolbar: [
//       ['style', ['style']],
//       ['font', ['bold', 'underline', 'clear']],
//       ['color', ['color']],
//       ['para', ['ul', 'ol', 'paragraph']],
//       ['table', ['table']],
//     ]
//   });

// Success sweet alert
window.livewire.on('alert', param => {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: param['message'],
        showConfirmButton: false,
        timer: 1500
    })  
});

const SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback) => {
    Swal.fire({
        icon,
        title,
        html,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText,
        reverseButtons: true,
    }).then(result => {
        if (result.value) {
            return livewire.emit(method, params)
        }

        if (callback) {
            return livewire.emit(callback)
        }
    });
}

document.addEventListener('DOMContentLoaded', () => { 
    
    this.livewire.on('swal:confirm', data => {
        SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data.params, data.callback)
    })

})


// Clear summernote
window.livewire.on('seller-general-summernote', param => {
    $('#seller-general-summernote').summernote('code', null);
});

window.livewire.on('seller-property-summernote', param => {
    $('#seller-property-summernote').summernote('code', null);
});

window.livewire.on('seller-job-summernote', param => {
    $('#seller-job-summernote').summernote('code', null);
});

window.livewire.on('buyer-general-summernote', param => {
    $('#buyer-general-summernote').summernote('code', null);
});

window.livewire.on('buyer-property-summernote', param => {
    $('#buyer-property-summernote').summernote('code', null);
});

window.livewire.on('buyer-job-summernote', param => {
    $('#buyer-job-summernote').summernote('code', null);
});