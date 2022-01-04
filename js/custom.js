// // ======== Clickable Table rows ==========
$(document).ready(function($) {
    $("tr").click(function() {
        let href = $(this).data("href");
        if ( href ) {
            window.document.location = href;
        }
    });
});