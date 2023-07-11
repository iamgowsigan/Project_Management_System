<?PHP

function sendMessage($title,$message,$image,$topic) {
		
    $url = 'https://fcm.googleapis.com/fcm/send';
	$tooo = '/topics/'.$topic;
	$action = 'FLUTTER_NOTIFICATION_CLICK';
	
	
    $api_key = 'AAAApVklzl0:APA91bE_Kq8IbJLDQ48RngKJrZE0J8jcH9Iyr47JotZQWcoZFEXKzbGetEUt6I9qSeX-FkKYH2Qg-ClvKMJy1CxkBS9UQxyQ33YC3lVq_vHKTUWyUzHG7Lg_U2q6MHtZqgKqeW_SLBkC';
                
    $fields = array (
        'to' => $tooo,
        'notification' => array (
				"body"=>$message,
                "click_action" => $action,
				"title" => $title,
				"image" => $image
        ),
		'data' => array (
                "click_action" => $action,
				"title" => $title,
				"body"=>$message,
				"image" => $image,
				"main_picture" => $image
        ),
    );

    //header includes Content type and api key
    $headers = array(
        'Content-Type:application/json',
        'Authorization:key='.$api_key
    );
                
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
    return $result;

}


function sendMessageScreen($title,$message,$image,$topic,$id,$screen) {
		
    $url = 'https://fcm.googleapis.com/fcm/send';
	$tooo = '/topics/'.$topic;
	$action = 'FLUTTER_NOTIFICATION_CLICK';
	
	
    $api_key = 'AAAApVklzl0:APA91bE_Kq8IbJLDQ48RngKJrZE0J8jcH9Iyr47JotZQWcoZFEXKzbGetEUt6I9qSeX-FkKYH2Qg-ClvKMJy1CxkBS9UQxyQ33YC3lVq_vHKTUWyUzHG7Lg_U2q6MHtZqgKqeW_SLBkC';
                
    $fields = array (
        'to' => $tooo,
        'notification' => array (
				"body"=>$message,
                "click_action" => $action,
				"title" => $title,
				"screen" =>$screen,
				"id" => $id,
				"image" => $image
        ),
		'data' => array (
                "click_action" => $action,
				"title" => $title,
				"body"=>$message,
				"image" => $image,
				"screen" =>$screen,
				"id" => $id,
				"main_picture" => $image
        ),
    );

    //header includes Content type and api key
    $headers = array(
        'Content-Type:application/json',
        'Authorization:key='.$api_key
    );
                
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
    return $result;

}



?>