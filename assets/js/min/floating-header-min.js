jQuery(document).ready((function(e){e(".post-content");var t=document.querySelector(".progress"),o=document.querySelector(".floating-header"),s=document.querySelector(".post-header-content"),i=window.scrollY,n=window.innerHeight,a=e(document).height(),d=!1;function c(){d||requestAnimationFrame(r),d=!0}function r(){var c=s.getBoundingClientRect().top+window.scrollY,r=s.offsetHeight+35,l=a-n,u=document.querySelector(".post-template .post-header"),f=e("body");i>=c+r?o.classList.add("floating-active"):o.classList.remove("floating-active"),f.hasClass("search-open")?(o.classList.remove("floating-active"),u.classList.add("fixed-head")):u.classList.remove("fixed-head"),f.hasClass("offcanvas-open")?(o.classList.remove("floating-active"),u.classList.add("fixed-head")):u.classList.remove("fixed-head"),t.setAttribute("max",l),t.setAttribute("value",i),d=!1}window.addEventListener("scroll",(function(){i=window.scrollY,c()}),{passive:!0}),window.addEventListener("resize",(function(){n=window.innerHeight,a=e(document).height(),c()}),!1),r()}));