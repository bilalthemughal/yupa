/* UItoTop jQuery Plugin | Matt Varone | http://www.mattvarone.com/web-design/uitotop-jquery-plugin */
!function(n){n.fn.UItoTop=function(o){var e={text:"To Top",min:200,inDelay:600,outDelay:400,containerID:"toTop",containerHoverID:"toTopHover",scrollSpeed:1200,easingType:"linear"},t=n.extend(e,o),i="#"+t.containerID,a="#"+t.containerHoverID;n("body").append('<a href="#" id="'+t.containerID+'"><span>'+t.text+"</span></a>"),n(i).hide().on("click.UItoTop",function(){return n("html, body").animate({scrollTop:0},t.scrollSpeed,t.easingType),n("#"+t.containerHoverID,this).stop().animate({opacity:0},t.inDelay,t.easingType),!1}).hover(function(){n(a,this).stop().animate({opacity:1},600,"linear")},function(){n(a,this).stop().animate({opacity:0},700,"linear")}),n(window).scroll(function(){var o=n(window).scrollTop();"undefined"==typeof document.body.style.maxHeight&&n(i).css({position:"absolute",top:o+n(window).height()-50}),o>t.min?n(i).fadeIn(t.inDelay):n(i).fadeOut(t.Outdelay)})}}(jQuery);
/* jquery.stickup.min.js */
!function(t){t.fn.stickUp=function(e){function o(){a=parseInt(n.offset().top),d=parseInt(n.css("margin-top")),u=parseInt(n.outerHeight(!0)),c.pseudo&&(t('<div class="pseudoStickyBlock"></div>').insertAfter(n),i=t(".pseudoStickyBlock"),i.css({position:"relative",display:"block"})),c.active&&s(),n.addClass("stuckMenu")}function s(){p.on("scroll.stickUp",function(){r=t(this).scrollTop(),S=r>k?"down":"up",k=r,0!=h.length?correctionValue=h.outerHeight(!0):correctionValue=0,f=parseInt(l.scrollTop()),a-correctionValue<f?(n.addClass("isStuck"),v.addClass("isStuck"),c.pseudo?(n.css({position:"fixed",top:correctionValue}),i.css({height:u})):n.css({position:"fixed",top:correctionValue})):(n.removeClass("isStuck"),v.removeClass("isStuck"),c.pseudo?(n.css({position:"relative",top:0}),i.css({height:0})):n.css({position:"absolute",top:0}))}).trigger("scroll.stickUp"),p.on("resize",function(){n.hasClass("isStuck")?a!=parseInt(i.offset().top)&&(a=parseInt(i.offset().top)):a!=parseInt(n.offset().top)&&(a=parseInt(n.offset().top))})}var c={correctionSelector:".correctionSelector",listenSelector:".listenSelector",active:!1,pseudo:!0};t.extend(c,e);var i,r,n=t(this),l=t(window),p=t(document),a=0,u=0,d=0,f=0,k=0,S="",h=t(c.correctionSelector),v=t(c.listenSelector);0!=n.length&&o()}}(jQuery);

