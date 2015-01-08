
// jQuery(window).load(function(){
// 		//Get Exising Select Options    
// 	jQuery('#searchForm select').each(function(i, select){
// 	    var $select = jQuery(select);
// 	    $select.find('option').each(function(j, option){
// 	        var $option = jQuery(option);
// 	        // Create a radio:
// 	        var $radio = jQuery('<input type="radio" />');
// 	        // Set name and value:
// 	        $radio.attr('name', $select.attr('name')).attr('value', $option.val());
// 	        // Set checked if the option was selected
// 	        if ($option.attr('selected')) $radio.attr('checked', 'checked');
// 	        // Insert radio before select box:
// 	        $select.before($radio);
// 	        // Insert a label:
// 	        $select.before(
// 	          jQuery("<label />").attr('for', $select.attr('name')).text($option.text())
// 	        );
// 	        // Insert a <br />:
// 	        $select.before("<br/>");
// 	    });
// 	    $select.remove();
// 	});
	
// });




jQuery(document).ready(function($) {
  jQuery("#addressSubmit").click(function(){
    jQuery(".no-result").remove();
    setTimeout(function(){
      if(jQuery("div", '#map_sidebar').hasClass("no_results_found")){
        jQuery("#radius_in_submit").append("<p class='no-result'>No results found, please try another search.</p>");
      } 
    },1000)
    
  })

  // TITEL SLIDER
	jQuery('#title-carousel').flexslider({
		animation: "slide",
		itemWidth: 180,
		minItems: 3,
		maxItems: 3,
    asNavFor: '#title-carousel-slider'
	});
	jQuery('#title-carousel-slider').flexslider({
		animation: "fade",
		sync: "#title-carousel"
	});

  jQuery(".sub-menu").prev().append("<span class='icon-drop no-active'></span>");
  
  var divs = jQuery(".slides > .time-box");
  for (var i = 0; i < divs.length; i += 2) {
    divs.slice(i, i + 2).wrapAll("<li></li>");
  }
  
  jQuery(".history-mobile .slides li").each(function(){
    jQuery(this).find(".time-box:first").addClass("first-time");
  });
  
  
  jQuery(".time-slide").flexslider({
    slideshow: false, 
    animationLoop: false,
    animation: "slide"    
  })
  
  jQuery(".no-active").on("click", function(){
    jQuery(this).parent().next().css({"max-height":"500px"});
    jQuery(this).removeClass("no-active");
    jQuery(this).addClass("active");   
    return false;    
  });
  
  jQuery(".active").on("click", function(){
    jQuery(this).parent().next().css({"max-height":"0px"});
    jQuery(this).removeClass("active");
    jQuery(this).addClass("no-active");
    return false;
  });
  
  if ('ontouchstart' in document) {
    jQuery("#addressSubmit").on("click",function(){
      var setTop = jQuery("#map_sidebar").offset().top;
      jQuery("body, html").animate({scrollTop : setTop+"px"});
      
    })
  }  
  
  
    
  jQuery(".widget_categories ul").append("<li><a href='/inspirational-blog'>View all</a></li>")
  
  jQuery(".nav-container .scrollTo, .scrollTo").click(function(){
    if(jQuery(window).width() > 750) {
      var id = jQuery(this).attr("href");
      
      var topScroll = jQuery(id).offset().top - jQuery("#header").height();
      jQuery("html, body").animate({scrollTop: topScroll+"px"}, 800);
      
      jQuery(".nav-container .scrollTo").removeClass("active")
      jQuery(this).addClass("active");
      
      return false
    } else {
      var id = jQuery(this).attr("href");
      
      var topScroll = jQuery(id).offset().top;
      jQuery("html, body").animate({scrollTop: topScroll+"px"}, 800);
      return false
    }
  })
  
  //images on the category
  
  jQuery(".category-holder .finishes-list li a").live("mouseover", function(){
    if(!jQuery(this).hasClass("plus")){
      var clas = jQuery(this).attr("rev");
      jQuery(this).parent().parent().parent().parent().parent().parent().find(".image-sel").hide();
      jQuery(this).parent().parent().parent().parent().parent().parent().find(".image-sel."+clas).show();
    }
    return false;
  })  
   // jQuery(".category-holder .finishes-list li a").live("click", function(){
    
   // });
   
 
  
  jQuery(".single .finishes-list li a").click(function(){
    var title = jQuery(this).attr("title");
    jQuery("#filter-form input[name=filter]").val(title);
    jQuery("#filter-form").trigger("submit");

    return false;
  })
  
  //file scrollDown
  jQuery(".file-text").click(function(){
    var To = jQuery(".product-description").offset().top;
    jQuery("html, body").animate({ scrollTop: (To -130)}, 800);
  })
  
  //button down
  jQuery(window).scroll(function (){    

    if(jQuery(window).scrollTop() >= 300){
      jQuery(".top-btn").removeClass("top-down");
      jQuery(".top-btn").addClass("bottom-down");  
    }

    if(jQuery(window).scrollTop() < 300){
      jQuery(".top-btn").removeClass("bottom-down");
      jQuery(".top-btn").addClass("top-down");
    }
  });
    
  jQuery(".bottom-down").live("click", function(){

    jQuery("html, body").animate({ scrollTop: "0" }, 1000);
    return false;
  });

  jQuery(".top-down").live("click", function(){
    //alert(1);
    jQuery("html, body").animate({ scrollTop:  jQuery("#footer").offset().top },1000); 
    return false;
  });
  
    
	initDropDownClasses();
	initOpenClose();
	scrollPage();
	initEven();
	imageScaleFunction();
	initAccordion();
	initImageZoom();
	initFormCheck();
	initTabs();
	inittooltip();
	initPassNavInDrop();
	initMagnetInDrop();
	initFlexControlTop();
	initComputeHeight();
	initMapHeight();
	getGridSize();
	initIconSlider();
	initSortBy();
	initFilterShow();
	initProductDrop();
	initDealersDrop();
});


