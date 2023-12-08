<?php

function isLogin(): bool
{
  if (isset($_SESSION['login'])) {
    return true;
  }

  return false;
}
