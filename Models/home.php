<?php


function isLoggedeOn()
{
    if (isset($_SESSION['user'])) {
      return true;
    } else {
       return false;
    }
}