jQuery(window).on("resize", function(){
		initComputeHeight();
		initFlexControlTop();
		initMapHeight();
		getGridSize();
	});


function initDealersDrop() {
	jQuery('.types-dealers strong').click(function(){
		jQuery('.types-dealers').toggleClass('active');
	})
}


function initProductDrop(){
	jQuery('.product-description').find('h4').click(function(){

		if(jQuery(this).parent('div').hasClass('active')){
			jQuery(this).parent('div').removeClass('active');
		}
			else {
				jQuery('.product-description').find('.active').removeClass('active');
				jQuery(this).parent('div').toggleClass('active');
			}
	})
}

function initFilterShow(){
	jQuery('.aside-btn').click(function(e){
		jQuery('aside').toggleClass('active');
		jQuery('.aside-btn').toggleClass('active')
	});
}

function initSortBy() {
	jQuery('.sort-by > a').click(function(e){
		console.log('q');
		jQuery('.category-nav ul').toggleClass('active');
		e.preventDefault();
	});
}

function initIconSlider(){
	var winWidth = document.body.clientWidth;
	if(winWidth < 760) {
		var bottonStep = jQuery('.mobile-icon-slider span');
		var ollIconWidth = 0;
		var nav = 0;
		jQuery('#icon-slider-carousel ul li').each(function(){
			ollIconWidth += jQuery(this).innerWidth();
			nav +=1;
		});
		jQuery('.bullets').css('width', ollIconWidth);
		bottonStep.click(function(){
			bottonStep.removeClass('active');
			jQuery(this).addClass('active'); 
      
			if(jQuery(this).hasClass('one-part')) {
				jQuery('.bullets').css('marginLeft','0px');
				jQuery('#icon-slider ul.slides').css('transform','translate3d(-840px, 0px, 0px)');
        jQuery("#icon-slider-carousel li:first").find("figure").trigger("mouseover");
			}
			if(jQuery(this).hasClass('two-part')) {
				jQuery('.bullets').css('marginLeft','-280px');
				jQuery('#icon-slider ul.slides').css('transform','translate3d(-840px, 0px, 0px)');
        jQuery("#icon-slider-carousel li:first").next().find("figure").trigger("mouseover");
       
			}
      if(jQuery(this).hasClass('three-part')) {
				jQuery('.bullets').css('marginLeft','-560px');
				jQuery('#icon-slider ul.slides').css('transform','translate3d(-840px, 0px, 0px)');
        jQuery("#icon-slider-carousel li:first").next().next().find("figure").trigger("mouseover");
			}
      if(jQuery(this).hasClass('four-part')) {
				jQuery('.bullets').css('marginLeft','-840px');
				jQuery('#icon-slider ul.slides').css('transform','translate3d(-840px, 0px, 0px)');
        jQuery("#icon-slider-carousel li:last").find("figure").trigger("mouseover");
			}
      
		})
	}
}

