<?php 
  /**
  * 
  */

  class ROUTER extends CONNECTION
  {
  	

  	public function AntiInjection($variable){
  		return $this->getDB()->real_escape_string($variable);
  	}


    public static function getAlert($type,$title,$content,$redirect){


        if($TypeAlert == 'error'){

            echo '<script> swal({ title: "'.$title.'", text: "'.$content.'", confirmButtonColor: "#009688", type: "error" }); </script>';

        }

        else if($TypeAlert == 'success'){

            echo '<script>    
                        swal({ title: "'.$title.'", text: "'.$content.'", confirmButtonColor: "#009688", type: "success" }); </script>';

        }

        else if($TypeAlert == 'info'){

            echo '<script> swal({ title: "'.$title.'", text: "'.$content.'", confirmButtonColor: "#009688", type: "info" }); </script>';

        }


    }


  	public static function getRedirect ($url){

        echo '<script> window.location.replace("'.MED_URL.'/'.$url.'")</script>';
    }


    public static function getFrontend($type, $folder, $filename){

        $url = 'public/frontend/'.$type.'/'.$folder.'/'.$filename.'.php';

        $perintah = new CORE();

        include ($url);

    }


    public static function getBackend($type, $folder, $filename){

        $url = 'public/backend/'.$type.'/'.$folder.'/'.$filename.'.php';

        $perintah = new CORE();

        include ($url);

    }


    public function getUserId($id)
    {
        $getUserId = $this->getDB()->query("SELECT userid FROM user WHERE userid = '$id' LIMIT 1");
        $getUserId = $getUserId->fetch_assoc();

        return $getUserId['id'];
    }

    public function getUserStatus($id)
    {
        $getUserStatus = $this->getDB()->query("SELECT userid, status FROM user WHERE userid = '$id' LIMIT 1");
        $getUserStatus = $getUserId->fetch_assoc();

        return $getUserStatus['status'];
    }


    public function getUsername($id)
    {
        $getUsername = $this->getDB()->query("SELECT userid, username FROM user WHERE userid = '$id' LIMIT 1");
        $getUsername = $getUsername->fetch_assoc();

        return $getUsername['username'];
    }



    public function getUserFoto($id)
    {
        $getUserFoto = $this->getDB()->query("SELECT userid, foto FROM user WHERE userid = '$id' LIMIT 1");
        $getUserFoto = $getUserFoto->fetch_assoc();

        return $getUserFoto['foto'];
    }

    public function getUserType($id)
    {
        $getUserType = $this->getDB()->query("SELECT userid, usertype FROM user WHERE userid = '$id' LIMIT 1");
        $getUserType = $getUserType->fetch_assoc();

        return $getUserType['usertype'];
    }


    public function getPage($url){
    	$url = strtolower($this->getDB()->real_escape_string($url));

    	if (empty($url)) {
    		
    		include ('public/frontend/_index/@login/index.php');

    	}

    		else {

    			switch ($url) {


    				case 'beranda':
    					$this::getBackend('user/_index','@beranda','index');
    					break;
                    case 'register':
                        $this::getFrontend('_index','@register','index');
                        break;
                    case 'pict':
                        $this::getFrontend('_index','@pict','index');
                        break;
                    case 'changeprofile':
                        $this::getBackend('user/_index','@cprofile','index');
                        break;
                    case 'logout':
                        $this::getBackend('user/_index','@logout','index');
                        break;
                    case 'profile':
                        $this::getBackend('user/_index','@profile','index');
                        break;
                    case 'changepass':
                        $this::getBackend('user/_index','@pass','cpas');
                        break;
                    case 'friends':
                        $this::getBackend('user/_index','@friends','index');
                        break;
                    case 'cobaan':
                        $this::getBackend('user/_index','@cobaan','index');
                        break;
                    case 'admin':
                        $this::getBackend('admin/_index','@dashboard','index');
                        break;
                    case 'chat':
                        $this::getBackend('user/_index','@chat','index');
                        break;

    			}

    		}
    }


}
