
<?php
print_r($_POST);
$domain = $_POST['domain'];
$conversation_id = $_POST['conversation_id'];
$token = "1~OVzaepeSrdCKW9IJipmK2hMTeClJAQaGkD0RjQc59BDUQT3TRaUZgtPopqTdcKn4";
$sis_user_id = $_POST['user_id'];
$url ="https://".$domain.".instructure.com/api/v1/conversations/".$conversation_id."?access_token=".$token."&as_user_id=".$sis_user_id;
echo $url."<br>";
$ch = curl_init($url);
	/*curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS,
	array('attachment'=>"@$inputFile",
		  'access_token' => "$token")
	);*/
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	//curl_setopt($ch, CURLINFO_HEADER_OUT);
		$output = curl_exec($ch);
		//info = curl_getinfo($ch);
		curl_close($ch);
		$json = json_decode($output, true);
		print_r($json);
		//$id = $json['id'];
		//$participant = $json['participant'];
		echo "<br>";
// echo the name only:
//echo $json['participants'][1]['id'];

// echo all data
foreach($json['participants'] as $participant) {
   $sis_id = $participant['id'];
   $url ="https://".$domain.".instructure.com/api/v1/conversations/".$conversation_id."?access_token=".$token."&as_user_id=".$sis_id;
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
   $output = curl_exec($ch);
   curl_close($ch);
   $json = json_decode($output, true);
   print_r($json);

}

		//print_r($info);
		//echo "<br>";
		//echo "Id =".$id."<br>";
		//echo "Progress=".$progress.'<br>';
		
?>
