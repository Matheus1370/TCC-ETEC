var target = document.querySelectorAll('[data-anime]');
var animationClass = 'animate';

function animeScroll() {
    var windowTop = window.pageYOffset + (window.innerHeight * 0.75);
    target.forEach(function (element) {
        if ((windowTop) > element.offsetTop) {
            element.classList.add(animationClass);
        } else {
            element.classList.remove(animationClass);

        }
    })
}

animeScroll();

if (target.length) {
    window.addEventListener('scroll', function () {
        animeScroll();
    })
}
