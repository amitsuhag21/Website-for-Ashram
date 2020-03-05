// Theme
window.theme = {};

// Carousel
(function(theme, $) {

	theme = theme || {};

	var instanceName = '__carousel';

	var PluginCarousel = function($el, opts) {
		return this.initialize($el, opts);
	};

	PluginCarousel.defaults = {
		itemsDesktop: [1199, 3],
		itemsDesktopSmall: [979, 3],
		itemsTablet: [768, 3],
		itemsTabletSmall: [568, 1],
		itemsMobile: [479, 1],
		navigationText : ["<i class=\"fa fa-angle-left\"></i>","<i class=\"fa fa-angle-right\"></i>"]
	};

	PluginCarousel.prototype = {
		initialize: function($el, opts) {
			if ($el.data(instanceName)) {
				return this;
			}

			this.$el = $el;

			this
				.setData()
				.setOptions(opts)
				.build();

			return this;
		},

		setData: function() {
			this.$el.data(instanceName, this);

			return this;
		},

		setOptions: function(opts) {
			this.options = $.extend(true, {}, PluginCarousel.defaults, opts, {
				wrapper: this.$el
			});

			return this;
		},

		build: function() {
			if (!($.isFunction($.fn.owlCarousel))) {
				return this;
			}

			// Force to Show 1 item if Items Settings is set to 1
			if (this.options.items === 1) {
				this.options = $.extend(true, {}, this.options, {
					itemsDesktop: false,
					itemsDesktopSmall: false,
					itemsTablet: false,
					itemsTabletSmall: false,
					itemsMobile: false
				});
			}

			this.options.wrapper.owlCarousel(this.options).addClass("owl-carousel-init");

			return this;
		}
	};

	// expose to scope
	$.extend(theme, {
		PluginCarousel: PluginCarousel
	});

	// jquery plugin
	$.fn.themePluginCarousel = function(opts) {
		return this.map(function() {
			var $this = $(this);

			if ($this.data(instanceName)) {
				return $this.data(instanceName);
			} else {
				return new PluginCarousel($this, opts);
			}

		});
	}

}).apply(this, [window.theme, jQuery]);

// Carousel
(function($) {

	'use strict';

	if ($.isFunction($.fn['themePluginCarousel'])) {

		$(function() {
			$('[data-plugin-carousel]:not(.manual), .owl-carousel:not(.manual)').each(function() {
				var $this = $(this),
					opts;

				var pluginOptions = $this.data('plugin-options');
				if (pluginOptions)
					opts = pluginOptions;

				$this.themePluginCarousel(opts);
			});
		});

	}

}).apply(this, [jQuery]);

// Scroll to Top
(function(theme, $) {

	theme = theme || {};

	$.extend(theme, {

		PluginScrollToTop: {

			defaults: {
				wrapper: $('body'),
				offset: 150,
				buttonClass: 'scroll-to-top',
				iconClass: 'fa fa-angle-up',
				delay: 500,
				visibleMobile: false,
				label: false
			},

			initialize: function(opts) {
				initialized = true;

				this
					.setOptions(opts)
					.build()
					.events();

				return this;
			},

			setOptions: function(opts) {
				this.options = $.extend(true, {}, this.defaults, opts);

				return this;
			},

			build: function() {
				var self = this,
					$el;

				// Base HTML Markup
				$el = $('<a />')
					.addClass(self.options.buttonClass)
					.attr({
						'href': '#',
					})
					.append(
						$('<i />')
						.addClass(self.options.iconClass)
				);

				// Visible Mobile
				if (!self.options.visibleMobile) {
					$el.addClass('hidden-mobile');
				}

				// Label
				if (self.options.label) {
					$el.append(
						$('<span />').html(self.options.label)
					);
				}

				this.options.wrapper.append($el);

				this.$el = $el;

				return this;
			},

			events: function() {
				var self = this,
					_isScrolling = false;

				// Click Element Action
				self.$el.on('click', function(e) {
					e.preventDefault();
					$('body, html').animate({
						scrollTop: 0
					}, self.options.delay);
					return false;
				});

				// Show/Hide Button on Window Scroll event.
				$(window).scroll(function() {

					if (!_isScrolling) {

						_isScrolling = true;

						if ($(window).scrollTop() > self.options.offset) {

							self.$el.stop(true, true).addClass('visible');
							_isScrolling = false;

						} else {

							self.$el.stop(true, true).removeClass('visible');
							_isScrolling = false;

						}

					}

				});

				return this;
			}

		}

	});

}).apply(this, [window.theme, jQuery]);

// Commom Plugins
(function($) {

	'use strict';

	// Scroll to Top Button.
	if ($.isFunction(theme.PluginScrollToTop.initialize)) {
		theme.PluginScrollToTop.initialize();
	}

	// Tooltips
	if ($.isFunction($.fn['tooltip'])) {
		$('[data-toggle="tooltip"]').tooltip();
	}

}).apply(this, [jQuery]);

// Countdown
(function($) {
    $('.countdown').each(function() {
        var count = $(this);
        $(this).countdown({
            zeroCallback: function(options) {
                var newDate = new Date(),
                    newDate = newDate.setHours(newDate.getHours() + 530);

                $(count).attr("data-countdown", newDate);
                $(count).countdown({
                    unixFormat: true
                });
            }
        });
    });
}).apply(this, [jQuery]);

// Chosen
(function($) {
    var config = {
	  '.chosen-select'           : {},
	  '.chosen-select-deselect'  : {allow_single_deselect:true},
	  '.chosen-select-no-single' : {disable_search_threshold:10},
	  '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
	  '.chosen-select-width'     : {width:"95%"}
	}
	for (var selector in config) {
	  $(selector).chosen(config[selector]);
	}
}).apply(this, [jQuery]);

// Price Filter
(function($) {
    $( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: 500,
		values: [ 0, 500 ],
		slide: function( event, ui ) {
	event = event;
			$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		}
	});
	$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
		" - $" + $( "#slider-range" ).slider( "values", 1 ) );
}).apply(this, [jQuery]);

// Flexslider
(function($) {
	$('.flexsliderPro').flexslider({
		animation: "slide",
		controlNav: "thumbnails",
		smoothHeight: true,
		slideshow: false,
		directionNav: false
	});
}).apply(this, [jQuery]);

// Modal
function initFlexModal() {
	$('.flexsliderModal').flexslider({
		animation: "slide",
		controlNav: "thumbnails",
		smoothHeight: true,
		slideshow: false,
		directionNav: false
	});
};

(function($) {
	$('#quickview-detail').on('shown.bs.modal', function (e) { 
		e.preventDefault();
		initFlexModal();
	});
}).apply(this, [jQuery]);

// Nav
(function($) {
	 $('.nav-main-menu li.dropdown').hover(function () {
        $(this).addClass('open');
    }, function () {
        $(this).removeClass('open');
    });
}).apply(this, [jQuery]);

// Mansory
(function($) {

	if($(window).width() < 640) return;
			
	var $container = $('.blog-masonry');
	// initialize
	
	$container.imagesLoaded( function() {
		$container.masonry();
	});
	var $posts = document.querySelectorAll('.post-mansory-item');
	imagesLoaded( $posts, function() {
		$container.masonry({
			itemSelector: '.post-mansory-item'
		});
	});

}).apply(this, [jQuery]);

// Lightbox
(function($) {

	 $('.popup-img').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false,
		fixedContentPos: true,
		mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300 // don't foget to change the duration also in CSS
		}
	}); 

}).apply(this, [jQuery]);
