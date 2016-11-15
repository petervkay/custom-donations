<?php

add_action('admin_head', 'my_custom_styles');
add_action('admin_head', 'my_custom_scripts');

function my_custom_styles() {
  echo '
  <style>
    #cd-admin input.wide {
    	width:500px;
    }

    .cd_form_section {
    	background-color:#b5b5b5; 
    	margin-bottom:30px;
    	padding:30px;
    }


  </style>';
}

function my_custom_scripts() {
	echo '
	<script>
		jQuery(document).ready(function($) {
      $(".cd_form_section .enable").each(function() {
        $row = $(this).closest("tr").siblings();
        
        if ($(this).is(":checked")) {
          console.log("show");
          $row.show();
        }
        else {
          console.log("hide");
          $row.hide();
        }
      });
    

			$(".cd_form_section .enable").click(function() {
				$row = $(this).closest("tr").siblings();
				$row.toggle();
			});
		});
	</script>';
}


?>