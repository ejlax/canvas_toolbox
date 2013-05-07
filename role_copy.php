<?php
$token = "1~OVzaepeSrdCKW9IJipmK2hMTeClJAQaGkD0RjQc59BDUQT3TRaUZgtPopqTdcKn4";
$old_domain = "northwestms_old";
$old_account = 1;
/*url ="https://".$old_domain.".instructure.com/api/v1/accounts/".$old_account."/sub_accounts/?access_token=".$token;
$ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$json = json_decode(curl_exec($ch));
	print_r($json);
	$account_count = count($json);
	echo $account_count;
	for ( $i = 0; $i < $account_count; $i++){
		foreach($json[$i] as $account){
		$sub_account_count = count($account);
		$account_id= $json[$i][id];
		$url ="https://".$old_domain.".instructure.com/api/v1/accounts/".$old_account."/sub_accounts/?access_token=".$token;

		//echo $account_id;
		$ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$json = json_decode(curl_exec($ch));
	print_r($json);
	$account_count = count($json);
	echo $account_count;

	}
}*/	

//$data['course_ids'][] = "sis_course_id:".$course_id;
//$json = json_encode($data);
//print_r($json);
//$query = http_build_query($data);

//print_r($query);
//echo "<br>";
//$query_url  = preg_replace('/%5B[0-9]+%5D/simU', '%5B%5D', $query);
//print_r($query_url);
//$domain = $_POST['domain'];
//$domain = "medcornell.test";
//$event = $_POST['event'];
//$domain = "http://requestb.in/17f49zb1";
//$account_number = $_POST['account_number'];
//$account_number = 1;
//$conversation_id = $_POST['conversation_id'];
//$token = "1~OVzaepeSrdCKW9IJipmK2hMTeClJAQaGkD0RjQc59BDUQT3TRaUZgtPopqTdcKn4";
//$sis_user_id = $_POST['user_id'];
$url ="https://".$old_domain.".instructure.com/api/v1/accounts/".$old_account."/roles/?access_token=".$token;
//echo $url."<br>";
$ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    //curl_setopt($ch, CURLOPT_POSTFIELDS,$query_url);
    //curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
    //echo curl_getinfo($ch);
	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	//print_r($info);
	curl_close($ch);
	$json = json_decode($output, true);
	print_r($json);
	$role_count = count($json);
	echo $role_count;
	for ( $i = 0; $i < $role_count; $i++){
		foreach($json[$i] as $role){
		//print_r($role);
		$role_json = $json[$i];


		print_r($role_json);
		//$permissions[] = $json[$i]['permissions']['enabled'];
		//print_r($permission);
		//$data['course_ids'][] = "sis_course_id:".$course_id;
		//$json = json_encode($data);
		//print_r($json);
		//$query = http_build_query($data);

		//print_r($query);
		echo "<br>";
		//$query_url  = preg_replace('/%5B[0-9]+%5D/simU', '%5B%5D', $query);
		//print_r($query_url);
		$new_domain = "mvcc13";
		$account_number = 13;
			//$conversation_id = $_POST['conversation_id'];
			$token = "1~OVzaepeSrdCKW9IJipmK2hMTeClJAQaGkD0RjQc59BDUQT3TRaUZgtPopqTdcKn4";
			//$sis_user_id = $_POST['user_id'];
			$url ="https://".$new_domain.".instructure.com/api/v1/accounts/".$account_number."/roles/?access_token=".$token;
			//echo $url."<br>";
			$ch = curl_init($url);
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			    //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
			    curl_setopt($ch, CURLOPT_POSTFIELDS,$role_json);
			    //echo curl_getinfo($ch);
				$output = curl_exec($ch);
				$info = curl_getinfo($ch);
				//echo $info;
				curl_close($ch);
	}
}
	//$id = $json['id'];
	//$participant = $json['participant'];
	//echo "<br>";
	
?>