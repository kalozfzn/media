<?php 
  $username = $perintah->getUsername($_SESSION['id']);
 ?>
<header>


<nav class="navbar ">
  <div class="navbar-brand">
    <a class="navbar-item" href="http://bulma.io">
      <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
    </a>

    <!--
      ini buat kalo di hidden
    -->

    <div class="navbar-burger burger" data-target="navMenubd-example">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navMenubd-example" class="navbar-menu">
    <div class="navbar-start">
      
      <div class="navbar-item has-dropdown is-hoverable">
        <div class="navbar-link">
          Permintaan Teman
        </div>
        <div id="moreDropdown" class="navbar-dropdown ">
            <div class="level is-mobile">
              <div class="level-left">
              <?php 
                  $requestsql = $perintah->getDB()->query("SELECT userid, idfriend FROM friend WHERE idfriend = '$sessionid' AND status = '0'");
  
                      while ($request = $requestsql->fetch_object()) {

                        $requestusername = $perintah->getUsername($request->userid);
              ?>
                <div class="level-item">
                  <p>
                    <strong><?php echo $requestusername; ?></strong>
                    <br>
                    <a href="javascript:void(0)" id="allow" data-script="<?php echo $request->userid; ?>" class="button is-info is-small">Terima <i class="fa fa-check" style="font-size: 95%;"></i></a>
                    <button class="button is-small is-danger">Tolak &nbsp;<i class="fa fa-close" style="font-size: 120%;"></i> </button>
                  </p>
                </div>
              </div>
              <div class="level-right">
                <div class="level-item">
                  <span class="icon has-text-info">
                    <i class="fa fa-plug"></i>
                  </span>
                </div>
              </div>
              <?php 
                }
                ?>
            </div>          
        </div>
        
      </div>
    </div>

    <div class="navbar-end">

      <div class="navbar-item">
        
        <div class="field is-grouped">
        <form method="post" id="pencarian">        
          <div class="field has-addons" style="margin-right: 2%;">
          <div class="control">
            <input name="pencarian" class="input" type="text" placeholder="Cari Teman...">
          </div>
          <div class="control">
            <button class="button is-primary">
              Cari &nbsp;<i class="fa fa-search" style="font-size: 90%;"></i>
            </button>
          </div>
        </div>
        </form>

          <p class="control">
            <a href="<?php echo MED_URL; ?>/profile/<?php echo $username; ?>" class="button is-primary" href="https://github.com/jgthms/bulma/archive/0.5.1.zip">
              <span class="icon">
                <i class="fa fa-user"></i>
              </span>
              <span>Profile</span>
            </a>
          </p>
          <p class="control">
            <a href="javascript:void(0)" id="logout" class="button is-primary" href="https://github.com/jgthms/bulma/archive/0.5.1.zip">
              <span class="icon">
                <i class="fa fa-sign-out"></i>
              </span>
              <span>Logout</span>
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</nav>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function () {

  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any nav burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});
</script>
