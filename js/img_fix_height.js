jQuery( document ).ready(function() {

    jQuery('#paper img').each(function() {
        var h = jQuery(this).height();
        var step = 45;
        // console.log('Original height:' +h);
        newheight = Math.floor(h/step);
        if (newheight > 0) {
            jQuery(this).css('height', (newheight+1) * step);
            jQuery(this).css('width','auto');
            // console.log('newheight:' + (newheight+1) * step);
        } else {
            jQuery(this).height(step);
            jQuery(this).width('auto');
            // console.log('newheight:' + newheight);
        }
    })
});
