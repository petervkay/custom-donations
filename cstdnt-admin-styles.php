<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
add_action('admin_head', 'cstdnt_custom_styles');
add_action('admin_head', 'cstdnt_custom_scripts');

function cstdnt_custom_styles() {
  echo '
  <style>
    #cstdnt-admin input.wide {
      width:500px;
    }

    .cstdnt_form_section {
      background-color:#b5b5b5; 
      margin-bottom:30px;
      padding:30px;
    }


  </style>';
}

function cstdnt_custom_scripts() {
  echo '
  <script>
    jQuery(document).ready(function($) {
      $(".cstdnt_form_section .enable").each(function() {
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
    

      $(".cstdnt_form_section .enable").click(function() {
        $row = $(this).closest("tr").siblings();
        $row.toggle();
      });
    });
  </script>';
}


?>