<?php
require_once __DIR__ . '/config/db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $sql = "SELECT id, name, username, password, level FROM users WHERE username = ? AND password = ?;";
  $statement = $conn->prepare($sql);
  $statement->bind_param('ss', $_POST['username'], $_POST['password']);
  $statement->execute();
  $user = $statement->get_result()->fetch_assoc();

  $statement->close();
  $conn->close();

  if ($user) {
    $_SESSION['login']    = true;
    $_SESSION['name'] = $user['name'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['level'] = $user['level'];

    header('Location: /index.php?page=home');
    exit();
  } else {
    $error = "Username atau Password anda salah";
  }
}

?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="javascript:;">Login Page</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="../dashboard.html" class="nav-link">
            <i class="material-icons">dashboard</i>
            Dashboard
          </a>
        </li>
        <li class="nav-item ">
          <a href="../pages/register.html" class="nav-link">
            <i class="material-icons">person_add</i>
            Register
          </a>
        </li>
        <li class="nav-item  active ">
          <a href="../pages/login.html" class="nav-link">
            <i class="material-icons">fingerprint</i>
            Login
          </a>
        </li>
        <li class="nav-item ">
          <a href="../pages/lock.html" class="nav-link">
            <i class="material-icons">lock_open</i>
            Lock
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<div class="wrapper wrapper-full-page">
  <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('assets/images/login.jpg'); background-size: cover; background-position: top center;">
    <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
          <form class="form" method="POST" action="<?= $_SERVER['REQUEST_URI'] ?>">
            <div class="card card-login card-hidden">
              <div class="card-header card-header-rose text-center">
                <h4 class="card-title">Login</h4>
              </div>
              <div class="card-body ">

                <?php
                if ($error != '') { ?>
                  <p class="card-description text-center text-danger mb-0"><?= $error ?></p>
                <?php } ?>

                <span class="bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">person</i>
                      </span>
                    </div>
                    <input type="text" class="form-control" name="username" placeholder="Username..." required>
                  </div>
                </span>
                <span class="bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="Password..." required>
                  </div>
                </span>
              </div>
              <div class="card-footer justify-content-center">
                <button type="submit" class="btn btn-rose btn-link btn-lg">LET'S GO</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container">
        <nav class="float-left">
          <ul>
            <li>
              <a href="https://www.creative-tim.com">
                Creative Tim
              </a>
            </li>
            <li>
              <a href="https://creative-tim.com/presentation">
                About Us
              </a>
            </li>
            <li>
              <a href="http://blog.creative-tim.com">
                Blog
              </a>
            </li>
            <li>
              <a href="https://www.creative-tim.com/license">
                Licenses
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>, made with <i class="material-icons">favorite</i> by
          <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
        </div>
      </div>
    </footer>
  </div>
</div>