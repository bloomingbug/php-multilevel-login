<?php

function isActive(array $pages, string $text = 'active'): void
{

  if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
  } else {
    $currentPage = 'home';
  }

  foreach ($pages as $page) {
    if ($currentPage == $page) {
      echo $text;
      return;
    }
  }

  echo '';
}
