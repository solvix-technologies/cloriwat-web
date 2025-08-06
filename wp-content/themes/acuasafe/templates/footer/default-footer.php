<?php
/**
 * Footer Template  File
 *
 * @package ACUASAFE
 * @author  Tona Theme
 * @version 1.0
 */

$options = acuasafe_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
?>


 
<div  class="mrfooter">
   <div class="container">
            <div class="row">
              <?php dynamic_sidebar( 'footer-sidebar' ); ?>
            </div>
        </div>
</div>   
    <!--End footer area-->