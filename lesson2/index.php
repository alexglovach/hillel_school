<?php
//  docker run  -v /Users/alexander_glovach/Hillel_school:/var/www/html/ -d -p 80:8080 trafex/alpine-nginx-php7

if(isset($_GET['name'])){
    echo 'Hi '.$_GET['name'];
}else{
    echo 'Hello world';
}

