    jQuery( document ).ready(function() {

        jQuery('#paper img').each(function() {
            var h = jQuery(this).height();
            var step = 45;
            console.log(h);
            newheight = Math.floor(h/45);
            if (newheight > 0) {
                jQuery(this).height(newheight * 45);
                jQuery(this).width('auto');
                console.log('newheight:' + newheight * 45);
            } else {
                jQuery(this).height(45);
                jQuery(this).width('auto');
                console.log(newheight);
            }
        })
    });
