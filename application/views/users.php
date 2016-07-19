<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
echo "View Users";
var_dump($data);
?>

<form name="add_user" id="add_user" method="post">
    Name:<input type="text" name="first_name" value=""/><br/>
    User Name:<input type="text" name="user_name" value=""/><br/>
    Password:<input type="password" name="password" value=""/>
    <input type="submit" name="submit" value="Submit"/>
    
</form>