(function( $ ) {
	"use strict";

	CherryJsCore.utilites.namespace( 'theme_script' );
	CherryJsCore.theme_script = {
		init: function() {
			// Document ready event check
			if ( CherryJsCore.status.is_ready ) {
				this.document_ready_render();
			} else {
				CherryJsCore.variable.$document.on( 'ready', this.document_ready_render.bind( this ) );
			}

			// Windows load event check
			if ( CherryJsCore.status.on_load ) {
				this.window_load_render();
			} else {
				CherryJsCore.variable.$window.on( 'load', this.window_load_render.bind( this ) );
			}
		},

		document_ready_render: function() {
			// post format
			this.post_formats_custom_init( this );
			// widgets
			this.subscribe_init( this );
			this.swiper_carousel_init( this );
			// menus
			this.main_menu( this, $( '.main-navigation' ) );
			// plugins
			this.add_project_inline_style( this );
			// misc
			this.to_top_init( this );
			this.header_search( this );
			this.ofi_init( this );
			this.marquee_init( this );
			this.parallax_init( this );
		},

		window_load_render: function() {
			this.page_preloader_init( this );
			this.navbar_init( this );
		},

		mobile_breakpoint: 600,

		post_formats_custom_init: function( self ) {
			CherryJsCore.variable.$document.on( 'cherry-post-formats-custom-init', function( event ) {

				if ( 'slider' !== event.object ) {
					return;
				}

				var uniqId = '#' + event.item.attr( 'id' ),
					settings = event.item.data( 'init' ),
					swiper = new Swiper( uniqId, {
						pagination: uniqId + ' .swiper-pagination',
						paginationClickable: true,
						nextButton: uniqId + ' .swiper-button-next',
						prevButton: uniqId + ' .swiper-button-prev',
						spaceBetween: 0,
						loop: settings['loop'],
						onInit: function() {
							if ( settings['arrows'] ) {
								$( uniqId + ' .swiper-button-next' ).css( { 'display': 'block' } );
								$( uniqId + ' .swiper-button-prev' ).css( { 'display': 'block' } );
							}
							if ( settings['buttons'] ) {
								$( uniqId + ' .swiper-pagination' ).css( { 'display': 'block' } );
							}
						}
					} );

				event.item.data( 'initalized', true );
			} );
		},

		swiper_carousel_init: function (self) {

			// Enable swiper carousels
			jQuery( '.galwalking-carousel' ).each( function() {
				var swiper = null,
					uniqId = jQuery( this ).data( 'uniq-id' ),
					slidesPerView = parseFloat( jQuery( this ).data( 'slides-per-view' ) ),
					slidesPerGroup = parseFloat( jQuery( this ).data( 'slides-per-group' ) ),
					slidesPerColumn = parseFloat( jQuery( this ).data( 'slides-per-column' ) ),
					spaceBetweenSlides = parseFloat( jQuery( this ).data( 'space-between-slides' ) ),
					durationSpeed = parseFloat( jQuery( this ).data( 'duration-speed' ) ),
					swiperLoop = jQuery( this ).data( 'swiper-loop' ),
					freeMode = jQuery( this ).data( 'free-mode' ),
					grabCursor = jQuery( this ).data( 'grab-cursor' ),
					mouseWheel = jQuery( this ).data( 'mouse-wheel' ),
					breakpointsSettings = {
						1199: {
							slidesPerView: Math.floor( slidesPerView * 0.75 ),
							spaceBetween: Math.floor( spaceBetweenSlides * 0.75 )
						},
						991: {
							slidesPerView: Math.floor( slidesPerView * 0.5 ),
							spaceBetween: Math.floor( spaceBetweenSlides * 0.5 )
						},
						767: {
							slidesPerView: ( 0 !== Math.floor( slidesPerView * 0.25 ) ) ? Math.floor( slidesPerView * 0.25 ) : 1
						}
					};

				if ( 1 == slidesPerView ) {
					breakpointsSettings = {}
				}

				var swiper = new Swiper( '#' + uniqId, {
						slidesPerView: slidesPerView,
						slidesPerGroup: slidesPerGroup,
						slidesPerColumn: slidesPerColumn,
						spaceBetween: spaceBetweenSlides,
						speed: durationSpeed,
						loop: swiperLoop,
						freeMode: freeMode,
						grabCursor: grabCursor,
						mousewheelControl: mouseWheel,
						paginationClickable: true,
						nextButton: '#' + uniqId + '-next',
						prevButton: '#' + uniqId + '-prev',
						pagination: '#' + uniqId + '-pagination',
						onInit: function() {
							$( '#' + uniqId + '-next' ).css( { 'display': 'block' } );
							$( '#' + uniqId + '-prev' ).css( { 'display': 'block' } );
						},
						breakpoints: breakpointsSettings
					}
				);
			} );
		},

		subscribe_init: function( self ) {
			CherryJsCore.variable.$document.on( 'click', '.subscribe-block__submit', function( event ) {

				event.preventDefault();

				var $this = $( this ),
					form = $this.parents( 'form' ),
					nonce = form.find( 'input[name="nonce"]' ).val(),
					mail_input = form.find( 'input[name="subscribe-mail"]' ),
					mail = mail_input.val(),
					error = form.find( '.subscribe-block__error' ),
					success = form.find( '.subscribe-block__success' ),
					hidden = 'hidden';

				if ( '' === mail ) {
					mail_input.addClass( 'error' );
					return !1;
				}

				if ( $this.hasClass( 'processing' ) ) {
					return !1;
				}

				$this.addClass( 'processing' );
				form.addClass( 'processing' );
				error.empty();
				mail_input.removeClass( 'error' );

				if ( !error.hasClass( hidden ) ) {
					error.addClass( hidden );
				}

				if ( !success.hasClass( hidden ) ) {
					success.addClass( hidden );
				}

				$.ajax( {
					url: galwalking.ajaxurl,
					type: 'post',
					dataType: 'json',
					data: {
						action: 'galwalking_subscribe',
						mail: mail,
						nonce: nonce
					},
					error: function() {
						$this.removeClass( 'processing' );
						form.removeClass( 'processing' );
					}
				} ).done( function( response ) {

					$this.removeClass( 'processing' );
					form.removeClass( 'processing' );

					if ( true === response.success ) {
						success.removeClass( hidden );
						mail_input.val( '' );
						return 1;
					}

					error.removeClass( hidden ).html( response.data.message );
					mail_input.addClass( 'error' );
					return !1;

				} );

			} );
		},

		navbar_init: function( self ) {

			var $navbar = $( '.header-container' );

			if ( !$.isFunction( jQuery.fn.stickUp ) || undefined === window.galwalking.stickUp || !$navbar.length ) {
				return !1;
			}

			$navbar.stickUp( {
				correctionSelector: '#wpadminbar',
				listenSelector: '.listenSelector',
				pseudo: true,
				active: true
			} );
			CherryJsCore.variable.$document.trigger( 'scroll.stickUp' );
		},

		main_menu: function( self, $mainNavigation ) {

			var $menuToggle = $( '.menu-toggle', $mainNavigation );

			$menuToggle.on( 'click', function( $event ) {
				$event.preventDefault();
				$mainNavigation.toggleClass( 'toggled' );
				$( this ).toggleClass( 'toggled' );
			} );
		},

		page_preloader_init: function( self ) {

			if ( $( '.page-preloader-cover' )[0] ) {
				$( '.page-preloader-cover' ).delay( 500 ).fadeTo( 500, 0, function() {
					$( this ).remove();
				} );
			}
		},

		to_top_init: function( self ) {
			if ( $.isFunction( jQuery.fn.UItoTop ) && undefined !== window.galwalking.toTop ) {
				$().UItoTop( {
					text: galwalking.labels.totop_button,
					scrollSpeed: 600
				} );
			}

			function setToTopPosition() {
				var $pageBoxed = $( '.page-layout-boxed > .site.container' ),
					offset = $pageBoxed.offset().left;

				$( '#toTop' ).css({
					'right': offset
				});
			}

			if ( $( 'body' ).hasClass( 'page-layout-boxed' ) && $( '#toTop' )[0] ) {
				setToTopPosition();
				CherryJsCore.variable.$window.on( 'resize', setToTopPosition );
			}
		},

		ofi_init: function( self ) {
			if ( $( 'body' ).hasClass( 'ie' ) && 'undefined' !== typeof objectFitImages ) {
				objectFitImages();
			}
		},

		header_search: function( self ) {
			var $header = $( '.site-header' ),
				$searchToggle = $( '.search-form__toggle, .search-form__close', $header ),
				$headerSearch = $( '.header-search', $header ),
				$searchInput = $( '.search-form__field', $headerSearch ),
				searchHandler = function( event ) {
					$header.toggleClass( 'search-active' );
					if ( $header.hasClass( 'search-active' ) ) {
						$searchInput.focus();
					}
				},
				removeActiveClass = function( event ) {
					if ( $( event.target ).closest( $searchToggle ).length || $( event.target ).closest( $headerSearch ).length ) {
						return;
					}

					if ( $header.hasClass( 'search-active' ) ) {
						$header.removeClass( 'search-active' );
					}

					event.stopPropagation();
				};

			$searchToggle.on( 'click', searchHandler );
			CherryJsCore.variable.$document.on( 'click', removeActiveClass );

		},

		add_project_inline_style: function( self ) {
			var $projectGridContainer = $( '.projects-container.grid-layout' ),
				$projectMasonryContainer = $( '.projects-container.masonry-layout' ),
				$projectJustifiedContainer = $( '.projects-container.justified-layout' ),
				$projectCascadGridContainer = $( '.projects-container.cascading-grid-layout' ),

				$projectGridTermsContainer = $( '.projects-terms-container.grid-layout' ),
				$projectMasonryTermsContainer = $( '.projects-terms-container.masonry-layout' ),
				$projectCascadGridTermsContainer = $( '.projects-terms-container.cascading-grid-layout' ),

				$projectContainer = $( '.projects-container' ),

				addProjectsListStyle = function() {
					var $this = $( this ),
						$projectsSettings = $this.data( 'settings' ),
						$projectItemIndent = Math.ceil( +$projectsSettings['item-margin'] );

					$( '.cherry-animation-list', $this ).css( {
						'margin-left': -$projectItemIndent / 2 + 'px',
						'margin-right': -$projectItemIndent / 2 + 'px'
					} );
				},

				addProjectItemHeight = function() {
					var $this = $( this ),
						$projectsSettings = $this.data( 'settings' ),
						$height = Math.ceil( +$projectsSettings['fixed-height'] );

					$( '.inner-wrapper .featured-image img', $this ).css({
						'height' : $height + 'px'
					});
				},

				modifyMasonryItemMargin = function() {
					var $this = $( this ),
						$projectsSettings = $this.data( 'settings' ),
						$projectItemIndent = Math.ceil( +$projectsSettings['item-margin'] );

					$( '.cherry-animation-list .inner-wrapper', $this ).css( {
						'margin': $projectItemIndent / 2 + 'px'
					} );
				},

				cherryProjectsAjaxSuccessHandler = function() {

					$projectJustifiedContainer.each( addProjectItemHeight );
					$projectCascadGridContainer.each( addProjectItemHeight );

					$projectGridContainer.each( addProjectsListStyle );
					$projectMasonryContainer.each( addProjectsListStyle );
					$projectJustifiedContainer.each( addProjectsListStyle );

					$projectMasonryContainer.each( modifyMasonryItemMargin );
				},

				addTemplateClass = function() {
					var $this = $( this ),
						$projectsSettings = $this.data( 'settings' ),
						$projectsTemplate = $projectsSettings['template'];

					if ( $projectsTemplate ) {
						$this.addClass( $projectsTemplate.replace( '.', '-' ) );
					}
				};

			$projectContainer.each( addTemplateClass );

			$projectGridTermsContainer.each( addProjectsListStyle );
			$projectMasonryTermsContainer.each( addProjectsListStyle );
			$projectCascadGridTermsContainer.each( addProjectsListStyle );

			$( window ).on( 'load', function() {
				$projectMasonryTermsContainer.each( modifyMasonryItemMargin );
			} );

			CherryJsCore.variable.$document.on( 'getNewProjectsListAjaxSuccess getMoreProjectsAjaxSuccess', cherryProjectsAjaxSuccessHandler );
		},

		marquee_init: function( self ) {
			var marquee = $( '.marquee' );

			marquee.each( function() {

				$( this ).wrapInner( '<span class="marquee-inner">' );

				$( '.marquee-inner', this ).clone().appendTo( this );

				var inner = $( '.marquee-inner', this );

				inner.stretch();

				var resizeHandler = function() {
					inner.unwrap( '.stretch--resizer' );
					inner.unwrap( '.stretch--handle' );
					inner.stretch();
				};

				$( window ).on( 'resize.marquee', resizeHandler );

			} );
		},

		parallax_init: function( self ) {
			(function() {
				var lastTime = 0;
				var vendors = ['ms', 'moz', 'webkit', 'o'];
				for ( var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x ) {
					window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
					window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame']
						|| window[vendors[x] + 'CancelRequestAnimationFrame'];
				}

				if ( !window.requestAnimationFrame )
					window.requestAnimationFrame = function( callback, element ) {
						var currTime = new Date().getTime();
						var timeToCall = Math.max( 0, 16 - (currTime - lastTime) );
						var id = window.setTimeout( function() {
								callback( currTime + timeToCall );
							},
							timeToCall );
						lastTime = currTime + timeToCall;
						return id;
					};

				if ( !window.cancelAnimationFrame )
					window.cancelAnimationFrame = function( id ) {
						clearTimeout( id );
					};
			}());

			(function jlParallax() {
				var parInners = document.querySelectorAll( '.parallax .elementor-widget-container' );
				var layer, height, heightPar, src, boundingClientRect, y, windowHeight;
				var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test( navigator.userAgent );
				var depth = 0.1;

				windowHeight = window.innerHeight;

				function scrollParametrs() {
					boundingClientRect = layer.parentNode.getBoundingClientRect();
					y = ( boundingClientRect.top - windowHeight / 2 + heightPar / 2) * depth;
					if ( layer.parentNode.classList.contains( 'parallax-inverse' ) ) {
						layer.style.setProperty( '--ty', (-y) + 'px' );
						if ( depth == 1 ) {
							// layer.style.position = 'static';
						}
					} else {
						layer.style.setProperty( '--ty', (y) + 'px' );
					}
				}

				for ( var i = 0; i < parInners.length; i++ ) {
					layer = parInners[i];
					heightPar = layer.parentNode.clientHeight;
					if ( layer.hasAttribute( 'data-image' ) ) {
						// Create bg image
						src = layer.getAttribute( "data-image" );
						layer.style.setProperty( "background-image", "url(" + src + ")" );
					} else if ( layer.getElementsByClassName( 'jl-parallax-content' ) ) {
						scrollParametrs();
					}
				}

				function parallaxScroll() {
					for ( var i = 0; i < parInners.length; i++ ) {
						layer = parInners[i];
						heightPar = layer.parentNode.clientHeight;
						scrollParametrs();
					}
				}

				if ( !isMobile ) {
					for ( i = 0; i < parInners.length; i++ ) {
						layer = parInners[i];

						if ( layer.hasAttribute( 'data-image' ) ) {
							// Parallax inner height
							heightPar = layer.parentNode.clientHeight;
							height = heightPar + ( windowHeight + heightPar ) * Math.abs( depth );
							layer.style.setProperty( "height", height + "px" );
							scrollParametrs();
						}
					}

					window.addEventListener( "resize", function() {
						windowHeight = window.innerHeight;
						for ( var i = 0; i < parInners.length; i++ ) {
							layer = parInners[i];

							if ( layer.hasAttribute( 'data-image' ) ) {
								// Parallax inner height
								height = heightPar + ( windowHeight + heightPar ) * Math.abs( depth );
								layer.style.setProperty( "height", height + "px" );
								scrollParametrs();
							}
						}
					} );

					window.addEventListener( 'scroll', function() {
						window.requestAnimationFrame( parallaxScroll );
					} );
				}
			})();
		}
	};

	CherryJsCore.theme_script.init();

}( jQuery ));
