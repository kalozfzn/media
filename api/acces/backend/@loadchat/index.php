<?php 
require('../../../config/config.php');
require('../../../config/core.php');
require('../../../core/router.php');
require('../../../core/class.php');

session_start();
$perintah = new CORE();

	$limit = $_GET['limit'];
	$offset = $_GET['offset'];
	$off = $_GET['off'];
  $sessionid = $_SESSION['id'];

	if (isset($limit) && isset($offset)) {
		
	 $sql = $perintah->getDB()->query("SELECT idfrom, message, date FROM chat ORDER BY date DESC LIMIT {$limit} OFFSET {$offset}");

 while ($cek = $sql->fetch_object()) {
  $username = $perintah->getUsername($cek->idfrom);
 		
?>
<div class="col-md-12">
            <ul class="timeline timeline-variant">
              <li class="timeline-month"><span>September, 2017</span></li>
              <?php 
              		if ($cek->idfrom == $sessionid) {

               ?>
              <li class="timeline-item timeline-item-detailed left">
                <div class="timeline-content timeline-type comment">
                  <div class="timeline-icon"><i class="icon s7-comment"></i></div>
                  <div class="timeline-avatar"><img src="asset/img/avatars/img2.jpg" alt="Avatar" class="circle"></div>
                  <div class="timeline-header"><span class="timeline-autor"><?php echo $username; ?></span>
                   <span class="timeline-time">September 13, 2016 - 9:54 AM</span>
                  </div>
                  <div class="timeline-summary">
                    <p><?php echo $cek->message; ?></p>
                  </div>
                </div>
              </li>
              <?php } else { ?>
              <li class="timeline-item timeline-item-detailed right">
                <div class="timeline-content timeline-type comment">
                  <div class="timeline-icon"><i class="icon s7-comment"></i></div>
                  <div class="timeline-avatar"><img src="asset/img/avatars/img4.jpg" alt="Avatar" class="circle"></div>
                  <div class="timeline-header"><span class="timeline-autor"><?php echo $username; ?></span>
                    <span class="timeline-time">August 19, 2016 - 7:15 PM</span>
                  </div>
                  <div class="timeline-summary">
                    <p><?php echo $cek->message; ?></p>
                  </div>
                </div>
              </li>
              <?php } ?>
            </ul>
          </div>
          <?php } 
          } 
		if (isset($off)) {
			$sql = $perintah->getDB()->query("SELECT idfrom,idto, message, date FROM chat ORDER BY date DESC LIMIT 2");	
          
          while ($cek = $sql->fetch_object()) {
            $username = $perintah->getUsername($cek->idfrom);
 		
?>
<div class="col-md-12">
            <ul class="timeline timeline-variant">
              <li class="timeline-month"><span>September, 2017</span></li>
              <?php 
              		if ($cek->idfrom == $sessionid) {
               ?>
              <li class="timeline-item timeline-item-detailed left">
                <div class="timeline-content timeline-type comment">
                  <div class="timeline-icon"><i class="icon s7-comment"></i></div>
                  <div class="timeline-avatar"><img src="asset/img/avatars/img2.jpg" alt="Avatar" class="circle"></div>
                  <div class="timeline-header"><span class="timeline-autor"><?php echo $username; ?></span>
                   <span class="timeline-time">September 13, 2016 - 9:54 AM</span>
                  </div>
                  <div class="timeline-summary">
                    <p><?php echo $cek->message; ?></p>
                  </div>
                </div>
              </li>
              <?php } else { ?>
              <li class="timeline-item timeline-item-detailed right">
                <div class="timeline-content timeline-type comment">
                  <div class="timeline-icon"><i class="icon s7-comment"></i></div>
                  <div class="timeline-avatar"><img src="asset/img/avatars/img4.jpg" alt="Avatar" class="circle"></div>
                  <div class="timeline-header"><span class="timeline-autor"><?php echo $username; ?></span>
                    <span class="timeline-time">August 19, 2016 - 7:15 PM</span>
                  </div>
                  <div class="timeline-summary">
                    <p><?php echo $cek->message; ?></p>
                  </div>
                </div>
              </li>
              <?php } ?>
            </ul>
          </div>
          <?php }
          } ?>
