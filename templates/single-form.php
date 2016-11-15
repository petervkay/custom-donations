 <?php
 ?>

<?php if ($options['cd_single_enable']==true) { ?>

    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" class='custom-donations-form single-form'>

        <?php 
        if (empty($options['cd_paypal_email'])) {
            die('Paypal email unavailable');
        }

        if (empty($options['cd_organization_name'])) {
            die('Organization name unavailable');
        }
        ?>
        
         <input type="hidden" name="business"
            value="<?php echo $options['cd_paypal_email']; ?>"> 
        
         <h2 class='cdf-header'> <?php echo $options['cd_single_header']; ?></h2>
        <!-- Identify your business so that you can collect the payments. -->
       

        <!-- Specify a Donate button. -->
        <input type="hidden" name="cmd" value="_donations">

        <!-- Specify details about the contribution -->
        <input type="hidden" name="item_name" value="Donate to <?php echo $options['cd_organization_name']; ?>">

        <input type="hidden" name="currency_code" value="USD">

        <!-- Display the payment button. -->
        <?php if (empty($options['cd_single_meta'])==false) { ?>

            <tr><td>

                <input type="hidden" name="on2" value="<?php echo $options['cd_single_meta']; ?>">
                <?php echo $options['cd_single_meta']; ?></td></tr><tr><td>
                <input type="text" name="os2" maxlength="200">
            </td></tr>
       <?php } ?>
        <input type="image" name="submit" class='cdf-submit' 
        src="<?php echo $options['cd_donate_image']; ?>"
        alt="Donate">
        <img alt="" width="1" height="1" 
        src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

    </form>

<?php
 } //cd_single_enable
?>