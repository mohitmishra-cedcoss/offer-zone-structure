/* global storefrontScreenReaderText */

/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 * Also adds a focus class to parent li's for accessibility.
 */
( function () {
    jQuery(document).ready(function() {
       const drop_down = jQuery('#event_selection');
       const slugs = admin_end_object.meta_boxes_ids;

       slugs.forEach(function(slug){
         let meta_boxes_id = "#"+slug;
         jQuery(meta_boxes_id ).hide();
         console.log( meta_boxes_id );
         jQuery(meta_boxes_id).addClass('mwb_metabox');
       })

       jQuery('#'+drop_down.val()).show();
       
       // jQuery('.meta-box-sortables').hide();
       drop_down.on('change',function(e) {
         jQuery('.mwb_metabox').hide();
          let drop_down = jQuery(this).val();
         jQuery('#'+drop_down).show();
       })
    });
} )();