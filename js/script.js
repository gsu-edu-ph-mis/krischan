jQuery(document).ready(function($) {
    /* Nav */
    (function($) {
        if($('#nav-toggle').is(':visible') === true) { /* Do this on mobile only */
            $('#nav-main').find('.current-menu-ancestor').toggleClass('menu-show'); /* Expand menus up to current item */
        }
        $(document).on('click.krischan', function(e){ /* Hide subnavs when click is not on nav */
            if($('#nav-toggle').is(':visible') === false) { /* Do this only in desktop, where nav-toggle is hidden */
                $('.nav .menu-show').removeClass('menu-show');
            }

        }).on('click.krischan', '#nav-main', function (e) { /* Do not close subnavs if nav was clicked */
            e.stopPropagation();

        }).on('click.krischan', '.menu-expander', function (e) {
            var parent = $(this).parent();

            if($('#nav-toggle').is(':visible') === false) { /* Do this only in desktop, where nav-toggle is hidden */
                parent.siblings().removeClass('menu-show').find('.menu-show').removeClass('menu-show');
            }
            parent.toggleClass('menu-show');
        }).on('click.krischan', '#nav-toggle', function (e) { /* Toggle main nav class */
            var navMain = $('#nav-main'),
                exp;

            $(this).toggleClass('toggle-active');

            navMain.toggleClass('menu-show');

        });
    })($);
});