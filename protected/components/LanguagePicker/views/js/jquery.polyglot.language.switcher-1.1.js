// JavaScript Document


/* "Polyglot" Language Switcher
--------------------------------------------------------------------------------
Version: 1.1
Author: Ioan-Octavian Rusu
Author URI: http://www.ixtendo.com
License: MIT License
License URI: http://www.opensource.org/licenses/mit-license.php
-------------------------------------------------------------------------------- */


(function ($) {

    $.fn.polyglotLanguageSwitcher = function (op) {

        var ls = $.fn.polyglotLanguageSwitcher;
        var rootElement = $("#polyglotLanguageSwitcher");
        var aElement;
        var ulElement = $("<ul class=\"dropdown\">");
        var length = 0;
        var isOpen = false;
        var liElements = new Array();
        var settings = $.extend({}, ls.defaults, op);
        var isStaticWebSite = settings.websiteType == 'static';
        var store;
        if (isStaticWebSite) {
            store = new Persist.Store('Polyglot Language Switcher');
        }

        init();
        installListeners();

        function open() {
            aElement.addClass("active");
            doAnimation(true);
            setTimeout(function () {
                isOpen = true;
            }, 100);
        }

        function close() {
            doAnimation(false);
            aElement.removeClass("active");
            isOpen = false;
        }

        function doAnimation(open) {
            if (settings.effect == 'fade') {
                if (open) {
                    ulElement.fadeIn(settings.animSpeed);
                } else {
                    ulElement.fadeOut(settings.animSpeed);
                }
            } else {
                if (open) {
                    ulElement.slideDown(settings.animSpeed);
                } else {
                    ulElement.slideUp(settings.animSpeed);
                }
            }
        }

        function doAction(item) {
            if (isOpen) {
                close();
            }
            var selected_a_element = $(item).children(":first-child");
            var selected_span_element = $(selected_a_element).children(":first-child");
            var selected_id = $(selected_a_element).attr("id");
            var selected_text = $(selected_span_element).text();

            $(ulElement).children().each(function () {
                $(this).detach();
            });
            for (var i = 0; i < liElements.length; i++) {
                if ($(liElements[i]).children(":first-child").attr("id") != selected_id) {
                    ulElement.append(liElements[i]);
                }
            }
            aElement.attr("id", selected_id);
            $(aElement).children(":first-child").children(":first-child").text(selected_text);
            if (isStaticWebSite) {
                store.set('lang', selected_id);
            }
        }

        function installListeners() {
            $(document).click(function () {
                if (isOpen) {
                    close();
                }
            });
            $(document).keyup(function (e) {
                if (e.which == 27 && isOpen) {
                    close();
                }
            });
        }

        function init() {
            var selectedItem;
            $("#polyglot-language-options > option").each(function () {
                var selected = $(this).attr("selected");
                if (isStaticWebSite) {
                    var selectedId;
                    store.get('lang', function (ok, val) {
                        if (ok) {
                            selectedId = val;
                        }
                    });
                    if (selectedId == $(this).attr("id")) {
                        selected = true;
                    }
                }
                var liElement = toLiElement($(this));
                if (selected) {
                    selectedItem = liElement;
                }
                liElements.push(liElement);
                if (length > 0) {
                    ulElement.append(liElement);
                } else {
                    aElement = $("<a id=\"" + $(this).attr("id") + "\" class=\"current\" href=\"#\"><span><span class=\"trigger\">" + $(this).text() + "</span></span></a>");
                    aElement.click(
                        function () {
                            if (!isOpen) {
                                open();
                            }
                        }
                    );
                }
                length++;
            });
            $("#polyglotLanguageSwitcher form:first-child").remove();
            rootElement.append(aElement);
            rootElement.append(ulElement);
            if (selectedItem) {
                doAction(selectedItem);
            }
        }

        function toLiElement(option) {
            var id = $(option).attr("id");
            var value = $(option).attr("value");
            var text = $(option).text();
            var liElement;
            if (isStaticWebSite) {
                var urlPage = 'http://' + document.domain + '/' + settings.pagePrefix + id + '/' + settings.indexPage;
                liElement = $("<li><a id=\"" + id + "\" href=\"" + urlPage + "\"><span>" + text + "</span></a></li>");
            } else {
                var href = document.URL.replace('#', '');
                var params = parseQueryString();
                params[settings.paramName] = value;
                if (href.indexOf('?') > 0) {
                    href = href.substring(0, href.indexOf('?'));
                }
                href += toQueryString(params);
                liElement = $("<li><a id=\"" + id + "\" href=\"" + href + "\"><span>" + text + "</span></a></li>");
            }
            liElement.bind('click', function () {
                doAction($(this));
            });
            return liElement;
        }

        function parseQueryString() {
            var params = {};
            var query = window.location.search.substr(1).split('&');
            if (query.length > 0) {
                for (var i = 0; i < query.length; ++i) {
                    var p = query[i].split('=');
                    if (p.length != 2) {
                        continue;
                    }
                    params[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
                }
            }
            return params;
        }

        function toQueryString(params) {
            if (settings.testMode) {
                return '#';
            } else {
                var queryString = '?';
                var i = 0;
                for (var param in params) {
                    var x = '';
                    if (i > 0) {
                        x = '&';
                    }
                    queryString += x + param + "=" + params[param];
                    i++;
                }
                return queryString;
            }
        }

    };

    var ls = $.fn.polyglotLanguageSwitcher;
    ls.defaults = {
        animSpeed:200,
        effect:'slide',
        paramName:'lang',
        pagePrefix:'',
        indexPage:'index.html',
        websiteType:'dynamic',
        testMode: false
    };


})(jQuery);


