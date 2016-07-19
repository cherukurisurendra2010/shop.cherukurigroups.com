<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


echo 'Welcome'.$_SESSION['user']->email;

?>
<a href="<?php echo base_url();?>user/logout">Logout</a>