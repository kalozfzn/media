<?php 
  $username = $perintah->getUsername($_SESSION['id']);
 ?>
<header>

<nav class="nav has-shadow">
  <div class="container">
    <div class="nav-left">
      <div class="is-hidden-mobile">
      <a class="nav-item">
        <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo">
      </a>
      </div>
      <div class="nav-left">
      <!--<a class="nav-item is-tab is-hidden-mobile is-active">Beranda</a>-->
      <div class="is-hidden-tab is-hidden-desktop is-mobile">
        <a class="nav-item" style="width: 70%; margin-top: 8%">
          <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo">
        </a>
        </div>
      <div class="nav-right" style="margin-top: 1%;margin-right: 4%;"><!--
      <a class="nav-item is-tab is-hidden-tablet is-active">Home</a>
      <a class="nav-item is-tab is-hidden-tablet">Features</a>
      <a class="nav-item is-tab is-hidden-tablet">Pricing</a>
      <a class="nav-item is-tab is-hidden-tablet">About</a>-->
      <a class="nav-item is-hidden-desktop is-hidden-tab">
        <figure class="image is-16x16">
          <img src="http://bpr-nauli.com/gambar/user.jpg">
        </figure>
        Profile
      </a>
      <a href="Javascript:void(0)" id="logout" class="nav-item is-hidden-desktop is-hidden-tab">
        <figure class="image is-16x16">
          <img src="http://bpr-nauli.com/gambar/about.png">
        </figure>
      Logout
      </a>
    </div>
  </div>        
      </div>

      <form method="post" id="pencarian">
        <div class="is-hidden-mobile is-hidden-tab">
        <div class="field has-addons" style="margin-top: 2%;margin-left: -85%;">
          <div class="control" style="width: 50%;">
            <input class="input" name="pencarian" type="text" placeholder="Cari Teman...">
          </div>
          <div class="control">
            <button type="submit" class="button is-primary">
              Cari &nbsp;<i class="fa fa-search" style="font-size: 90%;"></i>
            </button> 
          </div>
        </div>
      </div>
      </form>
      <!--
      <span style="float:left;margin:1%;"><a class="nav-item is-desktop is-tablet is-hidden-tablet is-hidden-desktop">Beranda</a></span>
      <span style="float:left;margin:1%;"><a class="nav-item is-desktop is-tablet is-hidden-tablet is-hidden-desktop">Profile</a></span>
      <span style="float:left;margin:1%;"><a class="nav-item is-desktop is-tablet is-hidden-tablet is-hidden-desktop">Logout</a></span>
      -->
      </div>
    </div>
    <div class="nav-right nav-menu"><!--
      <a class="nav-item is-tab is-hidden-tablet is-active">Home</a>
      <a class="nav-item is-tab is-hidden-tablet">Features</a>
      <a class="nav-item is-tab is-hidden-tablet">Pricing</a>
      <a class="nav-item is-tab is-hidden-tablet">About</a>-->
      <a href="<?php echo MED_URL; ?>/profile/<?php echo $username; ?>" class="nav-item is-tab">
        <figure class="image is-16x16" style="margin-right: 8px;">
          <img src="http://bpr-nauli.com/gambar/user.jpg">
        </figure>
        Profile
      </a>
      <a href="Javascript:void(0)" id="logout" class="nav-item is-tab">
        <figure class="image is-16x16" style="margin-right: 8px;">
          <img src="http://bpr-nauli.com/gambar/about.png">
        </figure>
      Logout
      </a>
    </div>
  </div>
</nav>
</header>