function initMapHeight(){
	var winWidth = document.body.clientWidth;
	if(600 < winWidth < 768){
		setTimeout(function () {
			var formHeight = jQuery('#searchForm').innerHeight();
			jQuery('#map').css('height', formHeight);
		}, 500);
	}
	
}

function initComputeHeight() {
	var winWidth = document.body.clientWidth;

	if(760 < winWidth < 960){
		var blockHeight = jQuery('.text.stat').height();
		jQuery('.btn-blocks .container .block04 .bg-img').css('height', blockHeight)
	}
}
function initFlexControlTop(){
	var winWidth = document.body.clientWidth;
	if(winWidth < 960){
		setTimeout(function() {
		var imgHeight = jQuery('.flexslider .slides img').height();
		jQuery('.main-slider .flex-control-nav').css('top', imgHeight-31 );
		}, 300);
	}
}

function deliteDropDown(){
	jQuery('html').on('click', function(e){
		var target = jQuery(e.target);
		var parent = target.closest('ul');
		if (!parent.length) {
			jQuery('ul').removeClass('active');
			jQuery('html').off('click');
		}
	});
}


function initMagnetInDrop(){
	var winWidth = document.body.clientWidth;
	var MobNav = jQuery('#mobile');

	if(winWidth < 740){
		MobNav.find('span').click(function(){
			MobNav.find('ul').toggleClass('active');
			deliteDropDown();
		});
	}
}

function initPassNavInDrop() {
	var winWidth = document.body.clientWidth;
	if(winWidth < 740){
		if(jQuery('body').find('.faq-holder .tabset-holder .tabset')){
			var elem = jQuery('.faq-holder .tabset-holder .tabset');
			initNavInDrop(elem);
		}
	}
}

function initNavInDrop(elem) {
	var holder = elem;

	holder.find('a').click(function(event){
		if(holder.hasClass('active')) {
			holder.prepend(jQuery(this).parent('li'));
			holder.removeClass('active');
		}
			else if(jQuery(this).hasClass('active')){
				holder.addClass('active');
			}
		event.preventDefault();
	})
}


function initDropDownClasses()
{
	jQuery('.nav li').each(function() {
		var item = jQuery(this);
		var drop = item.find('ul');
		var link = item.find('a').eq(0);
		if(drop.length) {
			item.addClass('active-drop-down');
			if(link.length) link.addClass('active-drop-down-a');
		}
	});
}

function initAccordion(){
    jQuery('.tabset li:first-child a').addClass('active');
	  //var allPanels = jQuery('.accordion > dd').slideUp(600);
    
	  var allTitles = jQuery('.accordion > dt a');
		jQuery('.accordion .style-row').prev('dt').find('a').addClass("active");
    jQuery('.accordion .style-row').show();
	  jQuery('.accordion dt a').click(function() {
	  	var _this = jQuery(this);
	  	if(jQuery(this).hasClass('active')){
	  		 _this.parent().next().slideUp(400);
		  	 _this.removeClass('active');	
		  // 	_this.addClass('active');		
				// _this.parent().next().slideDown(600, function(){});  
	  	} else {
	  		_this.addClass('active');
		  	_this.parent().next().slideDown(600, function(){});		  	
	  	}
      return false;
	  });
	  // jQuery('dt.active a').trigger('click');
}

function initImageZoom(){
  
}


