    jQuery( document ).ready(function() {

        jQuery('#paper img').each(function() {
            var h = jQuery(this).height();
            var step = 45;
            // console.log(h);
            newheight = Math.floor(h/step);
            if (newheight > 0) {
                jQuery(this).height(newheight * step);
                jQuery(this).width('auto');
                // console.log('newheight:' + newheight * step);
            } else {
                jQuery(this).height(step);
                jQuery(this).width('auto');
                // console.log('newheight:' + newheight);
            }
        })
    });
