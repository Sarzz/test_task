
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home</a>
        </li>
        <?php if(USER){ ?>
            <li class="nav-item">
              <a class="btn btn-success" href="/logout">LogOut</a>
            </li>
        <?php }else{ ?>
            <li class="nav-item">
              <a class="btn btn-success" href="/login">LogIn</a>
            </li>
        <?php } ?>

      </ul>
    </div>
  </div>
</nav>
