jQuery(document).ready(function($){
    var loader = $('#loader-status').val();
    if (loader == 1) {
        $('body').css({"height": "100%", "overflow": "hidden"})
        $(window).load(function() {
            // Animate loader off screen
            $('body').removeAttr("style");
            $(".se-pre-con").fadeOut("slow");
        });
    } 
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            //$('.scrollup').fadeIn();
            $('#main-header').addClass('tiny');
            $('.scrollup').fadeIn();
        } else {
            //$('.scrollup').fadeOut();
            $('#main-header').removeClass('tiny');
            $('.scrollup').fadeOut();
        }
    });
    
    $('.scrollup').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
    $(".navbar-nav > li:has('ul')").prepend("<span class='drop_down_icon fa fa-angle-down'></span>");
    
    $(".drop_down_icon").click(function() {
        $(this).siblings("ul").slideToggle();
    }); 
    new WOW().init();
    $('#section-banner-owl').owlCarousel({
        loop: true,
        nav: true,
        dots: true,
        items:1,
        margin: 0,              
        lazyLoad: true,
        autoplay: true,
        autoplayTimeout: 6000,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
    });
    $('#section-feature-owl').owlCarousel({
        loop:true,
        nav:true,
        dots: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    $('#section-banner-owl .owl-prev').html('<i class="fa fa-angle-left"></i>');
    $('#section-banner-owl .owl-next').html('<i class="fa fa-angle-right"></i>');
    $('#section-feature .slider-part .owl-prev').html('<i class="fa fa-arrow-circle-left"></i>');
    $('#section-feature .slider-part .owl-next').html('<i class="fa fa-arrow-circle-right"></i>');
    $('#typed3').typewriter({
        prefix : "# ",
        text : ['I am Md. Mostak Shahid', 'I am Creative', 'I am Experienced'],
        typeDelay : 50,
        waitingTime : 1500,
        blinkSpeed : 200
    });
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });
});
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
/**/
window.onload = function() {
    var canvasInteractive = document.getElementById('canvas-interactive');
    var canvasReference = document.getElementById('canvas-reference');

    var contextInteractive = canvasInteractive.getContext('2d');
    var contextReference = canvasReference.getContext('2d');

    var image = document.getElementById('img');

    var width = canvasInteractive.width = canvasReference.width = window.innerWidth;
    var height = canvasInteractive.height = canvasReference.height = window.innerHeight;

    var logoDimensions = {
        x: 340,
        y: 500
    };

    var center = {
        x: width / 2,
        y: height / 2
    };

    var logoLocation = {
        x: center.x - logoDimensions.x / 2,
        y: center.y - logoDimensions.y / 2
    };

    var mouse = {
        radius: Math.pow(200, 2),
        x: 0,
        y: 0
    };

    var particleArr = [];
    var particleAttributes = {
        friction: 0.95,
        ease: 0.19,
        spacing: 3, //6
        size: 1, //4
        color: "#ffffff"
    };

    function Particle(x, y) {
        this.x = this.originX = x;
        this.y = this.originY = y;
        this.rx = 0;
        this.ry = 0;
        this.vx = 0;
        this.vy = 0;
        this.force = 0;
        this.angle = 0;
        this.distance = 0;
    }

    Particle.prototype.update = function() {
        this.rx = mouse.x - this.x;
        this.ry = mouse.y - this.y;
        this.distance = this.rx * this.rx + this.ry * this.ry;
        this.force = -mouse.radius / this.distance;
        if(this.distance < mouse.radius) {
            this.angle = Math.atan2(this.ry, this.rx);
            this.vx += this.force * Math.cos(this.angle);
            this.vy += this.force * Math.sin(this.angle);
        }
        this.x += (this.vx *= particleAttributes.friction) + (this.originX - this.x) * particleAttributes.ease;
        this.y += (this.vy *= particleAttributes.friction) + (this.originY - this.y) * particleAttributes.ease;
    };

    function init() {
        contextReference.drawImage(image,logoLocation.x, logoLocation.y);
        var pixels = contextReference.getImageData(0, 0, width, height).data;
        var index;
        for(var y = 0; y < height; y += particleAttributes.spacing) {
            for(var x = 0; x < width; x += particleAttributes.spacing) {
                index = (y * width + x) * 4;
                if(pixels[++index] > 0) {
                    particleArr.push(new Particle(x, y));
                }
            }
        }
    };
    init();

    function update() {
        for(var i = 0; i < particleArr.length; i++) {
            var p = particleArr[i];
            p.update();
        }
    };

    function render() {
        contextInteractive.clearRect(0, 0, width, height);
        for(var i = 0; i < particleArr.length; i++) {
            var p = particleArr[i];
            contextInteractive.fillStyle = particleAttributes.color;
            contextInteractive.fillRect(p.x, p.y, particleAttributes.size, particleAttributes.size);
        }
    };

    function animate() {
        update();
        render();
        requestAnimationFrame(animate);
    }
    animate();
    document.body.addEventListener("mousemove", function(event) {
        mouse.x = event.clientX;
        mouse.y = event.clientY;
    });

    document.body.addEventListener("touchstart", function(event) {
        mouse.x = event.changedTouches[0].clientX;
        mouse.y = event.changedTouches[0].clientY;
    }, false);

    document.body.addEventListener("touchmove", function(event) {
        event.preventDefault();
        mouse.x = event.targetTouches[0].clientX;
        mouse.y = event.targetTouches[0].clientY;
    }, false);

    document.body.addEventListener("touchend", function(event) {
        event.preventDefault();
        mouse.x = 0;
        mouse.y = 0;
    }, false);
};