$(function(){
  console.log('ready');
  var dropdownLists = $('.main-menu .dropdown');

  function toggleDropdown(_d, _m, shouldOpen){
    _m.toggleClass('show', shouldOpen);
    _d.toggleClass('show', shouldOpen);
    $('[data-toggle="dropdown"]', _d).attr('aria-expanded', shouldOpen);
    if(shouldOpen){
      dropdownLists.not(_d).filter('.show').each(function(){
        toggleDropdown( $(this), $('.dropdown-menu', $(this)), false );
      });
    }
  }
  function onDropdownClick(e){
    let _a = $(e.target),
        href = _a.attr('href');
      if(href && href.length > 1){
        window.location.href = href;
      }
  }
  function onDropdownHover (e) {
    let _d = $(e.target).closest('.dropdown'),
        _m = $('.dropdown-menu', _d);

    setTimeout(function(){
      let shouldOpen = _d.is(':hover');
      toggleDropdown(_d, _m, shouldOpen);
    }, e.type === 'mouseleave' ? 300 : 0);
  }

  dropdownLists
    .on('mouseenter mouseleave', onDropdownHover)
    .on('click', '.dropdown-toggle', onDropdownClick);
    
  if( $('#property-slider').length ){
    $('#property-slider').lightSlider({
      gallery:true,
      item:1,
      loop:true,
      thumbItem:6,
      slideMargin:0,
      enableDrag: false,
      currentPagerPosition:'left',
      onSliderLoad: function(el) {
        // el.lightGallery({
        //     selector: '#imageGallery .lslide'
        // });
      }   
    }); 
  }

  if( $('.builder-carousel').length){
    $('.builder-carousel').owlCarousel({
        //center: true,
        items:1,
        loop:true,
        margin:10,
        dots: false,
        nav: true,
    });
  }

  if( $('.testimonials-carousel').length){
    $('.testimonials-carousel').owlCarousel({
        //center: true,
        items:1,
        loop:true,
        margin:10,
        dots: true,
        nav: false,
    });
  }
});
