"use strict";
    
    // import map from "./map";
    import 'bootstrap';
    // import parallax from 'parallax-scroll';
    $(document).ready(function(){
    	console.log('hello there?');
  
    	//********
    	//wpVars = is define in wp_localize_script can be use directly here as wpVar.logo
    	//********
    	

    	// sample call to WP AJAX
    	// $.ajax({
	    //     url: wpAjax.ajaxurl, // wpAjax - define in wp_enque
	    //     dataType:'html',
	    //     // live_search action is define in WP with add_action('wp_ajax_nopriv_live_search','live_search')
	    //     data:{action:"live_search",key:$(this).val()}, 
	    // })
	    // 
	    // 
	    // PARALLAX
	    // =========================
	    //const parallax = new Parallax('.js-parallax', {
		//   speed: 0.2, // Anything over 0.5 looks silly
		// });
		// parallax.animate();
		// ======================
		// html sample
		// <div class="o-banner">
		//   <div class="o-banner__img js-parallax" style="background-image: url(path/to/some/img.jpg);"></div>
		// </div>
		$('.menu-item-main').each(function () {
			var link = $(this).children('a'),
			    hasSubmenu = $(this).has('.submenu').length>0?true:false;
			    console.log(link.text()+' '+ hasSubmenu)
			    if(hasSubmenu){
			    	link.attr('href','#')
			    	$(this).addClass('no-link')
			    }
		})
    })
