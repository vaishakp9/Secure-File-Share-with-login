jQuery.noConflict();
jQuery(document).ready(function () {
    jQuery("#skenav").prepend('<div id="menu-icon" class="close">Navigation Menu<ul id="mini-menu"></ul></div>');
    jQuery("#menu-main>li").clone().appendTo("#mini-menu");
    jQuery("#menu-icon").on("click", function () {
        jQuery(this).toggleClass("close", "open").toggleClass("open");
        jQuery("#mini-menu").slideToggle()
    })
});
jQuery(document).ready(function () {
    if (jQuery(window).width() < 1025) {
        if (jQuery("body").hasClass("ls_left")) {
            jQuery("body").removeClass("ls_left");
            jQuery("body").addClass("ls_top")
        }
    }
});
jQuery(document).ready(function () {
    if (jQuery(window).width() < 481) {
        if (jQuery("#skebggallery_cap").length > 0) {
            jQuery("#skebggallery_cap .skebg_caption").each(function () {
                var e = jQuery(this).outerHeight(true);
                jQuery("#gallery_cap").css({
                    height: e
                })
            })
        }
    }
});

//-- navigation item (odd/even) script ---------
jQuery(document).ready(function(){
	"use strict";
		jQuery("#skenav ul.sub-menu").each(function(){
			jQuery(this).children().each(function(i, el){
		if (i % 2 === 0) {
			jQuery(this).addClass("odd");
		}
		else {
				jQuery(this).addClass("even");
		     }
		});
	});
});

jQuery(document).ready(function () {
    var e = jQuery(window).width();
    jQuery("body.ls_left #container").css("width", e - 450);
    jQuery(window).resize(function () {
        if (!jQuery("body.ls_left #container").hasClass("active")) {
            var e = jQuery(window).width();
            jQuery("body.ls_left #container").css("width", e - 450)
        }
    })
});

jQuery(document).ready(function () {
	var contWdth = jQuery('#content').innerWidth();
	jQuery('body .content_wrap').css({'width':contWdth});
	
    jQuery("#content").before('<a href="javascript:void(0);" class="content_hideshow" title="hide/show content"></a>');
    jQuery("a.content_hideshow").on("click", function () {
        if (!jQuery(this).hasClass("active")) {
            jQuery(this).next("#content").fadeOut("fast");
            jQuery(this).addClass("active");
            if (jQuery(window).width() < 481) {
                jQuery("#container").css("padding-bottom", "60px");
                jQuery("#footer-area").fadeOut()
            }
        } else {
            jQuery(this).next("#content").fadeIn("fast");
            jQuery(this).removeClass("active");
            if (jQuery(window).width() < 481) {
                jQuery("#container").css("padding-bottom", "0px");
                jQuery("#footer-area").fadeIn()
            }
        }
    })
});
jQuery(document).ready(function () {
    if (jQuery("#footer-widget-area ul.xoxo").length > 0) {
        jQuery("#footer-widget-area ul.xoxo").each(function () {
            var e = jQuery(window).height();
            var t = jQuery(this).outerHeight(true);
            if (t > e) {
                jQuery(this).css({
                    height: e - 100
                }).addClass("overflo")
            }
        })
    }
    jQuery("#footer-widget-area .footer-widget-area .footbar_title").click(function () {
        if (!jQuery(this).hasClass("active")) {
            var e = jQuery(this);
            jQuery(this).addClass("active");
            jQuery(this).next("ul.xoxo").stop(true, true).slideDown("fast", "", function () {
                e.find("a").addClass("active")
            })
        } else {
            var e = jQuery(this);
            jQuery(this).removeClass("active");
            jQuery(this).next("ul.xoxo").stop(true, true).slideUp("fast", "", function () {
                e.find("a").removeClass("active")
            })
        }
    })
});
jQuery(document).ready(function () {
    if (jQuery("#wpadminbar").length > 0 && jQuery("body.ls_left .head-toggle").length > 0) jQuery("body.ls_left .head-toggle").css({
            top: 40
        });
    jQuery("body.ls_left .head-toggle").click(function () {
        var e = jQuery("body.ls_left #header-area").innerWidth();
        var t = jQuery(".head-toggle");
        var n = jQuery(window).width();
        if (!jQuery(this).hasClass("active")) {
            jQuery(this).animate({
                left: "0px"
            }, 250);
            jQuery("body.ls_left #header-area,body.ls_left #head_block").animate({
                left: -e
            }, 250, function () {
                jQuery(this).css("float", "none").hide();
                t.addClass("active");
                jQuery("#container").css({
                    width: "100%",
                    left: "0"
                }).addClass("active");
                jQuery("#footer-area").css("padding-left", "0");
                jQuery("body.ls_left .skebg_nav .skebg_thumbnails").css("margin-left", "0")
            })
        } else {
            jQuery(this).animate({
                left: e
            }, 250);
            jQuery("#container").css({
                width: n - 450,
                left: "50px",
                "float": "left"
            }).removeClass("active");
            t.removeClass("active");
            jQuery("#footer-area").css("padding-left", "");
            jQuery("body.ls_left .skebg_nav .skebg_thumbnails").css("margin-left", "");
            jQuery("body.ls_left #header-area,body.ls_left #head_block").css("float", "left").show().animate({
                left: 0
            }, 250)
        }
    });
    jQuery("body.ls_top .head-toggle").click(function () {
        var e = jQuery("#header-area").outerHeight();
        var t = jQuery(".head-toggle");
        if (!jQuery(this).hasClass("active")) {
            jQuery("body.ls_top #header-area").animate({
                "margin-top": -e
            }, 250, function () {
                t.addClass("active")
            })
        } else {
            jQuery("body.ls_top #header-area").animate({
                "margin-top": 0
            }, 250, function () {
                t.removeClass("active")
            })
        }
    })
});
jQuery(document).ready(function () {
    if (jQuery("#contact_gmap").length > 0) {
        jQuery("body").append('<div id="gmap-loader">Loading Map...</div>');
        jQuery("#contact_gmap iframe").load(function () {
            jQuery("#gmap-loader").remove();
            jQuery("#contact_gmap iframe").css("visibility", "visible")
        })
    }
});

