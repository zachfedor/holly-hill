jQuery(function($){

    $primary_navigation = $('#nav');

    $("#menu-primary-navigation").slicknav({
        prependTo:$('.nav-primary').find('.container'),
        label: '',
        allowParentLinks: true
    });

	//Add Hover effect to menus
	jQuery('ul.nav li.dropdown').hover(function() {
	  jQuery(this).find('.dropdown-menu').stop(true, true).delay(10).fadeIn();
	}, function() {
	  jQuery(this).find('.dropdown-menu').stop(true, true).delay(10).fadeOut();
	});

    $primary_navigation.find('.sub-menu').find('li').on('hover', function(){
        $primary_navigation.find('li').removeClass('hover-menu');
        $(this).parent().parent().addClass('hover-menu');
    });



    $primary_navigation.find('.sub-menu').on('mouseout', function(){
        $primary_navigation.find('li').removeClass('hover-menu');
    });

    /**************************************
     // BEGIN SEARCH FORM
     ***************************************/

        // Search Form Toggle
    $primary_navigation.find('.search-form').on('click', function(e){
        e.stopImmediatePropagation();
    });

    $primary_navigation.find('.search-toggle').on('click', function(e){
        e.stopImmediatePropagation();
        if(!$('#nav').find('.search-form').hasClass('open')) {
            open_search_form();
        } else {
            close_search_form();
        }
    });

    function open_search_form(){
        $primary_navigation.find('.search-form').removeClass('close');
        $primary_navigation.find('.search-form').toggleClass('open');
        $primary_navigation.find('.search-form.open').animate({'height': '75px'}, 150, 'linear');
    }

    function close_search_form(){
        $primary_navigation.find('.search-form.open').animate({'height': '0px'}, 150, 'linear');
        $primary_navigation.find('.search-form').toggleClass('open');
    }
    // Search Form Toggle

    /**************************************
     // END SEARCH FORM
     ***************************************/

});
