 function mapOne(){
      var latlng = new google.maps.LatLng(<?php the_field('latitude');?>, <?php the_field('longitude');?>);  
      var myOptions = {
          zoom: 17,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          panControl:false,
          zoomControl:false,
          streetViewControl:false,
          mapTypeControl:false
      };
      var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
      
      var marker = new google.maps.Marker({
        position: latlng ,
        visible: true,
        icon: 'http://download.htmlcut.com/Alon_Sudri_LaClinique_97810/images/map-ico.png'           //Please use abolute path here
      });
      marker.setMap(map);
   var styles = [
    {
      stylers: [
        { "hue": "#e5e3df" }, { "saturation": -100 }, { "lightness": 10 }
      ]
    }
  ];

  map.setOptions({styles: styles}); 

  // Creating an InfoWindow object
	var infowindow = new google.maps.InfoWindow({
		content: 'Custom popup  text here'
	});
	google.maps.event.addListener(marker, 'click', function() {
		  infowindow.open(map, marker);
		}); 
  
  }
  
jQuery(window).load(function(){  
	if ( jQuery('#map_canvas').length ) {
		mapOne(); 
	}
});	
	