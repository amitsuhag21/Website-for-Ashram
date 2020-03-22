/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 *
 * Open source under the BSD License.
 *
 * Copyright © 2008 George McGinley Smith
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 * Redistributions of source code must retain the above copyright notice, this list of
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list
 * of conditions and the following disclaimer in the documentation and/or other materials
 * provided with the distribution.
 *
 * Neither the name of the author nor the names of contributors may be used to endorse
 * or promote products derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 *
*/

// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend(jQuery.easing, {
    def: 'easeOutQuad',
    swing: function(x, t, b, c, d) {
        //alert(jQuery.easing.default);
        return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
    },
    easeInQuad: function(x, t, b, c, d) {
        return c * (t /= d) * t + b;
    },
    easeOutQuad: function(x, t, b, c, d) {
        return -c * (t /= d) * (t - 2) + b;
    },
    easeInOutQuad: function(x, t, b, c, d) {
        if ((t /= d / 2) < 1)
            return c / 2 * t * t + b;
        return -c / 2 * ((--t) * (t - 2) - 1) + b;
    },
    easeInCubic: function(x, t, b, c, d) {
        return c * (t /= d) * t * t + b;
    },
    easeOutCubic: function(x, t, b, c, d) {
        return c * ((t = t / d - 1) * t * t + 1) + b;
    },
    easeInOutCubic: function(x, t, b, c, d) {
        if ((t /= d / 2) < 1)
            return c / 2 * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t + 2) + b;
    },
    easeInQuart: function(x, t, b, c, d) {
        return c * (t /= d) * t * t * t + b;
    },
    easeOutQuart: function(x, t, b, c, d) {
        return -c * ((t = t / d - 1) * t * t * t - 1) + b;
    },
    easeInOutQuart: function(x, t, b, c, d) {
        if ((t /= d / 2) < 1)
            return c / 2 * t * t * t * t + b;
        return -c / 2 * ((t -= 2) * t * t * t - 2) + b;
    },
    easeInQuint: function(x, t, b, c, d) {
        return c * (t /= d) * t * t * t * t + b;
    },
    easeOutQuint: function(x, t, b, c, d) {
        return c * ((t = t / d - 1) * t * t * t * t + 1) + b;
    },
    easeInOutQuint: function(x, t, b, c, d) {
        if ((t /= d / 2) < 1)
            return c / 2 * t * t * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t * t * t + 2) + b;
    },
    easeInSine: function(x, t, b, c, d) {
        return -c * Math.cos(t / d * (Math.PI / 2)) + c + b;
    },
    easeOutSine: function(x, t, b, c, d) {
        return c * Math.sin(t / d * (Math.PI / 2)) + b;
    },
    easeInOutSine: function(x, t, b, c, d) {
        return -c / 2 * (Math.cos(Math.PI * t / d) - 1) + b;
    },
    easeInExpo: function(x, t, b, c, d) {
        return (t == 0) ? b : c * Math.pow(2, 10 * (t / d - 1)) + b;
    },
    easeOutExpo: function(x, t, b, c, d) {
        return (t == d) ? b + c : c * (-Math.pow(2, -10 * t / d) + 1) + b;
    },
    easeInOutExpo: function(x, t, b, c, d) {
        if (t == 0)
            return b;
        if (t == d)
            return b + c;
        if ((t /= d / 2) < 1)
            return c / 2 * Math.pow(2, 10 * (t - 1)) + b;
        return c / 2 * (-Math.pow(2, -10 * --t) + 2) + b;
    },
    easeInCirc: function(x, t, b, c, d) {
        return -c * (Math.sqrt(1 - (t /= d) * t) - 1) + b;
    },
    easeOutCirc: function(x, t, b, c, d) {
        return c * Math.sqrt(1 - (t = t / d - 1) * t) + b;
    },
    easeInOutCirc: function(x, t, b, c, d) {
        if ((t /= d / 2) < 1)
            return -c / 2 * (Math.sqrt(1 - t * t) - 1) + b;
        return c / 2 * (Math.sqrt(1 - (t -= 2) * t) + 1) + b;
    },
    easeInElastic: function(x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0)
            return b;
        if ((t /= d) == 1)
            return b + c;
        if (!p)
            p = d * .3;
        if (a < Math.abs(c)) {
            a = c;
            var s = p / 4;
        } else
            var s = p / (2 * Math.PI) * Math.asin(c / a);
        return -(a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
    },
    easeOutElastic: function(x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0)
            return b;
        if ((t /= d) == 1)
            return b + c;
        if (!p)
            p = d * .3;
        if (a < Math.abs(c)) {
            a = c;
            var s = p / 4;
        } else
            var s = p / (2 * Math.PI) * Math.asin(c / a);
        return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * (2 * Math.PI) / p) + c + b;
    },
    easeInOutElastic: function(x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0)
            return b;
        if ((t /= d / 2) == 2)
            return b + c;
        if (!p)
            p = d * (.3 * 1.5);
        if (a < Math.abs(c)) {
            a = c;
            var s = p / 4;
        } else
            var s = p / (2 * Math.PI) * Math.asin(c / a);
        if (t < 1)
            return -.5 * (a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
        return a * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p) * .5 + c + b;
    },
    easeInBack: function(x, t, b, c, d, s) {
        if (s == undefined)
            s = 1.70158;
        return c * (t /= d) * t * ((s + 1) * t - s) + b;
    },
    easeOutBack: function(x, t, b, c, d, s) {
        if (s == undefined)
            s = 1.70158;
        return c * ((t = t / d - 1) * t * ((s + 1) * t + s) + 1) + b;
    },
    easeInOutBack: function(x, t, b, c, d, s) {
        if (s == undefined)
            s = 1.70158;
        if ((t /= d / 2) < 1)
            return c / 2 * (t * t * (((s *= (1.525)) + 1) * t - s)) + b;
        return c / 2 * ((t -= 2) * t * (((s *= (1.525)) + 1) * t + s) + 2) + b;
    },
    easeInBounce: function(x, t, b, c, d) {
        return c - jQuery.easing.easeOutBounce(x, d - t, 0, c, d) + b;
    },
    easeOutBounce: function(x, t, b, c, d) {
        if ((t /= d) < (1 / 2.75)) {
            return c * (7.5625 * t * t) + b;
        } else if (t < (2 / 2.75)) {
            return c * (7.5625 * (t -= (1.5 / 2.75)) * t + .75) + b;
        } else if (t < (2.5 / 2.75)) {
            return c * (7.5625 * (t -= (2.25 / 2.75)) * t + .9375) + b;
        } else {
            return c * (7.5625 * (t -= (2.625 / 2.75)) * t + .984375) + b;
        }
    },
    easeInOutBounce: function(x, t, b, c, d) {
        if (t < d / 2)
            return jQuery.easing.easeInBounce(x, t * 2, 0, c, d) * .5 + b;
        return jQuery.easing.easeOutBounce(x, t * 2 - d, 0, c, d) * .5 + c * .5 + b;
    }
});

