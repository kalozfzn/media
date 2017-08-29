<?php 
/**
* 
*/

class CORE extends ROUTER
{
	
	public function upload($foto){
		$handle = new upload($foto);
          $add = date('_Y_m_d_h_i_s');
          $handle->file_name_body_add = "$add";
          $handle->process('../../../../core/static/upload/1920_1080');

          $handle->file_name_body_add = "$add";
          $handle->image_resize         = true; 
          $handle->image_x = 35;
          $handle->image_y = 35;
          $handle->process('../../../../core/static/upload/35');

          $handle->file_name_body_add = "$add";
          $handle->image_resize         = true; 
          $handle->image_x = 50;
          $handle->image_y = 50;
          $handle->process('../../../../core/static/upload/50');

          $handle->file_name_body_add = "$add";
          $handle->image_resize         = true; 
          $handle->image_x = 150;
          $handle->image_y = 150;
          $handle->process('../../../../core/static/upload/150');
          
        
          $handle->file_name_body_add = "$add";
          $handle->image_resize         = true; 
          $handle->image_x = 300;
          $handle->image_y = 300;
          $handle->process('../../../../core/static/upload/300');
          $fot = $handle->file_dst_name;
          return $fot;
	}

     public function getTimeAgo ($time_ago){

        $cur_time   = time();
        $time_elapsed   = $cur_time - $time_ago;
        $seconds    = $time_elapsed ;
        $minutes    = round($time_elapsed / 60 );
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400 );
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640 );
        $years      = round($time_elapsed / 31207680 );
        // Seconds
        if($seconds == 0){
            return "Just Now";
        }

        else if ($seconds <= 60){
            return "$seconds seconds ago";
        }
        //Minutes
        else if($minutes <=60){
            if($minutes==1){
                return "1 minute ago";
            }
            else{
                return "$minutes minutes ago";
            }
        }
        //Hours
        else if($hours <=24){
            if($hours==1){
                return "an hour ago";
            }else{
                return "$hours hours ago";
            }
        }
        //Days
        else if($days <= 7){
            if($days==1){
                return "yesterday";
            }else{
                return "$days days ago";
            }
        }
        //Weeks
        else if($weeks <= 4.3){
            if($weeks==1){
                return "a week ago";
            }else{
                return "$weeks weeks ago";
            }
        }
        //Months
        else if($months <=12){
            if($months==1){
                return "a month ago";
            }else{
                return "$months months ago";
            }
        }
        //Years
        else{
            if($years==1){
                return "one year ago";
            }else{
                return "$years years ago";
            }
        }

    }


     




}