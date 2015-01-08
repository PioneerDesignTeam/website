function setProductprices(){
  jQuery('.product-list li').each(function(){
      var minPrice = jQuery(this).find('.min-value span').text();
      var maxPrice = jQuery(this).find('.max-value span').text();
      
      if(minPrice > 0 && maxPrice <= 200) {
        jQuery(this).addClass('start-price');
      } else if(minPrice > 200 && maxPrice <= 500) {
        jQuery(this).addClass('midddle-price');
      } else if(minPrice > 500 && maxPrice <= 1000) {
        jQuery(this).addClass('highe-price');  
      } else {
        jQuery(this).addClass('all-price'); 
      }
  });
}


jQuery(document).ready(function(){  
  
  
  jQuery('.opener-btn').click(function(){
    if(jQuery(this).hasClass('expanded')){
      jQuery(this).removeClass('expanded');
      jQuery('.map').animate({height: '0px'},700,function(){jQuery('.opener-btn').text('open map')})
    } else {
      jQuery(this).addClass('expanded');
      jQuery('.map').animate({height: '518px'},700,function(){jQuery('.opener-btn').text('close map')})
    }
    
  })
  

  setProductprices();

  jQuery('#icon-slider').flexslider({
    animation: "slide",	
		animationSpeed: 1000,
    slideshowSpeed: 5000,
    directionNav: false,  
    controlNav: true,
    animationLoop: true,
    slideshow: false,
    start: function(slider){
      jQuery('#icon-slider-carousel li:first-child').addClass('active');
    },
    after: function(slider){      
      var arrows = jQuery('#icon-slider-carousel li');
      jQuery('#icon-slider-carousel li').removeClass('active');
      for(j=0;j<slider.currentSlide;j++){
        jQuery(arrows[j]).addClass('preactive');        
      }
      l = slider.currentSlide + 1;
      jQuery('#icon-slider-carousel li:nth-child('+l+')').addClass('active'); 
      jQuery('#icon-slider-carousel li.overed').removeClass('overed');
      jQuery('#icon-slider-carousel li.temp-blue').removeClass('temp-blue');
    },
    before: function(slider){    
     
    var k = slider.animatingTo + 1;
        
    var n = slider.currentSlide + 1;
   

      if(k==1){
        var span = ".one-part";
      }
      if(k==2){
        var span = ".two-part";
      }
      if(k==3){
        var span = ".three-part";
      }
      if(k==4){
        var span = ".four-part";
      }

      jQuery(".mobile-icon-slider "+span).trigger("click");
      
      jQuery('#icon-slider-carousel li:nth-child('+k+')').addClass('overed');
      if((slider.animatingTo - slider.currentSlide) == 2){
        var l = slider.currentSlide+2;
        setTimeout(function() {  jQuery('#icon-slider-carousel li:nth-child('+l+')').addClass('preactive'); }, 500);       
      }
      if ((slider.animatingTo - slider.currentSlide) == -2) {
        var m = slider.currentSlide;
        setTimeout(function() {  jQuery('#icon-slider-carousel li:nth-child('+m+')').removeClass('active').removeClass('preactive'); }, 500);
      }      
      if((slider.animatingTo - slider.currentSlide) == 3){
        var l = slider.currentSlide+2;
        var v = slider.currentSlide+3;
        setTimeout(function() {  jQuery('#icon-slider-carousel li:nth-child('+l+')').addClass('preactive'); }, 330);
        setTimeout(function() {  jQuery('#icon-slider-carousel li:nth-child('+v+')').addClass('preactive'); }, 660);
      }
      if ((slider.animatingTo - slider.currentSlide) == -3) {
        var m = slider.currentSlide;
        var c = slider.currentSlide - 1;
        setTimeout(function() {  jQuery('#icon-slider-carousel li:nth-child('+m+')').removeClass('active').removeClass('preactive'); }, 330);
        setTimeout(function() {  jQuery('#icon-slider-carousel li:nth-child('+c+')').removeClass('active').removeClass('preactive'); }, 660);
      }      
      if(slider.currentSlide > slider.animatingTo){
        l = slider.currentSlide+1;
        jQuery('#icon-slider-carousel li:nth-child('+l+')').removeClass('active').removeClass('preactive');        
      } else {        
        l = slider.currentSlide+1;        
         jQuery('#icon-slider-carousel li:nth-child('+l+')').removeClass('active').removeClass('preactive').addClass('temp-blue');      
      }
      
        var step = 170*slider.animatingTo;
        jQuery('.bar-orange').animate({width: step+'px'}, 999);
       
    }  
  });
  
  jQuery('#icon-slider-carousel li figure').mouseover(function(){    
     if (!jQuery('#icon-slider-carousel').hasClass('in-progress') && !jQuery(this).parent().parent().hasClass('active')) {
       jQuery('#icon-slider-carousel').addClass('in-progress');
       jQuery('.over').show();
       var index = jQuery(this).parent().parent().index();
       console.log(index);
       jQuery('#icon-slider').flexslider(index);       
       setTimeout(function(){jQuery('#icon-slider-carousel').removeClass('in-progress'); jQuery('.over').hide();},1000)
     }
  })
  jQuery('#icon-slider-carousel li strong').mouseover(function(){ 
    if (!jQuery('#icon-slider-carousel').hasClass('in-progress') && !jQuery(this).parent().parent().hasClass('active')) {
      jQuery('.over').show();
      jQuery('#icon-slider-carousel').addClass('in-progress');
      var index = jQuery(this).parent().parent().index();
      jQuery('#icon-slider').flexslider(index);
      setTimeout(function(){jQuery('#icon-slider-carousel').removeClass('in-progress');jQuery('.over').hide();},1000)      
    }
  })



  /* Filters */

  jQuery('.page-template-page-templatesproduct-list-template-php').addClass('all-price');

  var arrCollection = [];
  var arrHandles = [];
  var arrStyle = [];
  var arrFinishes = [];
  var arrMounttype = [];
  var arrPrice = [];

  jQuery('.collection-row input[type="checkbox"]').change(function(){
    var elCollection = jQuery(this).val();
    if(jQuery(this).is(':checked')){          
      var bool = true;
      for (i=0; i<arrCollection.length; i++) {
        if (arrCollection[i] == elCollection) {
          bool = false;
        }
      } 
      if (bool) {
        arrCollection.push(elCollection); 
      }

    } else {
      arrCollection.splice(arrCollection.indexOf(elCollection), 1);
    }
  });

  jQuery('.handless-row input[type="checkbox"]').change(function(){
    var elHandless = jQuery(this).val();
    if(jQuery(this).is(':checked')){          
      var bool = true;
      for (i=0; i<arrHandles.length; i++) {
        if (arrHandles[i] == elHandless) {
          bool = false;
        }
      } 
      if (bool) {
        arrHandles.push(elHandless);  
      }
    } else {
      arrHandles.splice(arrHandles.indexOf(elHandless), 1);
    }
  });

  jQuery('.style-row input[type="checkbox"]').change(function(){
    var elStyle = jQuery(this).val();
    if(jQuery(this).is(':checked')){          
      var bool = true;
      for (i=0; i<arrStyle.length; i++) {
        if (arrStyle[i] == elStyle) {
          bool = false;
        }
      } 
      if (bool) {
        arrStyle.push(elStyle); 
      }
    } else {
      arrStyle.splice(arrStyle.indexOf(elStyle), 1);
    }
  });

  jQuery('.finish-row input[type="checkbox"]').change(function(){
    var elFinish = jQuery(this).val();
    if(jQuery(this).is(':checked')){          
      var bool = true;
      for (i=0; i<arrFinishes.length; i++) {
        if (arrFinishes[i] == elFinish) {
          bool = false;
        }
      } 
      if (bool) {
        arrFinishes.push(elFinish); 
      }
    } else {
      arrFinishes.splice(arrFinishes.indexOf(elFinish), 1);
    }
  });

  jQuery('.price-row #price-1').change(function(){
    var elPrice = jQuery(this).val();
    if(jQuery(this).is(':checked')){        
      jQuery('body').addClass('start-price-show');
    } else {
      jQuery('body').removeClass('start-price-show')
    }

  });
   jQuery('.price-row #price-2').change(function(){
    var elPrice = jQuery(this).val();
    if(jQuery(this).is(':checked')){        
      jQuery('body').addClass('middle-price-show');
    } else {
      jQuery('body').removeClass('middle-price-show')
    }

  });
    jQuery('.price-row #price-3').change(function(){
    var elPrice = jQuery(this).val();
    if(jQuery(this).is(':checked')){        
      jQuery('body').addClass('highe-price-show');
    } else {
      jQuery('body').removeClass('highe-price-show');
    }

  });


  jQuery('.mountype-row input[type="checkbox"]').change(function(){
    var elMounttype = jQuery(this).val();
    if(jQuery(this).is(':checked')){          
      var bool = true;
      for (i=0; i<arrMounttype.length; i++) {
        if (arrMounttype[i] == elMounttype) {
          bool = false;
        }
      } 
      if (bool) {
        arrMounttype.push(elMounttype); 
      }
    } else {
      arrMounttype.splice(arrMounttype.indexOf(elMounttype), 1);
    }
  });
  var cat = jQuery(".cat-slug").text();
  
  // LOAD KITCHEN FILTERED PRODUCT 
  jQuery('.kitchen-holder .catalog.kitchen input[type="checkbox"]').change(function(){
    jQuery("html, body").animate({ scrollTop: 0}, 800);
    jQuery("body").addClass("filter-kitchen");
    jQuery('.catalog.kitchen .product-list').append("<div class='loading-page'></div>");
    if(!jQuery('body').hasClass("inprogres")){
      
      jQuery('body').addClass("inprogres");
      jQuery.ajax({
        type: "POST",
        url: jQuery('#base-url').text() + "/kitchen-product-query",
        data: "Collection=" + arrCollection+"&Handles=" + arrHandles+"&Style=" + arrStyle+"&Finishes=" + arrFinishes+"&Mounttype=" + arrMounttype+"&Cat="+ cat,     
        success: function(html){
            jQuery('.catalog.kitchen .product-list').html(html);     
            setTimeout(function(){jQuery('body').removeClass("inprogres"); jQuery('.loading-page').remove();}, 1000); 
            setProductprices()
        }
      });
    }
  }); 

  // LOAD BATH FILTERED PRODUCT 
  jQuery('.bath-holder .catalog.kitchen input[type="checkbox"]').change(function(){
    jQuery("html, body").animate({ scrollTop: 0}, 800);
    jQuery("body").addClass("filter-bath");
    jQuery('.catalog.kitchen .product-list').append("<div class='loading-page'></div>");
    if(!jQuery('body').hasClass("inprogres")){
      
      jQuery('body').addClass("inprogres");
      jQuery.ajax({
        type: "POST",
        url: jQuery('#base-url').text() + "/bath-product-query",
        data: "Collection=" + arrCollection+"&Handles=" + arrHandles+"&Style=" + arrStyle+"&Finishes=" + arrFinishes+"&Mounttype=" + arrMounttype+"&Cat="+ cat,     
        success: function(html){  
            jQuery('.catalog.kitchen .product-list').html(html);
            setTimeout(function(){jQuery('body').removeClass("inprogres"); jQuery('.loading-page').remove();},1000);            
            setProductprices(); 
        }
      });
    }
  }); 
  
  // LOAD BATH SCROLL PRODUCT 
  jQuery(window).scroll(function () {
    if (jQuery('body').hasClass("filter-bath") && jQuery(window).scrollTop() >= (jQuery("body").height() - jQuery(window).height()-190)) {
      if (!jQuery('body').hasClass("inprogres")) {
        var count = jQuery(".product-list ul:first > li").length;
        jQuery('body').addClass("inprogres");
        jQuery.ajax({
          type: "POST",
          url: jQuery('#base-url').text() + "/scroll-kitchen-query",
          data: "Collection=" + arrCollection+"&Handles=" + arrHandles+"&Style=" + arrStyle+"&Finishes=" + arrFinishes+"&Mounttype=" + arrMounttype+"&Cat="+ cat+"&count="+count,     
          success: function(html){
              setTimeout(function(){jQuery('body').removeClass("inprogres");},1000); 
              jQuery(html).hide().appendTo(".product-list ul:first").fadeIn(500);              
              setProductprices(); 
          }
        });
      }
    }
  }); 
  
  // LOAD KITCHEN SCROLL PRODUCT 
  jQuery(window).scroll(function () {
    if (jQuery('body').hasClass("filter-kitchen") && jQuery(window).scrollTop() >= (jQuery("body").height() - jQuery(window).height()-90)) {
      if (!jQuery('body').hasClass("inprogres")) {
        var count = jQuery(".product-list ul:first > li").length;
        jQuery('body').addClass("inprogres");
        jQuery.ajax({
          type: "POST",
          url: jQuery('#base-url').text() + "/scroll-kitchen-query",
          data: "Collection=" + arrCollection+"&Handles=" + arrHandles+"&Style=" + arrStyle+"&Finishes=" + arrFinishes+"&Mounttype=" + arrMounttype+"&Cat="+ cat+"&count="+count,     
          success: function(html){
              setTimeout(function(){jQuery('body').removeClass("inprogres")},1000); 
              jQuery(html).hide().appendTo(".product-list ul:first").fadeIn(500);              
              setProductprices(); 
          }
        });
      }
    }
  });
  
  // LOAD BATH SCROLL PRODUCT 
  jQuery(window).scroll(function () {
    if (jQuery('body').hasClass("filter-bath") && jQuery(window).scrollTop() >= (jQuery("body").height() - jQuery(window).height()-90)) {
      if (!jQuery('body').hasClass("inprogres")) {
        var count = jQuery(".product-list ul:first > li").length;
        jQuery('body').addClass("inprogres");
        jQuery.ajax({
          type: "POST",
          url: jQuery('#base-url').text() + "/scroll-bath-query",
          data: "Collection=" + arrCollection+"&Handles=" + arrHandles+"&Style=" + arrStyle+"&Finishes=" + arrFinishes+"&Mounttype=" + arrMounttype+"&Cat="+ cat+"&count="+count,     
          success: function(html){
              setTimeout(function(){jQuery('body').removeClass("inprogres")},1000); 
              jQuery(html).hide().appendTo(".product-list ul:first").fadeIn(500);              
              setProductprices(); 
          }
        });
      }
    }
  }); 
  
  // LOAD SEARCH FILTERED PRODUCT 
  jQuery('.search-holder .catalog.kitchen input[type="checkbox"]').change(function(){
    jQuery("html, body").animate({ scrollTop: 0}, 800);
    if(!jQuery('body').hasClass("inprogres")){
      jQuery('.catalog.kitchen .product-list').append("<div class='loading-page'></div>");
      jQuery('body').addClass("inprogres");
      jQuery.ajax({
        type: "POST",
        url: jQuery('#base-url').text() + "/search-product-query",
        data: "Collection=" + arrCollection+"&Handles=" + arrHandles+"&Style=" + arrStyle+"&Finishes=" + arrFinishes+"&Mounttype=" + arrMounttype+"&Cat="+ cat,     
        success: function(html){
            jQuery('body').removeClass("inprogres");
            jQuery('.catalog.kitchen product-list').html(html);     
            setProductprices(); 
            jQuery('.loading-page').remove();
        }
      });
    }
  });


  

})
