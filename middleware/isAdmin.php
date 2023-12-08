<?php

function isAdmin(): bool
{
  if ($_SESSION['level'] === 'admin') {
    return true;
  }

  return false;
}
