<?php
require_once __DIR__ . '/../utils/isActive.php';
?>

<div class="sidebar" data-color="rose" data-background-color="black" data-image="assets/images/sidebar-1.jpg">
  <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
  <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-mini">
      LP
    </a>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      LPM
    </a>
  </div>
  <div class="sidebar-wrapper">
    <div class="user">
      <div class="photo mt-2">
        <img src="assets/images/faces/avatar.jpg" />
      </div>
      <div class="user-info">
        <a data-toggle="collapse" href="#collapseExample" class="username">
          <span>
            <?= $_SESSION['username'] ?>
            <br>
            <?= ucfirst($_SESSION['level']) ?>
            <b class="caret"></b>
          </span>
        </a>
        <div class="collapse" id="collapseExample">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="sidebar-mini"> MP </span>
                <span class="sidebar-normal"> My Profile </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <ul class="nav">
      <li class="nav-item <?php isActive(['home']) ?> ">
        <a class="nav-link" href="/index.php?page=home">
          <i class="material-icons">dashboard</i>
          <p> Dashboard </p>
        </a>
      </li>
      <li class="nav-item <?php isActive(['profil', 'vm'])  ?>">
        <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
          <i class="material-icons">apps</i>
          <p> About
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse <?php isActive(['profil', 'vm'], 'show')  ?>" id="pagesExamples">
          <ul class="nav">
            <li class="nav-item <?php isActive(['profil'])  ?>">
              <a class="nav-link" href="/index.php?page=profil">
                <span class="sidebar-mini"> P </span>
                <span class="sidebar-normal"> Profil </span>
              </a>
            </li>
            <li class="nav-item <?php isActive(['vm'])  ?>">
              <a class="nav-link" href="/index.php?page=vm">
                <span class="sidebar-mini"> VM </span>
                <span class="sidebar-normal"> Visi Misi </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
  <div class="sidebar-background"></div>
</div>