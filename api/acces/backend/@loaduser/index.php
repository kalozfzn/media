<?php 
require('../../../config/config.php');
require('../../../config/core.php');
require('../../../core/router.php');
require('../../../core/class.php');

session_start();
$perintah = new CORE();

?>

                  <?php 
                    $usersql = $perintah->getDB()->query("SELECT userid, username, email, date, foto FROM user WHERE usertype <> 'admin' ORDER BY date DESC");

                        while ($user = $usersql->fetch_object()) {
                   ?>
                    <tr class="odd gradeA">
                      <td><?php echo $user->username; ?></td>
                      <td><?php echo $user->email; ?></td>
                      <td class="center"><?php echo $user->date; ?></td>
                      <td> <img src="<?php echo MED_IMAGE; ?>/50/<?php echo $user->foto; ?>"></td>
                      <td>
                      <a href="javascript:void(0)" id="delete" data-script="<?php echo $user->userid; ?>"  class="btn btn-danger">Hapus</a>    
                      </td>
                    </tr>
                    <?php 
                      }
                     ?>
                  