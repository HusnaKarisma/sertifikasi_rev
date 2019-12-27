(function($){

  var App = window.App = {
    init: function() {
      App.initBinding();
      // App.initFullscreen();
      App.initSticky();
      // App.initFancybox();
      //App.initIsotope();
      // App.initAnimate();
      App.initBackToTop();
      // App.initMagazineImagePath()
      App.initSearch();
      // App.initSelect();
    },
    initBinding: function() {
      // Preloader
        // $('#loader').delay(700).fadeOut();
        $('#mask').delay(1200).fadeOut("slow");  

      // On hover, open drop down menu
      $('.navbar-nav li.dropdown').on({
        mouseenter: function () {
          $(this).addClass('open');
        }, mouseleave: function () {
          $(this).removeClass('open');
        }
      });

      var clicked = 0;
      $('.navbar-nav li.dropdown a').focus(function(event) {
        /* Act on the event */
        $(this).parents('li.dropdown').addClass('open');
        clicked = 1;
      });
      $('.navbar-nav li.dropdown .mobile-arrow').click(function(event) {
        /* Act on the event */
        if (clicked > 1){
          $(this).parent('.dropdown').toggleClass('open');
        } else {
          clicked++;
          $(this).parent('.dropdown').removeClass('open');
        }

        //
      });;

      // add class have-megamenu to parent
      $('.navbar-nav .megamenu').parents('li.dropdown').addClass('have-megamenu');

      // Click Info Circle
      $('.info-circle').click(function(event) {
        /* Act on the event */
        var $parent = $(this).parent('figure'),
          $child = $(this).children('i');
        if($parent.hasClass('open')){
          $parent.removeClass('open');
          $child.removeClass('fa-times').addClass('fa-info');
        } else {
          $parent.addClass('open');
          $child.removeClass('fa-info').addClass('fa-times');
        }
      });

      // Submit Search
      $('form[name="searchform"]').submit(function(event) {
        /* Act on the event */
        event.preventDefault();
        var mySearch = "http://perpusnas.go.id/id/";
        var actionUrl = $('select[name="search-source"]').val(),
          keyword = $(this).find('input[name="lookfor"]').val();
        
        if(actionUrl == mySearch){
          actionUrl = mySearch;
          window.open(actionUrl+'?s='+keyword, '_blank');
          //window.open(actionUrl+'?q='+keyword+' site:www.perpusnas.go.id', '_blank');
          //header("Location : "+actionUrl+'?lookfor='+keyword);    
        }else{
          window.open(actionUrl+'?lookfor='+keyword, '_blank');
        }

        //bing.com/search?q=buku site:www.perpusnas.go.id
        

        //alert(actionUrl+'/?lookfor='+keyword);
      });

      $('.no-hover, .no-hover a').click(function(event) {
        /* Act on the event */
        event.preventDefault();
      });

      var $window = $(window);
      var scrollFade = function ($element, friction, offset) {
        friction  = (friction  === undefined)? 0.5 : friction;
        offset = (offset === undefined)? 0 : offset;

        var parentHeight = $element.parent().outerHeight() * 0.5;
        var previousOpacity = Infinity;

        $window.scroll(function() {
          var scrollTop = Math.max(0, $window.scrollTop())
          , yOffset   = ($element.outerHeight() * -0.5) + scrollTop * friction
          , opacity   = 1 - (scrollTop / parentHeight - (parentHeight * offset))

          if (opacity < 0 && previousOpacity < 0) return;

          $element.css({
            transform: 'translate3d(0px,'+ yOffset +'px, 0)',
            opacity: opacity
          });

          previousOpacity = opacity;
        });
      }

      //scrollFade($('#home-slider .list-services ul')
      //  , 0.6  // Friction (0 ~ 1): lower = none
      //  , 0    // Fade duration (0 ~ 1): lower = longer
      //);
    },
    initSticky: function() {
      /*$('#header').sticky({ topSpacing: 0 });
      $(window).resize(function(event) {
        $('#header').unstick();
        $('#header').sticky({ topSpacing: 0 });
      });*/

      var searchContainer = $("#pm-search-container");

      $(window).on("scroll", function() {
          if($(window).scrollTop() > 50) {
              $(".new-header").addClass("fixed");
               /*searchContainer.css({
                'height' : $(window).height(),
                'opacity' : 1,
                'top' : '53px' 
            });*/
          } else {
              //remove the background property so it comes transparent again (defined in your css)
             $(".new-header").removeClass("fixed");
            /* searchContainer.css({
                  'height' : $(window).height(),
                  'opacity' : 1,
                  'top' : '116px' 
              });*/
          }
      });

    },
    initFancybox: function() {
      $('.gallery-item a').each(function(index, el) {
        $(this).attr('rel', 'gallery');
      }).fancybox();
    },
    initIsotope: function() {
      // init Isotope
      
    },
    initAnimate: function() {
      $('.animated').appear(function() {
        var element = $(this);
        var animation = element.data('animation');
        var animationDelay = element.data('delay');
        if(animationDelay) {
          setTimeout(function(){
            element.addClass( animation + " visible" );
            element.removeClass('hiding');
          }, animationDelay);
        } else {
          element.addClass( animation + " visible" );
          element.removeClass('hiding');
        }         
      }, {accY: -150});
    },
    initBackToTop: function() {
      // fade in .back-to-top
      $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
          $('.back-to-top').fadeIn();
        } else {
          $('.back-to-top').fadeOut();
        }
      });

      // scroll body to 0px on click
      $('.back-to-top').click(function () {
        $('html,body').animate({
          scrollTop: 0
        }, 1500);
        return false;
      });
    },
    
    initMagazineImagePath : function(){
      if ($('#magazine').length){
        $('img[src*="gambarmajalah/"]').each(function(index, el) {
          var currentSrc = $(this).attr('src'),
            src = home_url + '/assets/uploads/' + currentSrc;
          
          $(this).attr('src', src);
        });
      }
    },
    initSearch :function(){
      var searchContainer = $("#pm-search-container");
    
        searchContainer.css({
            'display' : 'none',
            'height' : 0
        });
        
        $('.search-btn').click(function(e) {
          $(window).on("scroll", function() {
            if($(window).scrollTop() > 50) {
                $(".new-header").addClass("fixed");
                 searchContainer.css({
                  'height' : '70px',
                  'display' : 'block',
                  'top' : '54px' 
              });
            } else {
                //remove the background property so it comes transparent again (defined in your css)
               $(".new-header").removeClass("fixed");
               searchContainer.css({
                  'height' : '70px',
                  'display' : 'block',
                  'top' : '135px' 
              });
            }
        });
                
         if ($('.new-header').hasClass('fixed')){
            searchContainer.css({
                'height' : '70px',
                'display' : 'block',
                'top' : '54px' 
            });
              
              e.preventDefault();

            } else {
           searchContainer.css({
                'height' : '70px',
                'display' : 'block',
                'top' : '135px' 
            });
              
              e.preventDefault();
        }
        if ($(window).width()<1024){
          $(window).on("scroll", function() {
            if($(window).scrollTop() > 50) {
                $(".new-header").addClass("fixed");
                 searchContainer.css({
                  'height' : 'auto',
                  'display' : 'block',
                  'top' : '52px' 
              });
            } else {
                //remove the background property so it comes transparent again (defined in your css)
               $(".new-header").removeClass("fixed");
               searchContainer.css({
                  'height' : 'auto',
                  'display' : 'block',
                  'top' : '125px' 
              });
            }
        });
          if($('.collapse').hasClass("in")){
            if($('.new-header').hasClass('fixed')){
              $('.collapse').removeClass("in");
                searchContainer.css({
                    'height' : 'auto',
                    'display' : 'block',
                    'top' : '52px' 
                });
              
                  e.preventDefault();
              }else{
                $('.collapse').removeClass("in");
              searchContainer.css({
                    'height' : 'auto',
                    'display' : 'block',
                    'top' : '125px' 
                });
              }
            
          }
        }
                            
        });
      
    
        $('#pm-search-collapse').click(function(e) {
            $(window).on("scroll", function() {
              if($(window).scrollTop() > 50) {
                  $(".new-header").addClass("fixed");
                   searchContainer.css({
                    'display' : 'none',
                    'top': 0
                });
              } else {
                  //remove the background property so it comes transparent again (defined in your css)
                  $(".new-header").removeClass("fixed");
                  searchContainer.css({
                    'display' : 'none', 
                    'top': 0
                });
              }
          });
            
            
                if ($('.new-header').hasClass('fixed')){
             $('.fixed #pm-search-container').css({
                      'top' : '-150px'    
                  });
                  
                e.preventDefault();
              } else {
                $('#pm-search-container').css({
                      'top' : '-154px'    
                  });
                
                e.preventDefault();
             
          }
            
        });
           
    },
    initSelect: function(){
      $('.widget_polylang select').selectpicker({});
    },
    initFullscreen: function(){
      // initialize the slideshow
      $('.fullscreen-lightbox img').fullscreenslides();

      // All events are bound to this container element
      var $container = $('#fullscreenSlideshowContainer');

      $container
      //This is triggered once:
      .bind("init", function() { 

        // The slideshow does not provide its own UI, so add your own
        // check the fullscreenstyle.css for corresponding styles
        $container
          .append('<div class="ui" id="fs-close">&times;</div>')
          .append('<div class="ui" id="fs-loader">Loading...</div>')
          .append('<div class="ui" id="fs-prev"><i class="fa fa-angle-left"></i></div>')
          .append('<div class="ui" id="fs-next"><i class="fa fa-angle-right"></i></div>')
          .append('<div class="ui" id="fs-caption"><span></span></div>');
        
        // Bind to the ui elements and trigger slideshow events
        $('#fs-prev').click(function(){
          // You can trigger the transition to the previous slide
          $container.trigger("prevSlide");
        });
        $('#fs-next').click(function(){
          // You can trigger the transition to the next slide
          $container.trigger("nextSlide");
        });
        $('#fs-close').click(function(){
          // You can close the slide show like this:
          $container.trigger("close");
        });
        
      })
      // When a slide starts to load this is called
      // .bind("startLoading", function() { 
      //   // show spinner
      //   $('#fs-loader').show();
      // })
      // When a slide stops to load this is called:
      // .bind("stopLoading", function() { 
      //   // hide spinner
      //   $('#fs-loader').hide();
      // })
      // When a slide is shown this is called.
      // The "loading" events are triggered only once per slide.
      // The "start" and "end" events are called every time.
      // Notice the "slide" argument:
      .bind("startOfSlide", function(event, slide) { 
        // set and show caption
        $('#fs-caption span').text(slide.title);
        $('#fs-caption').show();
      })
      // before a slide is hidden this is called:
      .bind("endOfSlide", function(event, slide) { 
        $('#fs-caption').hide();
      });
    }
  };

  App.init();

})(jQuery);



var shareButton = new ShareButton({
  ui: {
    collision: true
  }
});
window.setTimeout(function() { shareButton.toggle(); }, 1000);
shareButton.toggleListen();