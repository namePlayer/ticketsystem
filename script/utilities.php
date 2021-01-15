<?php

function isLoggedIn(): bool
{
    return isset($_SESSION['ticketSystemLogin']);
}

function getAccountId(): int
{
   if(isLoggedIn()) {
       return $_SESSION['ticketSystemLogin'];
   }
   return 0;
}