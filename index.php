<?php

session_start();
require_once __DIR__ . '/middleware/isLogin.php';
require_once __DIR__ . '/middleware/isAdmin.php';
require_once __DIR__ . '/middleware/isMahasiswa.php';
require_once __DIR__ . '/utils/home.php';
require_once __DIR__ . '/utils/login.php';

include __DIR__ . '/components/header.php';

?>

<div class="badan">
  <?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
      case 'login':
        if (isLogin()) {
          home();
        }

        include "login.php";
        break;
      case 'home':
        if (!isLogin()) {
          login();
        }

        if (isLogin() && isAdmin()) {
          include "home-admin.php";
        } else if (isLogin() && isMahasiswa()) {
          include "home.php";
        }
        break;
      case 'profil':
        if (!isLogin()) {
          login();
        }

        include "profil.php";
        break;
      case 'vm':
        if (!isLogin()) {
          login();
        }
        include "vm.php";
        break;
      case 'logout':
        if (!isLogin()) {
          login();
        }
        include "logout.php";
        break;
      default:
        echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
        break;
    }
  } else {
    if (!isLogin()) {
      login();
    }

    home();
  }

  ?>
</div>

<?php
include __DIR__ . '/components/footer.php';
?>