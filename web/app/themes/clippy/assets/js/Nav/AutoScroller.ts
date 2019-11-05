'use strict';

declare var jQuery:any;

export default class AutoScroller {
    static init() {

        console.log(location.hash);

        if (location.hash) {
            var anchorTarget = document.querySelector('[name="'+location.hash.replace('#','')+'"]');
            if (anchorTarget == null) {
                anchorTarget = document.querySelector('[id="'+location.hash.replace('#','')+'"]');
            }

            console.log(anchorTarget);

            if (anchorTarget != null) {
                setTimeout(() => {
                    jQuery('html, body').scrollTop(0).show();
                    jQuery("html, body").animate({
                        scrollTop: jQuery(anchorTarget).offset().top
                    }, 1500, 'swing');
                }, 0);
            }
        }

        document.querySelectorAll('a[href*="#"]').forEach(function(anchor:HTMLAnchorElement){
            if ((anchor.hostname == document.location.hostname) && (anchor.pathname == document.location.pathname)) {
                var anchorParts = anchor.href.split('#');
                if (anchorParts.length == 2) {
                    var anchorTarget = document.querySelector('[name="'+anchorParts[1]+'"]');
                    if (anchorTarget == null) {
                        anchorTarget = document.querySelector('[id="'+anchorParts[1]+'"]');
                    }

                    if (anchorTarget) {
                        anchor.addEventListener('click', function(e){
                            e.preventDefault();

                            document.body.classList.remove('snap');

                            jQuery("html, body").animate({
                                scrollTop: jQuery(anchorTarget).offset().top
                            }, 1500, 'swing');

                            history.pushState(null, null, anchor.href);

                            return false;
                        });
                    }
                }
            }
        });
    }
}