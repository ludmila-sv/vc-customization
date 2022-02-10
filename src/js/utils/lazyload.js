import LazyLoad from 'vanilla-lazyload';

export default () => {
	window.PF = window.PF || {};

	window.PF.lazyLoad = new LazyLoad( {
		elements_selector: '.lazy',
		// load_delay: 300 //adjust according to use case
	} );
};

// below is my old approach with data-src data-src-2x it has advantage in smarter dealing with
// background images making them 2x if necessary
/* (($)=>{
    "use strict";

    // jQuery('img, .retina').addClass('loading');

    const lazyLoadSectionSelector = 'section[data-lazyload]';
    const runningOnBrowser = typeof window !== "undefined";
    const isBot = runningOnBrowser && !("onscroll" in window) || typeof navigator !== "undefined" && /(gle|ing|ro)bot|crawl|spider/i.test(navigator.userAgent);

    const svgSupported = document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image", "1.1");

    function loadImg(el) {

        el = (typeof(el) !== 'undefined') ? el : this;

        let src = el.getAttribute('src');
        let src1x = el.getAttribute('data-src');
        let src2x = el.getAttribute('data-src-2x');

        if ((window.devicePixelRatio > 1 && src2x) || (typeof(src2x) === 'string' && svgSupported && src2x.match(/.*\.svgz?$/) )) {
            el.setAttribute('src', src2x);
        } else if (src1x && src1x !== src) { // update original src if it's different
            el.setAttribute('src', src1x);
        }
        el.classList.remove('loading');

    }

    function loadContainerImage(el) {

        el = (typeof(el) !== 'undefined') ? el : this;

        const urlMatcher = /(url\([",'])([^",']+)([",']\))/g;
        const style = getStyle(el);
        let src = el.getAttribute('data-src');
        let src2x = el.getAttribute('data-src-2x');

        if (window.devicePixelRatio > 1 && src2x && src2x !== 'null') {
            src = src2x;
        } else {
            if (svgSupported && src2x && typeof(src2x) === 'string' && src2x.match(/.+\.svg$/g)) {
                src = src2x;
            }
        }
        // lets check if src2x is svg and if it is and browser supports svg set it
        let BackgroundImage = style['backgroundImage'];
        if (BackgroundImage.match(urlMatcher)) { // this done to solve situation when we have multiple backgrounds
            BackgroundImage = BackgroundImage.replace(urlMatcher, '$1' + src + '$3');
            if (src.length) {
                el.style.backgroundImage = BackgroundImage;
            }
        } else {
            // if not set just set it as background
            if (src.length) {
                el.style.backgroundImage = "url('" + src + "')";
            }
        }
        el.classList.remove('loading');

    }


    function loadImagesInElement(sectionEl){
        try {
            $('img', sectionEl).each((i, el)=>{loadImg(el)});

            $('.retina', sectionEl).each((i,el)=>{loadContainerImage(el)});

        } catch (e) {
            console.warn('Exception on Retina images script loading images for', sectionEl, e);
        }
    }


    let observer;

    if(window['IntersectionObserver'] && (!isBot)){

        observer = new IntersectionObserver(function ImageObserverCallback(entries){

                entries.forEach(function iterateOverObservedEntries(entry){

                    if (entry.intersectionRatio > 0) {

                        observer.unobserve(entry.target);
                        console.log('lazy loading images in', entry.target);
                        loadImagesInElement(entry.target);
                    }

                });
        },{
            root: null,
            rootMargin: "0px",
            threshold: [0]
        });

        // lets add elements to be observed
        $(lazyLoadSectionSelector).each((i, el)=>{
            observer.observe(el);

        });
    }else{
        // load images regardless of lazyness
        $(lazyLoadSectionSelector).each((i, el)=>{
            loadImagesInElement(el);
        });

    }


})(jQuery) */