/*
 *
 * TERMS OF USE - EASING EQUATIONS
 *
 * Open source under the BSD License.
 *
 * Copyright © 2001 Robert Penner
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 * Redistributions of source code must retain the above copyright notice, this list of
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list
 * of conditions and the following disclaimer in the documentation and/or other materials
 * provided with the distribution.
 *
 * Neither the name of the author nor the names of contributors may be used to endorse
 * or promote products derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 */

/*!
* FitVids 1.1
*
* Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
* Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
* Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*

 * jQuery Superfish Menu Plugin - v1.7.8
 * Copyright (c) 2016
 *
 * Dual licensed under the MIT and GPL licenses:
 *	http://www.opensource.org/licenses/mit-license.php
 *	http://www.gnu.org/licenses/gpl.html
 */


(function($) {
    $.fn.hoverIntent = function(handlerIn, handlerOut, selector) {

        // default configuration values
        var cfg = {
            interval: 100,
            sensitivity: 7,
            timeout: 0
        };

        if (typeof handlerIn === "object") {
            cfg = $.extend(cfg, handlerIn);
        } else if ($.isFunction(handlerOut)) {
            cfg = $.extend(cfg, {
                over: handlerIn,
                out: handlerOut,
                selector: selector
            });
        } else {
            cfg = $.extend(cfg, {
                over: handlerIn,
                out: handlerIn,
                selector: handlerOut
            });
        }

        // instantiate variables
        // cX, cY = current X and Y position of mouse, updated by mousemove event
        // pX, pY = previous X and Y position of mouse, set by mouseover and polling interval
        var cX, cY, pX, pY;

        // A private function for getting mouse position
        var track = function(ev) {
            cX = ev.pageX;
            cY = ev.pageY;
        };

        // A private function for comparing current and previous mouse position
        var compare = function(ev, ob) {
            ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
            // compare mouse positions to see if they've crossed the threshold
            if ((Math.abs(pX - cX) + Math.abs(pY - cY)) < cfg.sensitivity) {
                $(ob).off("mousemove.hoverIntent", track);
                // set hoverIntent state to true (so mouseOut can be called)
                ob.hoverIntent_s = 1;
                return cfg.over.apply(ob, [ev]);
            } else {
                // set previous coordinates for next time
                pX = cX;
                pY = cY;
                // use self-calling timeout, guarantees intervals are spaced out properly (avoids JavaScript timer bugs)
                ob.hoverIntent_t = setTimeout(function() {
                    compare(ev, ob);
                }, cfg.interval);
            }
        };

        // A private function for delaying the mouseOut function
        var delay = function(ev, ob) {
            ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
            ob.hoverIntent_s = 0;
            return cfg.out.apply(ob, [ev]);
        };

        // A private function for handling mouse 'hovering'
        var handleHover = function(e) {
            // copy objects to be passed into t (required for event object to be passed in IE)
            var ev = jQuery.extend({}, e);
            var ob = this;

            // cancel hoverIntent timer if it exists
            if (ob.hoverIntent_t) {
                ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
            }

            // if e.type == "mouseenter"
            if (e.type == "mouseenter") {
                // set "previous" X and Y position based on initial entry point
                pX = ev.pageX;
                pY = ev.pageY;
                // update "current" X and Y position based on mousemove
                $(ob).on("mousemove.hoverIntent", track);
                // start polling interval (self-calling timeout) to compare mouse coordinates over time
                if (ob.hoverIntent_s != 1) {
                    ob.hoverIntent_t = setTimeout(function() {
                        compare(ev, ob);
                    }, cfg.interval);
                }

                // else e.type == "mouseleave"
            } else {
                // unbind expensive mousemove event
                $(ob).off("mousemove.hoverIntent", track);
                // if hoverIntent state is true, then call the mouseOut function after the specified delay
                if (ob.hoverIntent_s == 1) {
                    ob.hoverIntent_t = setTimeout(function() {
                        delay(ev, ob);
                    }, cfg.timeout);
                }
            }
        };

        // listen for mouseenter and mouseleave
        return this.on({
            'mouseenter.hoverIntent': handleHover,
            'mouseleave.hoverIntent': handleHover
        }, cfg.selector);
    }
    ;
}
)(jQuery);

/**
 *
 * Twitter Feed Fetcher
 *
 */

function sm_format_twitter(twitters) {
    var statusHTML = [];
    for (var i = 0; i < twitters.length; i++) {
        var username = twitters[i].user.screen_name;
        var name = twitters[i].user.name;
        var username_avatar = twitters[i].user.profile_image_url;
        var status = twitters[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
            return '<a href="' + url + '" target="_blank">' + url + '</a>';
        }).replace(/\B@([_a-z0-9]+)/ig, function(reply) {
            return reply.charAt(0) + '<a href="http://twitter.com/' + reply.substring(1) + '" target="_blank">' + reply.substring(1) + '</a>';
        });
        statusHTML.push('<li><i class="icon-twitter"></i><a href="http://twitter.com/' + username + '" class="twitter-avatar" target="_blank"><img src="' + username_avatar + '" alt="' + name + '" title="' + name + '"></a><span>' + status + '</span><small><a href="http://twitter.com/' + username + '/statuses/' + twitters[i].id_str + '" target="_blank">' + relative_time(twitters[i].created_at) + '</a></small></li>');
    }
    return statusHTML.join('');
}

function sm_format_twitter2(twitters) {
    var statusHTML = [];
    for (var i = 0; i < twitters.length; i++) {
        var username = twitters[i].user.screen_name;
        var status = twitters[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
            return '<a href="' + url + '" target="_blank">' + url + '</a>';
        }).replace(/\B@([_a-z0-9]+)/ig, function(reply) {
            return reply.charAt(0) + '<a href="http://twitter.com/' + reply.substring(1) + '" target="_blank">' + reply.substring(1) + '</a>';
        });
        statusHTML.push('<div class="slide"><span>' + status + '</span><small><a href="http://twitter.com/' + username + '/statuses/' + twitters[i].id_str + '" target="_blank">' + relative_time(twitters[i].created_at) + '</a></small></div>');
    }
    return statusHTML.join('');
}