function initFormCheck() {

	jQuery(function() {

	  jQuery('.comment-form').each(function(){

		var form = jQuery(this),
			btn = form.find('#submit');


		form.find('.rfield').addClass('empty_field');


		function checkInput(){
		  form.find('.rfield').each(function(){
			if(jQuery(this).val() != ''){

			jQuery(this).removeClass('empty_field');
			} else {
			jQuery(this).addClass('empty_field');
			}
      
        var $email = jQuery('#email'); //change form to id or containment selector
        var re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!re.test($email.val())){
          $email.addClass("empty_field");
          console.log(1)
        }else{
          $email.removeClass("empty_field");
          $email.parent().removeClass('empty_rec_field');
          console.log(2)
        }
		  });
		}

		function lightEmpty(){
		  form.find('.empty_field').parent().addClass('empty_rec_field');
     
		}
    

		setInterval(function(){
		  checkInput();
		  var sizeEmpty = form.find('.empty_field').size();

		  if(sizeEmpty > 0){
			if(btn.hasClass('disabled')){
			  return false
			} else {
			  btn.addClass('disabled')
			}
		  } else {
			btn.removeClass('disabled')
		  }
		},500);


		btn.click(function(){
    
		  if(jQuery(this).hasClass('disabled')){
      
			lightEmpty();
     
			return false;
		  } else {

			form.submit();
		  }
		});
	  });
	});

}

function validateForm() {

	jQuery( "#wpcf7-f308-p347-o1 form " ).submit(function() {


		var title = jQuery(this).find("#frtitle").val(),
			tooltip =jQuery(this).find(".tooltip");
			
			if (title === 'Sunday' || title === 'sunday') {
				return true;
			  
			} else {
			   tooltip.fadeIn(500); 
				return false;
			}

	});
}



function inittooltip() {

	jQuery('.tooltip-holder').hover(function() {
		jQuery( this ).find('.tooltip').fadeIn("500");
			}, function() {
				jQuery( this ).find('.tooltip').fadeOut("500");
			}
	);
}

	// jQuery('.tooltip-holder').each(function(){
	// 	var tooltipHolder = jQuery(this),
	// 		ico = tooltipHolder.find('.tooltip-opener'),
	// 		tooltip = tooltipHolder.find(".tooltip");

	// 		tooltipHolder.mouseover(function(){
	// 			tooltip.fadeIn(500); 
	// 		});

	// 		tooltipHolder.mouseout(function(){
	// 			tooltip.fadeOut(500); 
	// 		});
	// 	});
	// }




function scrollPage() {
    
 // jQuery('.scrollTo').click(function(){
    
  
		// jQuery('.nav-container li').each(function() {
			// var linkItem = jQuery(this);
			// var activeLink = linkItem.find('a.active');{
				// activeLink.removeClass('active');
			// }
		// });

		// var item = jQuery(this);{
			// item.addClass('active');
		// }
		// jQuery('.top-btn').each(function() {
		// var topBtn = jQuery(this);{
			// topBtn.addClass('active');	
			// }
		// });

	//});
  
  
	jQuery('ul li:first-child .scrollTo').click(function(){
		jQuery('.top-btn').each(function() {
		var topBtn = jQuery(this);{
			topBtn.removeClass('active');	
			}
		});

	});
	// jQuery('.top-btn').click(function(){
		// var topBtn = jQuery(this);{
			// topBtn.removeClass('active');
		// }
	// });

	// jQuery(".page-id-309 a.scrollTo").click(function() {
		// jQuery("html, body").animate({
			// scrollTop: jQuery(jQuery(this).attr("href")).offset().top - 0
		// }, {
			// duration: 2000
		// });
		// return false;
	// });
	// jQuery("a.scrollTo").click(function() {
		// if(jQuery('body').hasClass('page-id-46')){
			// jQuery("html, body").animate({
				// scrollTop: jQuery(jQuery(this).attr("href")).offset().top - 130
			// }, {
				// duration: 500
			// });
		// }
			// else {
				// jQuery("html, body").animate({
					// scrollTop: jQuery(jQuery(this).attr("href")).offset().top - 190
				// }, {
					// duration: 500
				// });
			// }
		// return false;
	// });

}


function imageScaleFunction() {
	jQuery('.category-img img').imageScale();
	//jQuery('.main-img img').imageScale();
	jQuery('.post-list img').imageScale();
	jQuery('#title-carousel-slider img').imageScale();
}


