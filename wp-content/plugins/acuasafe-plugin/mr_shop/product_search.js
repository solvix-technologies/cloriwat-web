(function ($) {
    ("use strict");

    $(document).ready(function() {

      $(".mr_select_one").change(function(){
        $(' .mr_select_two').prop('disabled', false);
      });

      $(".mr_select_two").change(function(){
        $(' .mr_select_three').prop('disabled', false);
      });

      $(" .mr_select_three").change(function(){
        $('.mr_select_four').prop('disabled', false);
      });

    });
	
	
	    if ($(".theme_carousel").length) {
            $(".theme_carousel").each(function (index) {
            var $owlAttr = {},
            $extraAttr = $(this).data("options");
            $.extend($owlAttr, $extraAttr);
            $(this).owlCarousel($owlAttr);
        });
    }
    


  })(jQuery);
