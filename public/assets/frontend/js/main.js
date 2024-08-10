
jQuery(document).ready(function () {
    320 > $(window).width() ? $(".fixed-header").hide() : ($(".fixed-header").hide(), $(function () {
        $(window).scroll(function () {
            300 < $(this).scrollTop() ? $(".fixed-header").fadeIn() : $(".fixed-header").fadeOut()
        })
    }), $(".fixed-header").click(function () {
        $("html, body").animate({
            scrollTop: $("header").offset().top
        },
            0)
    }));
})




// Get all iframes to be embedded
var embeds = document.querySelectorAll('.js-embed-iframe');

embeds.forEach(function (embed) {
    // Get the href from the anchor for each iframe to be embedded
    var url = embed.getAttribute('href');

    // Check that there is a URL
    if (typeof url !== 'undefined' && url !== '') {

        // Add an on click event listener to the anchor
        embed.addEventListener('click', function (e) {
            var anchor = this;

            // Prevent clicking through to the href
            e.preventDefault();

            // Create the iframe and set the source attribute to the value of the anchor’s href
            var iframe = document.createElement('iframe');
            iframe.setAttribute('src', url);

            // Get the parent of the anchor and replace the anchor with the iframe + remove the figure’s caption
            var parent = anchor.parentNode;
            parent.replaceChild(iframe, anchor);
            parent.removeChild(document.querySelector('figcaption'));
        });
    }
});