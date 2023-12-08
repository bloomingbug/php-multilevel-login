<?php

function isMahasiswa(): bool
{
  if ($_SESSION['level'] === 'mahasiswa') {
    return true;
  }

  return false;
}
