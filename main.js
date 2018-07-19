/*CivicTech.World*/
function render() {


}

(function($){
    $('#scrape-form').submit(function(e){
     event.preventDefault();
      //  console.log("scrapeform",e);
        var form_values = {};

        $.each($('#scrape-form').serializeArray(), function(_, kv) {
         
            form_values[kv.name] = kv.value
        });
       // console.log(form_values);
       
        $.ajax({ 
            data: form_values,
            type: 'post',
            url: '/admin/update/',
            success: function(data) {
                 if(data == 'success'){
                   console.log("success",data)
                     jQuery('#save-button').addClass("saved");
                     jQuery('#save-button').val("saved");
                     jQuery('#next-link').css("visibility","visible");
                 }
           }
       });
    
    })
   

})(jQuery)

jQuery('#scraped-images input[type=radio]').on("change", function () {
    name = jQuery(this).attr('name')
    if (name == "logo_url") {
        //   console.log("logo")


    } else if (name == "share_image_url") {

        // console.log("share")

    }
    jQuery("#" + name).val(jQuery(this).val())
    jQuery("#preview-" + name).attr("src", jQuery(this).val())


})

function buildLocationForm(country, province, city) {
   
    
    var country_options = '',
        province_options = '',
        city_options = '';
    var country_selected = '',
        province_selected = '',
        city_selected = ''
    var provinces = [],
        cities = [],
        province_count = 0;
        city_count = 0;
    if (country == 0) {
        country = 399
       
    }


    for (var country_id in location_data) {
        country_selected = ''
        if (country_id == country) {
            country_selected = ' selected'
            provinces = location_data[country_id].provinces
            cities = location_data[country_id].cities
            province_cities = location_data[country_id].province_cities

            province_options = '<option value="">Select Province</option>';
            city_options = '';
        }
        country_options += '\t<option value="' + country_id + '" ' + country_selected + '>' + location_data[country_id].name + '</option>\n'

    }
    jQuery("#location_country").html(country_options) // load country select menu with options
    console.log(provinces.length)

    for (var p in provinces) { //loop through them
            province_selected = ''
            if (provinces[p] == location_province) {
                province_selected = ' selected'
            }

            province_options += '\t<option value="' + p + '"' + province_selected + '>' + provinces[p] + '</option>\n'//load options
            province_count++;
        }
    if (province_count > 0) { //If in fact, you have provinces. 
        jQuery("#location_province").html(province_options)//inject them into the waiting form.
        jQuery("#province-row").css("visibility:visible")//make visible.
    } else {
        jQuery("#location_province").html('')//empty the form because there are no provinces. 
        jQuery("#province-row").css("visibility:hidden")//hide provinces by default
    }
       
    for (var c in cities) { //loop through them
        city_selected = ''
        if (cities[c] == location_city) {
            city_selected = ' selected'
        }
        console.log(cities)
        city_options += '\t<option value="' + p + '"' + city_selected + '>' + cities[c] + '</option>\n'//load options
        city_count++;
    }
    if (city_count > 0) { //If in fact, you have cities. 
        jQuery("#location_city").html(city_options)//inject them into the waiting form.
        jQuery("#city-row").css("visibility:visible")//make visible.
    } else {
        jQuery("#location_city").html('')//empty the form because there are no cities. 
        jQuery("#city-row").css("visibility:hidden")//hide cities by default
    }
  



 
    // jQuery("#location_country").html(country_options)


    console.log(
        "country", country,
        "province", province,
        "city", city
    )
}
jQuery("#location_country").change(function(){
    console.log(jQuery(this).val()); 
buildLocationForm(jQuery(this).val(), '', '')
})





var location_data = {}


function loadLocationData(url) {
    console.log('load', url)
    jQuery.getJSON(url, function (data) {
        location_data = data;
        //console.log(location_data)
        buildLocationForm(location_country, location_province, location_city);

    })
}




//loadLocationData(location_data_path)
(function($){
	jQuery.fn.megamenu = function(options){
		var settings = {
			interval	 		: 250    	// animation time (ms)
		}
		
		$.extend( settings, options );
		var menu = $(".megamenu");
		var lastScreenWidth = window.innerWidth;
		$(menu).prepend("<li class='showhide'><span class='title'>MENU</span><span class='icon1'></span><span class='icon2'></span></li>");
		screenSize();
		
		$(window).resize(function() {
			if(lastScreenWidth <= 768 && window.innerWidth > 768){
				unbindEvents();
				hideCollapse();
				bindHover();
			}
			if(lastScreenWidth > 768 && window.innerWidth <= 768){
				unbindEvents();
				showCollapse();
				bindClick();
			}
			lastScreenWidth = window.innerWidth;
		});
		
		function screenSize(){
			if(window.innerWidth <= 768){
				showCollapse();
				bindClick();
			}
			else{
				hideCollapse();
				bindHover();
			}
		}
		
		function bindHover(){
			if (navigator.userAgent.match(/Mobi/i) || window.navigator.msMaxTouchPoints > 0){						
				$(menu).find("a").on("click touchstart", function(e){
					e.stopPropagation(); 
					e.preventDefault();
					window.location.href = $(this).attr("href");
					$(this).parent("li").siblings("li").find(".dropdown, .megapanel").stop(true, true).fadeOut(settings.interval);
					if($(this).siblings(".dropdown, .megapanel").css("display") == "none"){
						$(this).siblings(".dropdown, .megapanel").stop(true, true).fadeIn(settings.interval);
					}
					else{
						$(this).siblings(".dropdown, .megapanel").stop(true, true).fadeOut(settings.interval);
						$(this).siblings(".dropdown").find(".dropdown").stop(true, true).fadeOut(settings.interval);
					}
				});
				
				$(document).bind("click.menu touchstart.menu", function(ev){
					if($(ev.target).closest(menu).length == 0){
						$(menu).find(".dropdown, .megapanel").fadeOut(settings.interval);
					}
				});
			}
			else{
				$(menu).find("li").bind("mouseenter", function(){
					$(this).children(".dropdown, .megapanel").stop(true, true).fadeIn(settings.interval);
				}).bind("mouseleave", function(){
					$(this).children(".dropdown, .megapanel").stop(true, true).fadeOut(settings.interval);
				});
			}
		}
		
		function bindClick(){
			$(menu).children("li").children("a").bind("click", function(e){
				if($(this).siblings(".dropdown, .megapanel").css("display") == "none"){
					$(this).siblings(".dropdown, .megapanel").slideDown(settings.interval);
					$(this).siblings(".dropdown").find("ul").slideDown(settings.interval);
				}
				else{
					$(this).siblings(".dropdown, .megapanel").slideUp(settings.interval);
				}
			});
		}

		
		function showCollapse(){
			$(menu).children("li:not(.showhide)").hide(0);
			$(menu).children("li.showhide").show(0);
			$(menu).children("li.showhide").bind("click", function(){
				if($(menu).children("li").is(":hidden")){
					$(menu).children("li").slideDown(settings.interval);
				}
				else{
					$(menu).children("li:not(.showhide)").slideUp(settings.interval);
					$(menu).children("li.showhide").show(0);
				}
			});
		}
		
		function hideCollapse(){
			$(menu).children("li").show(0);
			$(menu).children("li.showhide").hide(0);
		}	
		
		function unbindEvents(){
			$(menu).find("li, a").unbind();
			$(document).unbind("click.menu touchstart.menu");
			$(menu).find(".dropdown, .megapanel").hide(0);
		}
	}
})(jQuery)