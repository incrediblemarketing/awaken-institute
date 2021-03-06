(function($, window, document, undefined) {
  "use strict";

  $(document).ready(function() {
    var $cache = {
      window: $(window),
      document: $(document),
      html: $("html").eq(0),
      body: $("body").eq(0),
      jsToTop: $(".js-to-top"),
      jsScrollTo: $(".js-scroll-to"),
      siteWrap: $(".site-wrap"),
      siteNav: $(".site-nav")
    };

    var IM = {
      init: function() {
        this.utils.init();
      },
      utils: {
        init: function() {
          this.scrollTo();
          this.dataCss();
          this.scrollMagic();
          this.mobileMenu();
          this.siteNavSticky();
          this.galleryBuilder();
					this.swiperSetup();
					this.headingRotator();
					this.popup();
				},
				popup: function(){
					setTimeout(function() {
						if ($('#popup').length) {
							$.magnificPopup.open({
							 items: {
									 src: '#popup' 
							 },
							 type: 'inline'
								 });
							}
						}, 1000);

						$('#menu-item-1273 a').attr("target","_blank");

						
							$('.popup-youtube').magnificPopup({
								disableOn: 700,
								type: 'iframe',
								mainClass: 'mfp-fade',
								removalDelay: 160,
								preloader: false,
								fixedContentPos: false
							});
					
				},
				headingRotator: function() {
					setInterval(function(){
						var active = $('.rotating-header strong.active');
						if(active.is(':last-child'))
						{
								active.removeClass('active');
								active = $('.rotating-header strong').first().addClass('active');
						}else{
								active.next('strong').addClass('active');
								active.removeClass('active');
						}
					}, 4000);
				},
        siteNavSticky: function() {
          $cache.window.scroll(function() {
            if ($cache.window.scrollTop() > 0) {
              $cache.siteNav.addClass("sticky");
            } else {
              $cache.siteNav.removeClass("sticky");
            }
          });
        },
        mobileMenu: function() {
          /* stop jump to top if link is # */
          $('a[href="#"]').on("click", function(e) {
            e.preventDefault();
          });

          $(".menu__mobile .menu li.menu-item-has-children > a").after(
            '<i class="fal fa-angle-down"></i>'
          );

          $(".menu__mobile .menu li.menu-item-has-children i").on(
            "click",
            function() {
              $(this)
                .closest(".menu-item-has-children")
                .find("> .sub-menu")
                .toggleClass("active");
            }
          );

          var tl = new TimelineLite({ paused: true, reversed: true });

          tl.to(".menu__mobile", 0.1, {
            zIndex: 9999,
            opacity: 1,
            left: 0
          });
          tl.staggerTo(
            ".menu__mobile .menu > li",
            0.25,
            { left: 0, opacity: 1 },
            0.1
          );

          $('[data-toggle="menu"]').on("click", function() {
            tl.reversed() ? tl.play() : tl.reverse();
          });
        },
        scrollTo: function() {
          // Animate the scroll to top
          $cache.jsToTop.on("click", function(e) {
            e.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, 300);
          });

          // Animate scroll to id
          $cache.jsScrollTo.on("click", function(e) {
            e.preventDefault();
            var href = $(this).attr("href"),
              scrollPoint = $(href).offset();
            $("html, body").animate({ scrollTop: scrollPoint.top }, 700);
          });
        },
        dataCss: function() {
          // background images
          $("[data-bg-image]").each(function() {
            var $this = $(this);
            $this.css({
              "background-image": 'url("' + $this.data("bgImage") + '")'
            });
          });

          // background colors
          $("[data-bg-color]").each(function() {
            var $this = $(this);
            $this.css({
              "background-color": $this.data("bgColor")
            });
          });
        },
        scrollMagic: function() {
          var $blocks = $cache.siteWrap.children(".block"),
            controller = new ScrollMagic.Controller();

          $blocks.each(function(i, item) {
            new ScrollMagic.Scene({
              triggerElement: item,
              duration: item.outerHeight,
              triggerHook: 0.9,
              reverse: false
            })
              .on("enter", function() {
                var $current = $blocks.eq(i);
                // Example usage

                var tl = new TimelineMax({
                  paused: true,
                  force3D: true,
                  ease: Circ.easeInOut
                });
                var tl2 = new TimelineMax({
                  paused: true,
                  force3D: true,
                  ease: Circ.easeInOut
                });

                tl.to($current.find(".fade-in-left"), 0.6, {
                  autoAlpha: 1,
                  left: 0
                });
                tl.to($current.find(".fade-in-right"), 0.6, {
                  autoAlpha: 1,
                  right: 0
                });
                tl2.to($current.find(".fade-in"), 0.6, {
                  autoAlpha: 1
                });
                tl2.to($current.find(".fade-in-bottom"), 0.6, {
                  autoAlpha: 1,
                  bottom: 0
                });
                tl.play();
                tl2.play();
              })
              // Comment "addIndicators()" in/out to use
              // .addIndicators()
              .addTo(controller);
          });
        },
        galleryBuilder: function() {
          loadmore();
          clickLoadmore();
          clickLightBox();
          toggleNextGalleryItem();

          if ($("#archive-box").length > 0) {
            var $tax_id = $("#archive-box").data("setProcedure");
            $("#archive-box").remove();
            $("#grid__gallery").fadeOut("slow", function() {
              $.ajax({
                url: im.ajax_url,
                type: "get",
                data: {
                  action: "get_gallery_info",
                  taxid: $tax_id
                },
                success: function(response) {
                  $("#grid__gallery")
                    .empty()
                    .append(response)
                    .fadeIn("slow", function() {
                      loadmore();
                    });
                  clickLoadmore();
                  clickLightBox();
									toggleNextGalleryItem();
									magnify();
                }
              });
            });
          }
          $('.gallery--procedures li').on("click", function() {
            var $tax_id = $(this).data("setProcedure");
							console.log($tax_id);
            $("#grid__gallery").fadeOut("slow", function() {
              $.ajax({
                url: im.ajax_url,
                type: "get",
                data: {
                  action: "get_gallery_info",
                  taxid: $tax_id
                },
                success: function(response) {
                  $("#grid__gallery")
                    .empty()
                    .append(response)
                    .fadeIn("slow", function() {
                      loadmore();
                    });
                  clickLoadmore();
                  clickLightBox();
									toggleNextGalleryItem();
                }
              });
            });
          });
          function loadmore() {
            $('button[data-toggle="load-more"]').fadeIn();
            $(".gallery__item")
              .slice(10, 100)
              .hide();
            if ($(".gallery__item:hidden").length === 0) {
              $('button[data-toggle="load-more"]').fadeOut("slow");
            }
          }

          function clickLoadmore() {
            $('button[data-toggle="load-more"]').on("click", function(e) {
              e.preventDefault();
              $(".gallery__item:hidden")
                .slice(0, 10)
                .slideDown();
              if ($(".gallery__item:hidden").length == 0) {
                $('button[data-toggle="load-more"]').fadeOut("slow");
              }
            });
          }

          function clickLightBox() {
            $('[data-toggle="lightbox"').on("click", function() {
              $(this)
                .closest(".gallery__item")
                .find(".lightbox--patient")
                .toggleClass("open-lightbox");

              if (
                $(this)
                  .closest(".gallery__item")
                  .next(".gallery__item").length <= 0
              ) {
                $(this)
                  .closest(".gallery__item")
                  .find(".swiper-button-next")
                  .hide();
              }
              if (
                $(this)
                  .closest(".gallery__item")
                  .prev(".gallery__item").length <= 0
              ) {
                $(this)
                  .closest(".gallery__item")
                  .find(".swiper-button-prev")
                  .hide();
              }
            });
          }

          function toggleNextGalleryItem() {
            $(".gallery__item .swiper-button-next").on("click", function() {
              $(this)
                .closest(".gallery__item")
                .next(".gallery__item")
                .find(".lightbox--patient")
                .toggleClass("open-lightbox");
              $(this)
                .closest(".lightbox--patient")
                .toggleClass("open-lightbox");
            });
            $(".gallery__item .swiper-button-prev").on("click", function() {
              $(this)
                .closest(".gallery__item")
                .prev(".gallery__item")
                .find(".lightbox--patient")
                .toggleClass("open-lightbox");
              $(this)
                .closest(".lightbox--patient")
                .toggleClass("open-lightbox");
            });
          }
        },
        swiperSetup: function() {
          var services_slider = new Swiper(".slider--services", {
						slidesPerView: 3,
						spaceBetween: 40,
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev"
						},
						breakpoints: {
							640: {
								slidesPerView: 1,
								spaceBetween: 20,
							},
							768: {
								slidesPerView: 3,
								spaceBetween: 40,
							},
						}
					});
					
					$('.block--services .scroll--left').on('hover', function() {
						services_slider.slidePrev(2000, true);
					})
					$('.block--services .scroll--right').on('hover', function() {
						services_slider.slideNext(2000, true);
					})
        }
      }
    };

    IM.init();
  });
})(jQuery, window, document);