function sm_format_twitter3(twitters) {
    var statusHTML = [];
    for (var i = 0; i < twitters.length; i++) {
        var username = twitters[i].user.screen_name;
        var status = twitters[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
            return '<a href="' + url + '" target="_blank">' + url + '</a>';
        }).replace(/\B@([_a-z0-9]+)/ig, function(reply) {
            return reply.charAt(0) + '<a href="http://twitter.com/' + reply.substring(1) + '" target="_blank">' + reply.substring(1) + '</a>';
        });
        statusHTML.push('<div class="slide"><div class="testi-content"><p>' + status + '</p><div class="testi-meta"><span><a href="http://twitter.com/' + username + '/statuses/' + twitters[i].id_str + '" target="_blank">' + relative_time(twitters[i].created_at) + '</a></span></div></div></div>');
    }
    return statusHTML.join('');
}





(function($) {
    $.fn.jflickrfeed = function(settings, callback) {
        settings = $.extend(true, {
            flickrbase: 'http://api.flickr.com/services/feeds/',
            feedapi: 'photos_public.gne',
            limit: 20,
            qstrings: {
                lang: 'en-us',
                format: 'json',
                jsoncallback: '?'
            },
            cleanDescription: true,
            useTemplate: true,
            itemTemplate: '',
            itemCallback: function() {}
        }, settings);
        var url = settings.flickrbase + settings.feedapi + '?';
        var first = true;
        for (var key in settings.qstrings) {
            if (!first)
                url += '&';
            url += key + '=' + settings.qstrings[key];
            first = false;
        }
        return $(this).each(function() {
            var $container = $(this);
            var container = this;
            $.getJSON(url, function(data) {
                $.each(data.items, function(i, item) {
                    if (i < settings.limit) {
                        if (settings.cleanDescription) {
                            var regex = /<p>(.*?)<\/p>/g;
                            var input = item.description;
                            if (regex.test(input)) {
                                item.description = input.match(regex)[2]
                                if (item.description != undefined)
                                    item.description = item.description.replace('<p>', '').replace('</p>', '');
                            }
                        }
                        item['image_s'] = item.media.m.replace('_m', '_s');
                        item['image_t'] = item.media.m.replace('_m', '_t');
                        item['image_m'] = item.media.m.replace('_m', '_m');
                        item['image'] = item.media.m.replace('_m', '');
                        item['image_b'] = item.media.m.replace('_m', '_b');
                        delete item.media;
                        if (settings.useTemplate) {
                            var template = settings.itemTemplate;
                            for (var key in item) {
                                var rgx = new RegExp('{{' + key + '}}','g');
                                template = template.replace(rgx, item[key]);
                            }
                            $container.append(template)
                        }
                        settings.itemCallback.call(container, item);
                    }
                });
                if ($.isFunction(callback)) {
                    callback.call(container, data);
                }
            });
        });
    }
}
)(jQuery);