(function (e) {
    e.fn.simple_lianimate = function (t) {
        var n = {
            speed: 100,
            easing: ""
        };
        var t = e.extend(n, t);
        return this.each(function () {
            var n = t,
                r = e(this),
                i = e("li", r),
                s = e(i).outerWidth() - e(i).width();
            i.hover(function () {
                e(this).stop().animate({
                    paddingLeft: s + 6
                }, n.speed, n.easing)
            }, function () {
                e(this).stop().animate({
                    paddingLeft: s
                }, n.speed * 2, n.easing)
            })
        })
    }
})(jQuery);
jQuery(document).ready(function () {
    jQuery("#footer-widget-area li.widget-container").simple_lianimate();
    jQuery("#commentsbox .commentmetadata").next("p").addClass("comtxt")
});
jQuery(document).ready(function () {
    if (jQuery("body.ls_left #header").length > 0) {
        var e = jQuery("#header").offset().top;
        var t = jQuery("#header").outerHeight(true);
        var n = jQuery(window).scrollTop();
        var r = jQuery(window).height();
        var i = jQuery("#footer-area").position().top - 50;
        jQuery(window).scroll(function () {
            if (t < r) {
                if (jQuery(window).scrollTop() > e) {
                    if (n + r > i) {
                        jQuery("#header").css({
                            position: "fixed",
                            top: "0px",
                            width: "268px"
                        })
                    } else {
                        jQuery("#header").css({
                            position: "fixed",
                            top: "0px",
                            top: "0px",
                            width: "268px"
                        })
                    }
                } else {
                    jQuery("#header").css({
                        position: "static",
                        top: "0px",
                        width: "auto"
                    })
                }
            } else {
                if (jQuery("div#content").is(":visible") && jQuery("div#content").innerHeight() > jQuery("#header-area").innerHeight()) {
                    if (jQuery(window).scrollTop() - 120 > e) {
                        if (n + r > i) {
                            jQuery("#header").css({
                                position: "fixed",
                                bottom: "0px",
                                width: "268px"
                            })
                        } else {
                            jQuery("#header").css({
                                position: "fixed",
                                bottom: "0px",
                                top: "0px",
                                width: "268px"
                            })
                        }
                    } else {
                        jQuery("#header").css({
                            position: "static",
                            bottom: "0px",
                            width: "auto"
                        })
                    }
                }
            }
        })
    }
});
jQuery(document).ready(function () {
    var e = jQuery(".blog_sidebar").outerHeight(true);
    var t = jQuery(".blog_content").outerHeight(true);
    if ((jQuery.browser.mozilla || jQuery.browser.msie) && jQuery(window).width() > 480) {
        $sidebar = jQuery(".blog_sidebar");
        $window = jQuery(window);
        var n = $sidebar.offset();
        $window.scroll(function () {
            if (jQuery(".blog_sidebar").length > 0) {
                var r = jQuery(document).height();
                var i = jQuery(window).scrollTop();
                var s = jQuery(window).height();
                if (e > t) {} else {
                    if (r - 100 < i + e) {} else {
                        if ($window.scrollTop() + 10 > n.top) {
                            $sidebar.css({
                                top: $window.scrollTop() - n.top + 20,
                                position: "absolute",
                                right: 0
                            })
                        } else {
                            $sidebar.css({
                                top: 0,
                                position: "static"
                            })
                        }
                    }
                }
            }
        })
    } else if (jQuery(window).width() > 480 && e < t) {
        jQuery(".blog_sidebar").hcSticky({
            top: 50,
            bottomEnd: 100
        })
    }
});
jQuery(document).ready(function () {
    jQuery("a.skegallry_toggle").click(function () {
        if (!jQuery(this).hasClass("active")) {
            jQuery(this).addClass("active");
            jQuery(this).next("#skebggallery_cap").stop(true, true).fadeOut(500)
        } else {
            jQuery(this).removeClass("active");
            jQuery(this).next("#skebggallery_cap").stop(true, true).fadeIn(500)
        }
    })
})


