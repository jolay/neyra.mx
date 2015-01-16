<?php
// BGVIDEO-INIT.JS
//--------------------------------------------------------------------------------------------------------------------------------
//This is  JS file that activates element animation effects used in this template*/
// -------------------------------------------------------------------------------------------------------------------------------
// Template Name: DIGNITY.
// Author: Designova.
// Website: http://www.designova.net 
// Copyright: (C) 2013 
// -------------------------------------------------------------------------------------------------------------------------------

/*global $:false */
/*global window: false */

$sourcevimeo = $params->get('sourcevimeo');
?>
<script>
(function(){
  "use strict";


$(function ($) {

   		
        $.okvideo({ source: '<?php echo $sourcevimeo; ?>', //set your vimeo video source here
                    loop: true,
                    hd:true, 
                    adproof: true
                 });
   
});
// $(function ($)  : ends

})();
//  JSHint wrapper $(function ($)  : ends


</script>




	