function onYouTubeIframeAPIReady() {
    ytp.YTAPIReady || (ytp.YTAPIReady = !0,
    jQuery(document).trigger("YTAPIReady"))
}
function uncamel(a) {
    return a.replace(/([A-Z])/g, function(a) {
        return "-" + a.toLowerCase()
    })
}
function setUnit(a, b) {
    return "string" != typeof a || a.match(/^[\-0-9\.]+jQuery/) ? "" + a + b : a
}
function setFilter(a, b, c) {
    var d = uncamel(b)
      , e = jQuery.browser.mozilla ? "" : jQuery.CSS.sfx;
    a[e + "filter"] = a[e + "filter"] || "",
    c = setUnit(c > jQuery.CSS.filters[b].max ? jQuery.CSS.filters[b].max : c, jQuery.CSS.filters[b].unit),
    a[e + "filter"] += d + "(" + c + ") ",
    delete a[b]
}
var ytp = ytp || {}
  , getYTPVideoID = function(a) {
    var b, c;
    return a.indexOf("youtu.be") > 0 ? (b = a.substr(a.lastIndexOf("/") + 1, a.length),
    c = b.indexOf("?list=") > 0 ? b.substr(b.lastIndexOf("="), b.length) : null,
    b = c ? b.substr(0, b.lastIndexOf("?")) : b) : a.indexOf("http") > -1 ? (b = a.match(/[\\?&]v=([^&#]*)/)[1],
    c = a.indexOf("list=") > 0 ? a.match(/[\\?&]list=([^&#]*)/)[1] : null) : (b = a.length > 15 ? null : a,
    c = b ? null : a),
    {
        videoID: b,
        playlistID: c
    }
};

jQuery.support.CSStransition = function() {
    var a = document.body || document.documentElement
      , b = a.style;
    return void 0 !== b.transition || void 0 !== b.WebkitTransition || void 0 !== b.MozTransition || void 0 !== b.MsTransition || void 0 !== b.OTransition
}(),
jQuery.CSS = {
    name: "mb.CSSAnimate",
    author: "Matteo Bicocchi",
    version: "2.0.0",
    transitionEnd: "transitionEnd",
    sfx: "",
    filters: {
        blur: {
            min: 0,
            max: 100,
            unit: "px"
        },
        brightness: {
            min: 0,
            max: 400,
            unit: "%"
        },
        contrast: {
            min: 0,
            max: 400,
            unit: "%"
        },
        grayscale: {
            min: 0,
            max: 100,
            unit: "%"
        },
        hueRotate: {
            min: 0,
            max: 360,
            unit: "deg"
        },
        invert: {
            min: 0,
            max: 100,
            unit: "%"
        },
        saturate: {
            min: 0,
            max: 400,
            unit: "%"
        },
        sepia: {
            min: 0,
            max: 100,
            unit: "%"
        }
    },
    normalizeCss: function(a) {
        var b = jQuery.extend(!0, {}, a);
        jQuery.browser.webkit || jQuery.browser.opera ? jQuery.CSS.sfx = "-webkit-" : jQuery.browser.mozilla ? jQuery.CSS.sfx = "-moz-" : jQuery.browser.msie && (jQuery.CSS.sfx = "-ms-");
        for (var c in b) {
            "transform" === c && (b[jQuery.CSS.sfx + "transform"] = b[c],
            delete b[c]),
            "transform-origin" === c && (b[jQuery.CSS.sfx + "transform-origin"] = a[c],
            delete b[c]),
            "filter" !== c || jQuery.browser.mozilla || (b[jQuery.CSS.sfx + "filter"] = a[c],
            delete b[c]),
            "blur" === c && setFilter(b, "blur", a[c]),
            "brightness" === c && setFilter(b, "brightness", a[c]),
            "contrast" === c && setFilter(b, "contrast", a[c]),
            "grayscale" === c && setFilter(b, "grayscale", a[c]),
            "hueRotate" === c && setFilter(b, "hueRotate", a[c]),
            "invert" === c && setFilter(b, "invert", a[c]),
            "saturate" === c && setFilter(b, "saturate", a[c]),
            "sepia" === c && setFilter(b, "sepia", a[c]);
            var d = "";
            "x" === c && (d = jQuery.CSS.sfx + "transform",
            b[d] = b[d] || "",
            b[d] += " translateX(" + setUnit(a[c], "px") + ")",
            delete b[c]),
            "y" === c && (d = jQuery.CSS.sfx + "transform",
            b[d] = b[d] || "",
            b[d] += " translateY(" + setUnit(a[c], "px") + ")",
            delete b[c]),
            "z" === c && (d = jQuery.CSS.sfx + "transform",
            b[d] = b[d] || "",
            b[d] += " translateZ(" + setUnit(a[c], "px") + ")",
            delete b[c]),
            "rotate" === c && (d = jQuery.CSS.sfx + "transform",
            b[d] = b[d] || "",
            b[d] += " rotate(" + setUnit(a[c], "deg") + ")",
            delete b[c]),
            "rotateX" === c && (d = jQuery.CSS.sfx + "transform",
            b[d] = b[d] || "",
            b[d] += " rotateX(" + setUnit(a[c], "deg") + ")",
            delete b[c]),
            "rotateY" === c && (d = jQuery.CSS.sfx + "transform",
            b[d] = b[d] || "",
            b[d] += " rotateY(" + setUnit(a[c], "deg") + ")",
            delete b[c]),
            "rotateZ" === c && (d = jQuery.CSS.sfx + "transform",
            b[d] = b[d] || "",
            b[d] += " rotateZ(" + setUnit(a[c], "deg") + ")",
            delete b[c]),
            "scale" === c && (d = jQuery.CSS.sfx + "transform",
            b[d] = b[d] || "",
            b[d] += " scale(" + setUnit(a[c], "") + ")",
            delete b[c]),
            "scaleX" === c && (d = jQuery.CSS.sfx + "transform",
            b[d] = b[d] || "",
            b[d] += " scaleX(" + setUnit(a[c], "") + ")",
            delete b[c]),
            "scaleY" === c && (d = jQuery.CSS.sfx + "transform",
            b[d] = b[d] || "",
            b[d] += " scaleY(" + setUnit(a[c], "") + ")",
            delete b[c]),
            "scaleZ" === c && (d = jQuery.CSS.sfx + "transform",
            b[d] = b[d] || "",
            b[d] += " scaleZ(" + setUnit(a[c], "") + ")",
            delete b[c]),
            "skew" === c && (d = jQuery.CSS.sfx + "transform",
            b[d] = b[d] || "",
            b[d] += " skew(" + setUnit(a[c], "deg") + ")",
            delete b[c]),
            "skewX" === c && (d = jQuery.CSS.sfx + "transform",
            b[d] = b[d] || "",
            b[d] += " skewX(" + setUnit(a[c], "deg") + ")",
            delete b[c]),
            "skewY" === c && (d = jQuery.CSS.sfx + "transform",
            b[d] = b[d] || "",
            b[d] += " skewY(" + setUnit(a[c], "deg") + ")",
            delete b[c]),
            "perspective" === c && (d = jQuery.CSS.sfx + "transform",
            b[d] = b[d] || "",
            b[d] += " perspective(" + setUnit(a[c], "px") + ")",
            delete b[c])
        }
        return b
    },
    getProp: function(a) {
        var b = [];
        for (var c in a)
            b.indexOf(c) < 0 && b.push(uncamel(c));
        return b.join(",")
    },
    animate: function(a, b, c, d, e) {
        return this.each(function() {
            function f() {
                g.called = !0,
                g.CSSAIsRunning = !1,
                h.off(jQuery.CSS.transitionEnd + "." + g.id),
                clearTimeout(g.timeout),
                h.css(jQuery.CSS.sfx + "transition", ""),
                "function" == typeof e && e.apply(g),
                "function" == typeof g.CSSqueue && (g.CSSqueue(),
                g.CSSqueue = null)
            }
            var g = this
              , h = jQuery(this);
            g.id = g.id || "CSSA_" + (new Date).getTime();
            var i = i || {
                type: "noEvent"
            };
            if (g.CSSAIsRunning && g.eventType == i.type && !jQuery.browser.msie && jQuery.browser.version <= 9)
                return void (g.CSSqueue = function() {
                    h.CSSAnimate(a, b, c, d, e)
                }
                );
            if (g.CSSqueue = null,
            g.eventType = i.type,
            0 !== h.length && a) {
                if (a = jQuery.normalizeCss(a),
                g.CSSAIsRunning = !0,
                "function" == typeof b && (e = b,
                b = jQuery.fx.speeds._default),
                "function" == typeof c && (d = c,
                c = 0),
                "string" == typeof c && (e = c,
                c = 0),
                "function" == typeof d && (e = d,
                d = "cubic-bezier(0.65,0.03,0.36,0.72)"),
                "string" == typeof b)
                    for (var j in jQuery.fx.speeds) {
                        if (b == j) {
                            b = jQuery.fx.speeds[j];
                            break
                        }
                        b = jQuery.fx.speeds._default
                    }
                if (b || (b = jQuery.fx.speeds._default),
                "string" == typeof e && (d = e,
                e = null),
                !jQuery.support.CSStransition) {
                    for (var k in a) {
                        if ("transform" === k && delete a[k],
                        "filter" === k && delete a[k],
                        "transform-origin" === k && delete a[k],
                        "auto" === a[k] && delete a[k],
                        "x" === k) {
                            var l = a[k]
                              , m = "left";
                            a[m] = l,
                            delete a[k]
                        }
                        if ("y" === k) {
                            var l = a[k]
                              , m = "top";
                            a[m] = l,
                            delete a[k]
                        }
                        ("-ms-transform" === k || "-ms-filter" === k) && delete a[k]
                    }
                    return void h.delay(c).animate(a, b, e)
                }
                var n = {
                    "default": "ease",
                    "in": "ease-in",
                    out: "ease-out",
                    "in-out": "ease-in-out",
                    snap: "cubic-bezier(0,1,.5,1)",
                    easeOutCubic: "cubic-bezier(.215,.61,.355,1)",
                    easeInOutCubic: "cubic-bezier(.645,.045,.355,1)",
                    easeInCirc: "cubic-bezier(.6,.04,.98,.335)",
                    easeOutCirc: "cubic-bezier(.075,.82,.165,1)",
                    easeInOutCirc: "cubic-bezier(.785,.135,.15,.86)",
                    easeInExpo: "cubic-bezier(.95,.05,.795,.035)",
                    easeOutExpo: "cubic-bezier(.19,1,.22,1)",
                    easeInOutExpo: "cubic-bezier(1,0,0,1)",
                    easeInQuad: "cubic-bezier(.55,.085,.68,.53)",
                    easeOutQuad: "cubic-bezier(.25,.46,.45,.94)",
                    easeInOutQuad: "cubic-bezier(.455,.03,.515,.955)",
                    easeInQuart: "cubic-bezier(.895,.03,.685,.22)",
                    easeOutQuart: "cubic-bezier(.165,.84,.44,1)",
                    easeInOutQuart: "cubic-bezier(.77,0,.175,1)",
                    easeInQuint: "cubic-bezier(.755,.05,.855,.06)",
                    easeOutQuint: "cubic-bezier(.23,1,.32,1)",
                    easeInOutQuint: "cubic-bezier(.86,0,.07,1)",
                    easeInSine: "cubic-bezier(.47,0,.745,.715)",
                    easeOutSine: "cubic-bezier(.39,.575,.565,1)",
                    easeInOutSine: "cubic-bezier(.445,.05,.55,.95)",
                    easeInBack: "cubic-bezier(.6,-.28,.735,.045)",
                    easeOutBack: "cubic-bezier(.175, .885,.32,1.275)",
                    easeInOutBack: "cubic-bezier(.68,-.55,.265,1.55)"
                };
                n[d] && (d = n[d]),
                h.off(jQuery.CSS.transitionEnd + "." + g.id);
                var o = jQuery.CSS.getProp(a)
                  , p = {};
                jQuery.extend(p, a),
                p[jQuery.CSS.sfx + "transition-property"] = o,
                p[jQuery.CSS.sfx + "transition-duration"] = b + "ms",
                p[jQuery.CSS.sfx + "transition-delay"] = c + "ms",
                p[jQuery.CSS.sfx + "transition-timing-function"] = d,
                setTimeout(function() {
                    h.one(jQuery.CSS.transitionEnd + "." + g.id, f),
                    h.css(p)
                }, 1),
                g.timeout = setTimeout(function() {
                    return g.called || !e ? (g.called = !1,
                    void (g.CSSAIsRunning = !1)) : (h.css(jQuery.CSS.sfx + "transition", ""),
                    e.apply(g),
                    g.CSSAIsRunning = !1,
                    void ("function" == typeof g.CSSqueue && (g.CSSqueue(),
                    g.CSSqueue = null)))
                }, b + c + 10)
            }
        })
    }
},
jQuery.fn.CSSAnimate = jQuery.CSS.animate,
jQuery.normalizeCss = jQuery.CSS.normalizeCss,
jQuery.fn.css3 = function(a) {
    return this.each(function() {
        var b = jQuery(this)
          , c = jQuery.normalizeCss(a);
        b.css(c)
    })
}
;
var nAgt = navigator.userAgent;
if (!jQuery.browser) {
    jQuery.browser = {},
    jQuery.browser.mozilla = !1,
    jQuery.browser.webkit = !1,
    jQuery.browser.opera = !1,
    jQuery.browser.safari = !1,
    jQuery.browser.chrome = !1,
    jQuery.browser.msie = !1,
    jQuery.browser.ua = nAgt,
    jQuery.browser.name = navigator.appName,
    jQuery.browser.fullVersion = "" + parseFloat(navigator.appVersion),
    jQuery.browser.majorVersion = parseInt(navigator.appVersion, 10);
    var nameOffset, verOffset, ix;
    if (-1 != (verOffset = nAgt.indexOf("Opera")))
        jQuery.browser.opera = !0,
        jQuery.browser.name = "Opera",
        jQuery.browser.fullVersion = nAgt.substring(verOffset + 6),
        -1 != (verOffset = nAgt.indexOf("Version")) && (jQuery.browser.fullVersion = nAgt.substring(verOffset + 8));
    else if (-1 != (verOffset = nAgt.indexOf("OPR")))
        jQuery.browser.opera = !0,
        jQuery.browser.name = "Opera",
        jQuery.browser.fullVersion = nAgt.substring(verOffset + 4);
    else if (-1 != (verOffset = nAgt.indexOf("MSIE")))
        jQuery.browser.msie = !0,
        jQuery.browser.name = "Microsoft Internet Explorer",
        jQuery.browser.fullVersion = nAgt.substring(verOffset + 5);
    else if (-1 != nAgt.indexOf("Trident")) {
        jQuery.browser.msie = !0,
        jQuery.browser.name = "Microsoft Internet Explorer";
        var start = nAgt.indexOf("rv:") + 3
          , end = start + 4;
        jQuery.browser.fullVersion = nAgt.substring(start, end)
    } else
        -1 != (verOffset = nAgt.indexOf("Chrome")) ? (jQuery.browser.webkit = !0,
        jQuery.browser.chrome = !0,
        jQuery.browser.name = "Chrome",
        jQuery.browser.fullVersion = nAgt.substring(verOffset + 7)) : -1 != (verOffset = nAgt.indexOf("Safari")) ? (jQuery.browser.webkit = !0,
        jQuery.browser.safari = !0,
        jQuery.browser.name = "Safari",
        jQuery.browser.fullVersion = nAgt.substring(verOffset + 7),
        -1 != (verOffset = nAgt.indexOf("Version")) && (jQuery.browser.fullVersion = nAgt.substring(verOffset + 8))) : -1 != (verOffset = nAgt.indexOf("AppleWebkit")) ? (jQuery.browser.webkit = !0,
        jQuery.browser.name = "Safari",
        jQuery.browser.fullVersion = nAgt.substring(verOffset + 7),
        -1 != (verOffset = nAgt.indexOf("Version")) && (jQuery.browser.fullVersion = nAgt.substring(verOffset + 8))) : -1 != (verOffset = nAgt.indexOf("Firefox")) ? (jQuery.browser.mozilla = !0,
        jQuery.browser.name = "Firefox",
        jQuery.browser.fullVersion = nAgt.substring(verOffset + 8)) : (nameOffset = nAgt.lastIndexOf(" ") + 1) < (verOffset = nAgt.lastIndexOf("/")) && (jQuery.browser.name = nAgt.substring(nameOffset, verOffset),
        jQuery.browser.fullVersion = nAgt.substring(verOffset + 1),
        jQuery.browser.name.toLowerCase() == jQuery.browser.name.toUpperCase() && (jQuery.browser.name = navigator.appName));
    -1 != (ix = jQuery.browser.fullVersion.indexOf(";")) && (jQuery.browser.fullVersion = jQuery.browser.fullVersion.substring(0, ix)),
    -1 != (ix = jQuery.browser.fullVersion.indexOf(" ")) && (jQuery.browser.fullVersion = jQuery.browser.fullVersion.substring(0, ix)),
    jQuery.browser.majorVersion = parseInt("" + jQuery.browser.fullVersion, 10),
    isNaN(jQuery.browser.majorVersion) && (jQuery.browser.fullVersion = "" + parseFloat(navigator.appVersion),
    jQuery.browser.majorVersion = parseInt(navigator.appVersion, 10)),
    jQuery.browser.version = jQuery.browser.majorVersion
}
jQuery.browser.android = /Android/i.test(nAgt),
jQuery.browser.blackberry = /BlackBerry|BB|PlayBook/i.test(nAgt),
jQuery.browser.ios = /iPhone|iPad|iPod|webOS/i.test(nAgt),
jQuery.browser.operaMobile = /Opera Mini/i.test(nAgt),
jQuery.browser.windowsMobile = /IEMobile|Windows Phone/i.test(nAgt),
jQuery.browser.kindle = /Kindle|Silk/i.test(nAgt),
jQuery.browser.mobile = jQuery.browser.android || jQuery.browser.blackberry || jQuery.browser.ios || jQuery.browser.windowsMobile || jQuery.browser.operaMobile || jQuery.browser.kindle,
jQuery.isMobile = jQuery.browser.mobile,
jQuery.isTablet = jQuery.browser.mobile && jQuery(window).width() > 765,
jQuery.isAndroidDefault = jQuery.browser.android && !/chrome/i.test(nAgt),
!function(a) {
    /iphone|ipod|ipad|android|ie|blackberry|fennec/.test(navigator.userAgent.toLowerCase());
    var b = "ontouchstart"in window || window.navigator && window.navigator.msPointerEnabled && window.MSGesture || window.DocumentTouch && document instanceof DocumentTouch || !1;
    a.simpleSlider = {
        defaults: {
            initialval: 0,
            scale: 100,
            orientation: "h",
            readonly: !1,
            callback: !1
        },
        events: {
            start: b ? "touchstart" : "mousedown",
            end: b ? "touchend" : "mouseup",
            move: b ? "touchmove" : "mousemove"
        },
        init: function(c) {
            return this.each(function() {
                var d = this
                  , e = a(d);
                e.addClass("simpleSlider"),
                d.opt = {},
                a.extend(d.opt, a.simpleSlider.defaults, c),
                a.extend(d.opt, e.data());
                var f = "h" == d.opt.orientation ? "horizontal" : "vertical"
                  , g = a("<div/>").addClass("level").addClass(f);
                e.prepend(g),
                d.level = g,
                e.css({
                    cursor: "default"
                }),
                "auto" == d.opt.scale && (d.opt.scale = a(d).outerWidth()),
                e.updateSliderVal(),
                d.opt.readonly || (e.on(a.simpleSlider.events.start, function(a) {
                    b && (a = a.changedTouches[0]),
                    d.canSlide = !0,
                    e.updateSliderVal(a),
                    e.css({
                        cursor: "col-resize"
                    }),
                    a.preventDefault(),
                    a.stopPropagation()
                }),
                a(document).on(a.simpleSlider.events.move, function(c) {
                    b && (c = c.changedTouches[0]),
                    d.canSlide && (a(document).css({
                        cursor: "default"
                    }),
                    e.updateSliderVal(c),
                    c.preventDefault(),
                    c.stopPropagation())
                }).on(a.simpleSlider.events.end, function() {
                    a(document).css({
                        cursor: "auto"
                    }),
                    d.canSlide = !1,
                    e.css({
                        cursor: "auto"
                    })
                }))
            })
        },
        updateSliderVal: function(b) {
            function c(a, b) {
                return Math.floor(100 * a / b)
            }
            var d = this
              , e = d.get(0);
            e.opt.initialval = "number" == typeof e.opt.initialval ? e.opt.initialval : e.opt.initialval(e);
            var f = a(e).outerWidth()
              , g = a(e).outerHeight();
            e.x = "object" == typeof b ? b.clientX + document.body.scrollLeft - d.offset().left : "number" == typeof b ? b * f / e.opt.scale : e.opt.initialval * f / e.opt.scale,
            e.y = "object" == typeof b ? b.clientY + document.body.scrollTop - d.offset().top : "number" == typeof b ? (e.opt.scale - e.opt.initialval - b) * g / e.opt.scale : e.opt.initialval * g / e.opt.scale,
            e.y = d.outerHeight() - e.y,
            e.scaleX = e.x * e.opt.scale / f,
            e.scaleY = e.y * e.opt.scale / g,
            e.outOfRangeX = e.scaleX > e.opt.scale ? e.scaleX - e.opt.scale : e.scaleX < 0 ? e.scaleX : 0,
            e.outOfRangeY = e.scaleY > e.opt.scale ? e.scaleY - e.opt.scale : e.scaleY < 0 ? e.scaleY : 0,
            e.outOfRange = "h" == e.opt.orientation ? e.outOfRangeX : e.outOfRangeY,
            e.value = "undefined" != typeof b ? "h" == e.opt.orientation ? e.x >= d.outerWidth() ? e.opt.scale : e.x <= 0 ? 0 : e.scaleX : e.y >= d.outerHeight() ? e.opt.scale : e.y <= 0 ? 0 : e.scaleY : "h" == e.opt.orientation ? e.scaleX : e.scaleY,
            "h" == e.opt.orientation ? e.level.width(c(e.x, f) + "%") : e.level.height(c(e.y, g)),
            "function" == typeof e.opt.callback && e.opt.callback(e)
        }
    },
    a.fn.simpleSlider = a.simpleSlider.init,
    a.fn.updateSliderVal = a.simpleSlider.updateSliderVal
}(jQuery),
!function(a) {
    a.mbCookie = {
        set: function(a, b, c, d) {
            b = JSON.stringify(b),
            c || (c = 7),
            d = d ? "; domain=" + d : "";
            var e, f = new Date;
            f.setTime(f.getTime() + 864e5 * c),
            e = "; expires=" + f.toGMTString(),
            document.cookie = a + "=" + b + e + "; path=/" + d
        },
        get: function(a) {
            for (var b = a + "=", c = document.cookie.split(";"), d = 0; d < c.length; d++) {
                for (var e = c[d]; " " == e.charAt(0); )
                    e = e.substring(1, e.length);
                if (0 == e.indexOf(b))
                    return JSON.parse(e.substring(b.length, e.length))
            }
            return null
        },
        remove: function(b) {
            a.mbCookie.set(b, "", -1)
        }
    },
    a.mbStorage = {
        set: function(a, b) {
            b = JSON.stringify(b),
            localStorage.setItem(a, b)
        },
        get: function(a) {
            return localStorage[a] ? JSON.parse(localStorage[a]) : null
        },
        remove: function(a) {
            a ? localStorage.removeItem(a) : localStorage.clear()
        }
    }
}(jQuery);



/*! Stellar.js v0.6.2 | Copyright 2013, Mark Dalgleish | http://markdalgleish.com/projects/stellar.js | http://markdalgleish.mit-license.org */
(function(e, t, n, r) {
    function d(t, n) {
        this.element = t,
        this.options = e.extend({}, s, n),
        this._defaults = s,
        this._name = i,
        this.init()
    }
    var i = "stellar"
      , s = {
        scrollProperty: "scroll",
        positionProperty: "position",
        horizontalScrolling: !0,
        verticalScrolling: !0,
        horizontalOffset: 0,
        verticalOffset: 0,
        responsive: !1,
        parallaxBackgrounds: !0,
        parallaxElements: !0,
        hideDistantElements: !0,
        hideElement: function(e) {
            e.hide()
        },
        showElement: function(e) {
            e.show()
        }
    }
      , o = {
        scroll: {
            getLeft: function(e) {
                return e.scrollLeft()
            },
            setLeft: function(e, t) {
                e.scrollLeft(t)
            },
            getTop: function(e) {
                return e.scrollTop()
            },
            setTop: function(e, t) {
                e.scrollTop(t)
            }
        },
        position: {
            getLeft: function(e) {
                return parseInt(e.css("left"), 10) * -1
            },
            getTop: function(e) {
                return parseInt(e.css("top"), 10) * -1
            }
        },
        margin: {
            getLeft: function(e) {
                return parseInt(e.css("margin-left"), 10) * -1
            },
            getTop: function(e) {
                return parseInt(e.css("margin-top"), 10) * -1
            }
        },
        transform: {
            getLeft: function(e) {
                var t = getComputedStyle(e[0])[f];
                return t !== "none" ? parseInt(t.match(/(-?[0-9]+)/g)[4], 10) * -1 : 0
            },
            getTop: function(e) {
                var t = getComputedStyle(e[0])[f];
                return t !== "none" ? parseInt(t.match(/(-?[0-9]+)/g)[5], 10) * -1 : 0
            }
        }
    }
      , u = {
        position: {
            setLeft: function(e, t) {
                e.css("left", t)
            },
            setTop: function(e, t) {
                e.css("top", t)
            }
        },
        transform: {
            setPosition: function(e, t, n, r, i) {
                e[0].style[f] = "translate3d(" + (t - n) + "px, " + (r - i) + "px, 0)"
            }
        }
    }
      , a = function() {
        var t = /^(Moz|Webkit|Khtml|O|ms|Icab)(?=[A-Z])/, n = e("script")[0].style, r = "", i;
        for (i in n)
            if (t.test(i)) {
                r = i.match(t)[0];
                break
            }
        return "WebkitOpacity"in n && (r = "Webkit"),
        "KhtmlOpacity"in n && (r = "Khtml"),
        function(e) {
            return r + (r.length > 0 ? e.charAt(0).toUpperCase() + e.slice(1) : e)
        }
    }()
      , f = a("transform")
      , l = e("<div />", {
        style: "background:#fff"
    }).css("background-position-x") !== r
      , c = l ? function(e, t, n) {
        e.css({
            "background-position-x": t,
            "background-position-y": n
        })
    }
    : function(e, t, n) {
        e.css("background-position", t + " " + n)
    }
      , h = l ? function(e) {
        return [e.css("background-position-x"), e.css("background-position-y")]
    }
    : function(e) {
        return e.css("background-position").split(" ")
    }
      , p = t.requestAnimationFrame || t.webkitRequestAnimationFrame || t.mozRequestAnimationFrame || t.oRequestAnimationFrame || t.msRequestAnimationFrame || function(e) {
        setTimeout(e, 1e3 / 60)
    }
    ;
    d.prototype = {
        init: function() {
            this.options.name = i + "_" + Math.floor(Math.random() * 1e9),
            this._defineElements(),
            this._defineGetters(),
            this._defineSetters(),
            this.refresh({
                firstLoad: !0
            }),
            this.options.scrollProperty === "scroll" ? this._handleScrollEvent() : this._startAnimationLoop()
        },
        _defineElements: function() {
            this.element === n.body && (this.element = t),
            this.$scrollElement = e(this.element),
            this.$element = this.element === t ? e("body") : this.$scrollElement,
            this.$viewportElement = this.options.viewportElement !== r ? e(this.options.viewportElement) : this.$scrollElement[0] === t || this.options.scrollProperty === "scroll" ? this.$scrollElement : this.$scrollElement.parent()
        },
        _defineGetters: function() {
            var e = this
              , t = o[e.options.scrollProperty];
            this._getScrollLeft = function() {
                return t.getLeft(e.$scrollElement)
            }
            ,
            this._getScrollTop = function() {
                return t.getTop(e.$scrollElement)
            }
        },
        _defineSetters: function() {
            var t = this
              , n = o[t.options.scrollProperty]
              , r = u[t.options.positionProperty]
              , i = n.setLeft
              , s = n.setTop;
            this._setScrollLeft = typeof i == "function" ? function(e) {
                i(t.$scrollElement, e)
            }
            : e.noop,
            this._setScrollTop = typeof s == "function" ? function(e) {
                s(t.$scrollElement, e)
            }
            : e.noop,
            this._setPosition = r.setPosition || function(e, n, i, s, o) {
                t.options.horizontalScrolling && r.setLeft(e, n, i),
                t.options.verticalScrolling && r.setTop(e, s, o)
            }
        },
        refresh: function(n) {
            var r = this
              , i = r._getScrollLeft()
              , s = r._getScrollTop();
            (!n || !n.firstLoad) && this._reset(),
            this._setScrollLeft(0),
            this._setScrollTop(0),
            n && n.firstLoad && /WebKit/.test(navigator.userAgent) && e(t).load(function() {
                var e = r._getScrollLeft()
                  , t = r._getScrollTop();
                r._setScrollLeft(e + 1),
                r._setScrollTop(t + 1),
                r._setScrollLeft(e),
                r._setScrollTop(t)
            }),
            this._setScrollLeft(i),
            this._setScrollTop(s)
        },
        _findBackgrounds: function() {
            var t = this, n = this._getScrollLeft(), i = this._getScrollTop(), s;
            this.backgrounds = [];
            if (!this.options.parallaxBackgrounds)
                return;
            s = this.$element.find("[data-stellar-background-ratio]"),
            this.$element.data("stellar-background-ratio") && (s = s.add(this.$element)),
            s.each(function() {
                var s = e(this), o = h(s), u, a, f, l, p, d, v, m, g, y = 0, b = 0, w = 0, E = 0;
                if (!s.data("stellar-backgroundIsActive"))
                    s.data("stellar-backgroundIsActive", this);
                else if (s.data("stellar-backgroundIsActive") !== this)
                    return;
                s.data("stellar-backgroundStartingLeft") ? c(s, s.data("stellar-backgroundStartingLeft"), s.data("stellar-backgroundStartingTop")) : (s.data("stellar-backgroundStartingLeft", o[0]),
                s.data("stellar-backgroundStartingTop", o[1])),
                p = s.css("margin-left") === "auto" ? 0 : parseInt(s.css("margin-left"), 10),
                d = s.css("margin-top") === "auto" ? 0 : parseInt(s.css("margin-top"), 10),
                v = s.offset().left - p - n,
                m = s.offset().top - d - i,
                s.parents().each(function() {
                    var t = e(this);
                    if (t.data("stellar-offset-parent") === !0)
                        return y = w,
                        b = E,
                        g = t,
                        !1;
                    w += t.position().left,
                    E += t.position().top
                }),
                u = s.data("stellar-horizontal-offset") !== r ? s.data("stellar-horizontal-offset") : g !== r && g.data("stellar-horizontal-offset") !== r ? g.data("stellar-horizontal-offset") : t.horizontalOffset,
                a = s.data("stellar-vertical-offset") !== r ? s.data("stellar-vertical-offset") : g !== r && g.data("stellar-vertical-offset") !== r ? g.data("stellar-vertical-offset") : t.verticalOffset,
                t.backgrounds.push({
                    $element: s,
                    $offsetParent: g,
                    isFixed: s.css("background-attachment") === "fixed",
                    horizontalOffset: u,
                    verticalOffset: a,
                    startingValueLeft: o[0],
                    startingValueTop: o[1],
                    startingBackgroundPositionLeft: isNaN(parseInt(o[0], 10)) ? 0 : parseInt(o[0], 10),
                    startingBackgroundPositionTop: isNaN(parseInt(o[1], 10)) ? 0 : parseInt(o[1], 10),
                    startingPositionLeft: s.position().left,
                    startingPositionTop: s.position().top,
                    startingOffsetLeft: v,
                    startingOffsetTop: m,
                    parentOffsetLeft: y,
                    parentOffsetTop: b,
                    stellarRatio: s.data("stellar-background-ratio") === r ? 1 : s.data("stellar-background-ratio")
                })
            })
        },
        _reset: function() {
            var e, t, n, r, i;
            for (i = this.particles.length - 1; i >= 0; i--)
                e = this.particles[i],
                t = e.$element.data("stellar-startingLeft"),
                n = e.$element.data("stellar-startingTop"),
                this._setPosition(e.$element, t, t, n, n),
                this.options.showElement(e.$element),
                e.$element.data("stellar-startingLeft", null).data("stellar-elementIsActive", null).data("stellar-backgroundIsActive", null);
            for (i = this.backgrounds.length - 1; i >= 0; i--)
                r = this.backgrounds[i],
                r.$element.data("stellar-backgroundStartingLeft", null).data("stellar-backgroundStartingTop", null),
                c(r.$element, r.startingValueLeft, r.startingValueTop)
        },
        destroy: function() {
            this._reset(),
            this.$scrollElement.unbind("resize." + this.name).unbind("scroll." + this.name),
            this._animationLoop = e.noop,
            e(t).unbind("load." + this.name).unbind("resize." + this.name)
        },
        _handleScrollEvent: function() {
            var e = this
              , t = !1
              , n = function() {
                e._repositionElements(),
                t = !1
            }
              , r = function() {
                t || (p(n),
                t = !0)
            };
            this.$scrollElement.bind("scroll." + this.name, r),
            r()
        },
        _startAnimationLoop: function() {
            var e = this;
            this._animationLoop = function() {
                p(e._animationLoop),
                e._repositionElements()
            }
            ,
            this._animationLoop()
        }
    },
    e.fn[i] = function(t) {
        var n = arguments;
        if (t === r || typeof t == "object")
            return this.each(function() {
                e.data(this, "plugin_" + i) || e.data(this, "plugin_" + i, new d(this,t))
            });
        if (typeof t == "string" && t[0] !== "_" && t !== "init")
            return this.each(function() {
                var r = e.data(this, "plugin_" + i);
                r instanceof d && typeof r[t] == "function" && r[t].apply(r, Array.prototype.slice.call(n, 1)),
                t === "destroy" && e.data(this, "plugin_" + i, null)
            })
    }
    ,
    e[i] = function(n) {
        var r = e(t);
        return r.stellar.apply(r, Array.prototype.slice.call(arguments, 0))
    }
    ,
    e[i].scrollProperty = o,
    e[i].positionProperty = u,
    t.Stellar = d
}
)(jQuery, this, document);




