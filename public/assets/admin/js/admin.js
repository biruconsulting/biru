(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

})(jQuery); // End of use strict


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

// Close modal
window.livewire.on('addCarouselSlider', param => {
  $('#addCarouselSlider').modal('hide');
  // Clear summernote
  $('#carousel_description').summernote('code', null);
});

window.livewire.on('addCategory', param => {
  $('#addCategory').modal('hide');
});

window.livewire.on('editCarouselSlider', param => {
  $('#editCarouselSlider').modal('hide');
  // Clear summernote
  $('#edit_carousel_description').summernote('code', null);
});


