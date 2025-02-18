<?php
/*
*@method Sanitization method, stripping the string from HTML and PHP special characters, as well as empty spaces at the start and at the end.
*@param string $data
*@return string
*/
function sanitize(string $data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}