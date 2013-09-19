$(document).ready(function() {

    // Block not available links
    $('a.feature-not-available').click(function() {
        var v = 'alpha';
        alert('Fonctionnalité non disponible: Ceci est une version Bêta du site');
        return false;
    });

    // Configure zoom
    $('figure.zoom').each(function() {

        var zoomLink = $(this).find("a:first");

        // Add zoom image
        var zoomImg = $("<img src='/assets/images/zoom.svg' />")
            .css({position: "absolute", top: 50, left: 90})
            .hide();

        // Zoom image animation
        zoomLink
            .append(zoomImg)
            .mouseenter(function() {zoomImg.fadeIn();})
            .mouseleave(function() {zoomImg.fadeOut();});
    });

    // Initialize the gallery
    $('figure.touchTouch a').touchTouch();

    // Init pretty print
    prettyPrint();
});