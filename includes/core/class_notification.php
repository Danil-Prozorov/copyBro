<?php

class Notification {

    // TEST

    public static function createNotify($userID,$title,$desc)
    {
        DB::query("INSERT INTO user_notifications (user_id, title,description,viewed,created) 
                      VALUES (".$userID.", '".$title."', '".$desc."', 0 ,0);") or die (DB::error());
    }

    public static function getNotify($data)
    {
        //validation
        if ($data['id']) return error_response(1999, "Notification list is empty");

        if ($data['show_all'] == 0 || $data['show_all'] == "") {
            // SELECT
            $q = DB::query("SELECT * FROM user_notifications WHERE user_id =".$data['user_id'].";") or die (DB::error());
            if($row = DB::fetch_all($q)){
                return $row;
            }
        } elseif ($data['show_all'] == 1) {
            // SELECT
            $q = DB::query("SELECT * FROM user_notifications WHERE (user_id =".$data['user_id'].") AND viewed=0;") or die (DB::error());
            if($row = DB::fetch_all($q)){
                return $row;
            }
        }
    }

    public static function readAllNotify($data)
    {
        if ($data['user_id'] == '') return error_response(1999, "user_id do not exist");
        DB::query("UPDATE user_notifications SET viewed=1 WHERE user_id=".$data['user_id'].";") or die (DB::error());

        return response('All notifications have been read'); // i return it for see result in POSTMAN
    }

}