// open-close init
function initOpenClose() {
	jQuery('nav.nav').openClose({
		addClassBeforeAnimation: false,
		activeClass: 'expanded',
		opener: 'a.mobile-menu-opener',
		slider: '> .menu-header-menu-container',
		animSpeed: 500,
		effect: 'slide'
	});
	jQuery('.post-holder aside > div ').openClose({
		addClassBeforeAnimation: false,
		activeClass: 'expanded',
		opener: 'h3',
		slider: '> ul',
		animSpeed: 500,
		effect: 'slide'
	});
	jQuery('.post-holder aside > div ').openClose({
		addClassBeforeAnimation: false,
		activeClass: 'expanded',
		opener: 'h3',
		slider: '> .pop-layout-v',
		animSpeed: 500,
		effect: 'slide'
	});
	// jQuery('.map-holder').openClose({
	// 	addClassBeforeAnimation: false,
	// 	activeClass: 'expanded',
	// 	opener: 'a.map-opener',
	// 	slider: '> .map-frame',
	// 	animSpeed: 500,
	// 	effect: 'slide'
	// });
}

function initEven() {
	jQuery(' .history ul li:even').addClass('even');
	jQuery(' .collection-gallery .wrap .row > div:even').addClass('even');
}


/*
 * jQuery Open/Close plugin
 */

(function($) {
	function OpenClose(options) {
		this.options = $.extend({
			addClassBeforeAnimation: true,
			hideOnClickOutside: false,
			activeClass:'active',
			opener:'.opener',
			slider:'.slide',
			animSpeed: 400,
			effect:'fade',
			event:'click'
		}, options);
		this.init();
	}
	OpenClose.prototype = {
		init: function() {
			if(this.options.holder) {
				this.findElements();
				this.attachEvents();
				this.makeCallback('onInit');
			}
		},
		findElements: function() {
			this.holder = jQuery(this.options.holder);
			this.opener = this.holder.find(this.options.opener);
			this.slider = this.holder.find(this.options.slider);

			if (!this.holder.hasClass(this.options.activeClass)) {
				this.slider.addClass(slideHiddenClass);
			}
		},
		attachEvents: function() {
			// add handler
			var self = this;
			this.eventHandler = function(e) {
				e.preventDefault();
				if (self.slider.hasClass(slideHiddenClass)) {
					self.showSlide();
				} else {
					self.hideSlide();
				}
			};
			self.opener.bind(self.options.event, this.eventHandler);

			// hover mode handler
			if(self.options.event === 'over') {
				self.opener.bind('mouseenter', function() {
					self.holder.removeClass(self.options.activeClass);
					self.opener.trigger(self.options.event);
				});
				self.holder.bind('mouseleave', function() {
					self.holder.addClass(self.options.activeClass);
					self.opener.trigger(self.options.event);
				});
			}

			// outside click handler
			self.outsideClickHandler = function(e) {
				if(self.options.hideOnClickOutside) {
					var target = jQuery(e.target);
					if (!target.is(self.holder) && !target.closest(self.holder).length) {
						self.hideSlide();
					}
				}
			};
		},
		showSlide: function() {
			var self = this;
			if (self.options.addClassBeforeAnimation) {
				self.holder.addClass(self.options.activeClass);
			}
			self.slider.removeClass(slideHiddenClass);
			jQuery(document).bind('click', self.outsideClickHandler);

			self.makeCallback('animStart', true);
			toggleEffects[self.options.effect].show({
				box: self.slider,
				speed: self.options.animSpeed,
				complete: function() {
					if (!self.options.addClassBeforeAnimation) {
						self.holder.addClass(self.options.activeClass);
					}
					self.makeCallback('animEnd', true);
				}
			});
		},
		hideSlide: function() {
			var self = this;
			if (self.options.addClassBeforeAnimation) {
				self.holder.removeClass(self.options.activeClass);
			}
			jQuery(document).unbind('click', self.outsideClickHandler);

			self.makeCallback('animStart', false);
			toggleEffects[self.options.effect].hide({
				box: self.slider,
				speed: self.options.animSpeed,
				complete: function() {
					if (!self.options.addClassBeforeAnimation) {
						self.holder.removeClass(self.options.activeClass);
					}
					self.slider.addClass(slideHiddenClass);
					self.makeCallback('animEnd', false);
				}
			});
		},
		destroy: function() {
			this.slider.removeClass(slideHiddenClass).css({display:''});
			this.opener.unbind(this.options.event, this.eventHandler);
			this.holder.removeClass(this.options.activeClass).removeData('OpenClose');
			jQuery(document).unbind('click', this.outsideClickHandler);
		},
		makeCallback: function(name) {
			if(typeof this.options[name] === 'function') {
				var args = Array.prototype.slice.call(arguments);
				args.shift();
				this.options[name].apply(this, args);
			}
		}
	};

	// add stylesheet for slide on DOMReady
	var slideHiddenClass = 'js-slide-hidden';
	jQuery(function() {
		var tabStyleSheet = jQuery('<style type="text/css">')[0];
		var tabStyleRule = '.' + slideHiddenClass;
		tabStyleRule += '';
		if (tabStyleSheet.styleSheet) {
			tabStyleSheet.styleSheet.cssText = tabStyleRule;
		} else {
			tabStyleSheet.appendChild(document.createTextNode(tabStyleRule));
		}
		jQuery('head').append(tabStyleSheet);
	});

	// animation effects
	var toggleEffects = {
		slide: {
			show: function(o) {
				o.box.stop(true).hide().slideDown(o.speed, o.complete);
			},
			hide: function(o) {
				o.box.stop(true).slideUp(o.speed, o.complete);
			}
		},
		fade: {
			show: function(o) {
				o.box.stop(true).hide().fadeIn(o.speed, o.complete);
			},
			hide: function(o) {
				o.box.stop(true).fadeOut(o.speed, o.complete);
			}
		},
		none: {
			show: function(o) {
				o.box.hide().show(0, o.complete);
			},
			hide: function(o) {
				o.box.hide(0, o.complete);
			}
		}
	};

	// jQuery plugin interface
	jQuery.fn.openClose = function(opt) {
		return this.each(function() {
			jQuery(this).data('OpenClose', new OpenClose($.extend(opt, {holder: this})));
		});
	};
}(jQuery));


