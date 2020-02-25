
jQuery(document).ready(function ($) {
// NOTE: Scroll performance is poor in Safari
// - this appears to be due to the events firing much more slowly in Safari.
//   Dropping the scroll event and using only a raf loop results in smoother
//   scrolling but continuous processing even when not scrolling

 var $postContent = $(".post-content");
    //$postContent.fitVids();
    // End fitVids
    //$body              = $('body');
    var progressBar = document.querySelector('.progress');
    var header = document.querySelector('.floating-header');
    var title = document.querySelector('.post-header-content');

    var lastScrollY = window.scrollY;
    var lastWindowHeight = window.innerHeight;
    var lastDocumentHeight = $(document).height();
    var ticking = false;



    function onScroll() {
        lastScrollY = window.scrollY;
        requestTick();
    }

    function onResize() {
        lastWindowHeight = window.innerHeight;
        lastDocumentHeight = $(document).height();
        requestTick();
    }

    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(update);
        }
        ticking = true;
    }

    function update() {
        var trigger = title.getBoundingClientRect().top + window.scrollY;
        var triggerOffset = title.offsetHeight + 35;
        var progressMax = lastDocumentHeight - lastWindowHeight;
        var nav = document.querySelector('.post-template .post-header');
        var $body = $('body');

        // show/hide floating header
        if (lastScrollY >= trigger + triggerOffset) {
            header.classList.add('floating-active');

        } else {
            header.classList.remove('floating-active');
        }

        if ($body.hasClass('search-open')){
            header.classList.remove('floating-active');
            nav.classList.add('fixed-head');
            } else {
                nav.classList.remove('fixed-head');
        }

        if ($body.hasClass('offcanvas-open')){
            header.classList.remove('floating-active');
            nav.classList.add('fixed-head');
            } else {
                nav.classList.remove('fixed-head');
        }

        progressBar.setAttribute('max', progressMax);
        progressBar.setAttribute('value', lastScrollY);

        ticking = false;
    }

    window.addEventListener('scroll', onScroll, {passive: true});
    window.addEventListener('resize', onResize, false);

    update();


}); // end page load scripts