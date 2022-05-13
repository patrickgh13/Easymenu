$(document).foundation()
$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
    rtl:true,
    loop:false,
    autoWidth:true,
    margin:10,
    dots:false,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:5
        },
        1000:{
            items:5
        }
    }
  })
})
jQuery(document).ready(function($) {

$('.product-type-simple').each(function() {
  if ($(this).find('.rednaoWooRow').length) {
   $(this).addClass('additional');
  }
 });

$('.post-type-archive-product .product.type-product').each(function() {
  var theProductID = $(this).attr('id');
  $(this).find('.rnTextFieldInput > div').each(function(index) {
    $(this).find('input').attr('id', 'field-' + theProductID + '-' + index);
    $(this).find('input').attr('name', 'field-' + theProductID + '-' + index);
    $(this).find('label').attr('for', 'field-' + theProductID + '-' + index);
  });
});

 $('.rnTextFieldInput > div > input[type=checkbox]').after('<span class="checkmark"></span>');
 $('.rnTextFieldInput > div > input[type=radio]').after('<span class="radio-checkmark"></span>');
});


// external js: isotope.pkgd.js

// init Isotope
var $grid = $('.products').isotope({
});


// filter functions
var filterFns = {

};
// bind filter button click
$('.filters-button-group').on( 'click', 'button', function() {
  var filterValue = $( this ).attr('data-filter');
  // use filterFn if matches value
  filterValue = filterFns[ filterValue ] || filterValue;
  $grid.isotope({ filter: filterValue });
});
// change is-checked class on buttons
$('.button-group').each( function( i, buttonGroup ) {
  var $buttonGroup = $( buttonGroup );
  $buttonGroup.on( 'click', 'button', function() {
    $buttonGroup.find('.is-checked').removeClass('is-checked');
    $( this ).addClass('is-checked');
  });
});

//Mobile Menu
    $('.burger').on('click', function () {
        $(this).toggleClass('open');
        $('#mob-menu').toggleClass('open');
        $('html, body').toggleClass('freeze');
    })