////////////////////////////////////////////////// TABS //////////////////////////////////////////////////

// init tabs when page ready
function initTabs()
{
	// content tabs module
	var ContentTabs = {
		options: {
			classOnParent: false,
			hiddenClass: 'tab-hidden',
			visibleClass: 'tab-active',
			activeClass: 'active',
			tabsets: '.tabset',
			tablinks: 'a.tab',
			event: 'click'
		},
		init: function()
		{
			if(!jQuery(this.options.tabsets).hasClass('inactiveTabs'))
			{
				this.createStyleSheet();
				this.getTabsets();
			}
			return this;
		},
		createStyleSheet: function() {
			this.tabStyleSheet = document.createElement('style');
			this.tabStyleSheet.setAttribute('type', 'text/css');
			this.tabStyleRule = '.'+this.options.hiddenClass;
			this.tabStyleRule += '{position:absolute !important;left:-9999px !important;top:-9999px !important;display:block !important}';
			document.getElementsByTagName('head')[0].appendChild(this.tabStyleSheet);
			if (this.tabStyleSheet.styleSheet) {
				this.tabStyleSheet.styleSheet.cssText = this.tabStyleRule;
			} else {
				this.tabStyleSheet.appendChild(document.createTextNode(this.tabStyleRule));
			}
		},
		getTabsets: function() {
			this.tabsets = this.queryElements(this.options.tabsets);
			for(var i = 0; i < this.tabsets.length; i++) {
				this.initTabset(this.tabsets[i]);
			}
		},
		initTabset: function(tabset) {
			var tabLinks = this.queryElements(this.options.tablinks, tabset), instance = this;
			for(var i = 0; i < tabLinks.length; i++) {
				tabLinks[i]['on'+this.options.event] = function(){
					instance.switchTab(this, tabLinks);
					return false;
				}
				if(this.hasClass(this.options.classOnParent ? tabLinks[i].parentNode : tabLinks[i], this.options.activeClass)) {
					this.switchTab(tabLinks[i], tabLinks);
				}
			}
		},
		switchTab: function(link, set) {
			for(var i = 0; i < set.length; i++) {
				var curLink = set[i];
				var curTab = document.getElementById(curLink.href.substr(curLink.href.indexOf('#')+1));
				if(curLink === link) {
					this.addClass(this.options.classOnParent ? curLink.parentNode : curLink, this.options.activeClass);
					this.addClass(curTab,this.options.visibleClass);
					this.removeClass(curTab,this.options.hiddenClass);
				} else {
					this.removeClass(this.options.classOnParent ? curLink.parentNode : curLink, this.options.activeClass);
					this.removeClass(curTab,this.options.visibleClass);
					this.addClass(curTab,this.options.hiddenClass);
				}
			}
		},
		queryElements: function(selector, holder) {
			var box = holder || document;
			if(box.querySelectorAll) {
				return box.querySelectorAll(selector);
			} else {
				var res = [], selectorData = selector.split('.');
				var tagName = selectorData[0];
				var set = box.getElementsByTagName(tagName);
				if(selectorData.length > 1) {
					for(var i = 0; i < set.length; i++) {
						if(this.hasClass(set[i], selectorData[1])) res.push(set[i]);
					}
					return res;
				} else {
					return set;
				}
			}
		},
		hasClass: function (obj,cname) {
			return (obj.className ? obj.className.match(new RegExp('(\\s|^)'+cname+'(\\s|$)')) : false);
		},
		addClass: function (obj,cname) {
			if (!this.hasClass(obj,cname)) obj.className += " "+cname;
		},
		removeClass: function (obj,cname) {
			if (this.hasClass(obj,cname)) obj.className=obj.className.replace(new RegExp('(\\s|^)'+cname+'(\\s|$)'),' ');
		}
	};

	if(typeof ContentTabs !== 'undefined') {
		ContentTabs.init();
	}
}

