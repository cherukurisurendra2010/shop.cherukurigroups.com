<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo $msg;
?>
<form name="registration" id="registration" method="post">
    First Name:<input type="text" name="first_name"/><br/>
    First Name:<input type="text" name="last_name"/><br/>
    username:<input type="text" name="username"/><br/>
    email:<input type="text" name="email"/><br/>
    password:<input type="password" name="password"/><br/>
    confirm Password:<input type="password" name="cpassword"/><br/>
    mobile:<input type="text" name="mobile"/><br/>
    <input type="checkbox" name="accept_terms"/>Accept Terms and Conditions<br/>
    <input type="submit" name="submit" value="Registration"/>
</form>
