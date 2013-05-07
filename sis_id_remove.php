
<?php
//print_r($_POST);

$name = $_POST['user_list'];
$result =  explode(" ", $name);
$count = count($result);
//print_r($result);
//$newResult = array_chunk($result, 500);
	//print_r($result);
$sis_or_canvas = $_POST['type'];
$i = 0;
$o = 0;
if($sis_or_canvas === "1" ){
			foreach($result as $user_id){
			$domain = $_POST['domain'];
			$token = "1~OVzaepeSrdCKW9IJipmK2hMTeClJAQaGkD0RjQc59BDUQT3TRaUZgtPopqTdcKn4";
			//---- GET CANVAS ID from course  -----//
			$url ="https://".$domain.".instructure.com/api/v1/users/sis_user_id:".$user_id."/logins?access_token=".$token;
			$ch = curl_init($url);
			//echo $url;
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$output = curl_exec($ch);
				//info = curl_getinfo($ch);
				curl_close($ch);
				$json = json_decode($output, true);
				//print_r($json);
				//$id = $json['id'];
				//$participant = $json['participant'];
				//echo "<br>";
				$login_id = $json[0]['id'];
				//echo "<br>Login Id: ".$login_id;
				$account_number = $json[0]['account_id'];
				//echo $account_number;
				//echo $canvas_course_id;
			//----- REMOVE THE SIS ID ----//
			$url ="https://".$domain.".instructure.com/api/v1/accounts/".$account_number."/logins/".$login_id."?access_token=".$token."&login[sis_user_id]=";
			//echo $url."<br>";
			$ch = curl_init($url);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
				$output = curl_exec($ch);
				//info = curl_getinfo($ch);
				curl_close($ch);
				$json = json_decode($output, true);
				//print_r($json);
				// ---- validate delete ---- //
				$url ="https://".$domain.".instructure.com/api/v1/users/sis_user_id:".$user_id."/logins?access_token=".$token;
				$ch = curl_init($url);
				//echo $url;
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$output = curl_exec($ch);
				$json = json_decode($output, true);
				curl_close($ch);
				//print_r($json);
				//echo $json['status'];
				if ($json['status'] == 'not_found'){
				//info = curl_getinfo($ch);
							echo "<p class='text-success'>User with login id:".$login_id." was successfully deleted.</p>";
				}else{
										echo "<p class='text-error'>There was an error: ".$json['error_report_id']." : ".$json['message']."</p>";
				}
			}

	}else{
		foreach($result as $user_id){
			$domain = $_POST['domain'];
			//$event = $_POST['event'];
			//$domain = "http://requestb.in/17f49zb1";
			//$account_number = $_POST['account_number'];
			//$conversation_id = $_POST['conversation_id'];
			$token = "1~OVzaepeSrdCKW9IJipmK2hMTeClJAQaGkD0RjQc59BDUQT3TRaUZgtPopqTdcKn4";
			//$sis_user_id = $_POST['user_id'];
			//---- GET CANVAS ID from course  -----//
			$url ="https://".$domain.".instructure.com/api/v1/users/".$user_id."/logins?access_token=".$token;
			$ch = curl_init($url);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$output = curl_exec($ch);
				//info = curl_getinfo($ch);
				curl_close($ch);
				$json = json_decode($output, true);
				print_r($json);
				//$id = $json['id'];
				//$participant = $json['participant'];
				//echo "<br>";
				$login_id = $json['id'];
				$account_number = $json['account_id'];
				//echo $canvas_course_id;
			//----- REMOVE THE SIS ID ----//
			$url ="https://".$domain.".instructure.com/api/v1/accounts/".$account_number."/logins/".$login_id."?access_token=".$token."&login[sis_user_id]=";
			//echo $url."<br>";
			$ch = curl_init($url);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
				$output = curl_exec($ch);
				//info = curl_getinfo($ch);
				curl_close($ch);
				echo "User with login id:".$login_id." was successfully deleted.";
			}
	

	}
?>