////////////////////////////////////////////////// END  TABS //////////////////////////////////////////////////





function getGridSize() {
	return (window.innerWidth < 760) ? 2 : 5;
}

jQuery(window).on("load resize", function() {



	// MAIN SLIDER
	jQuery('.main-slider').flexslider({
		controlNav: true,
    slideshowSpeed: 4500,
		directionNav: true
	});
	// END MAIN SLIDER

	// WORKFLOW SLIDER
	jQuery('.r_d_workflow-slider').flexslider({
		controlNav: true,
		animation: "slide",
		directionNav: true,
		animationLoop: false,
		pauseOnHover: false,
		slideshowSpeed: 200, 
		slideshow: false 
	});
	// END WORKFLOW SLIDER

	// HISTORY SLIDER
	jQuery('.history-slider').flexslider({
		animation: "slide",
		animationLoop: false,
    slideshow: false,
		itemWidth: 330,
		itemMargin: 0,
    move: 2,
		minItems: 3,
		maxItems: 6
	});
  
  
  
	// END HISTORY SLIDER

	// PRODUCT SLIDER
	
	jQuery('#product-slider-carousel-mobile').flexslider({
		animation: "slide",
		controlNav: false,
		directionNav: true,
		animationLoop: false,
		slideshow: false,				
	});
	// ENDPRODUCT SLIDER


	

	// END TITLE SLIDER


	// COLLECTION SLIDER
	jQuery('.collection-gallery .flexslider').flexslider({
		animation: "fade",
		directionNav: false,
		animationLoop: false,
	});
	// END COLLECTION SLIDER


	jQuery('.swatches-slider').flexslider({
		animation: "slide",
		controlNav: true,
		directionNav: true,
		slideshow: false,
		itemWidth: 130,
		minItems: 3,
    //move: 1,
		maxItems: 7,
		animationLoop: false
	});

	// LITERATURE SLIDER
	jQuery('.literature-slider').flexslider({
		animation: "slide",
		animationLoop: false,
    slideshow: false,
		itemWidth: 145,
		itemMargin: 12,
		minItems: getGridSize(),
		maxItems: getGridSize()
	});
	// END LITERATURE SLIDER

	// related-products SLIDER
	// jQuery('#related-products').flexslider({
	// 	animation: "slide",
	// 	controlNav: false,
	// 	animationLoop: false,
	// 	slideshow: false,
	// 	// itemWidth: 316,
	// 	itemMargin: 12,
	// 	maxItems: 3,
	// 	minItems: 2
	// });
	jQuery('.holder-mobile').flexslider({
		animation: "slide",
		itemWidth: 280
	});
});

jQuery(window).load(function(){
    //jQuery(".tab-content-holder .accordion dd.finish-row").show();
    jQuery(".flex-active-slide .zoom_01").elevateZoom();
    
    
})