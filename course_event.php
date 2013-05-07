
<?php
//print_r($_POST);

$name= $_POST['course_list'];
$result =  explode(" ", $name);
$count = count($result);
//print_r($result);
$i = 0;
if($count > 500){

	$newResult = array_chunk($result, 500);
	//print_r($result);
	
			foreach($newResult as $newResult_inner){
				$i++;
				$newResultCount = count($newResult_inner);
				//print_r($newResult_inner);
				foreach($newResult_inner as $course_id) {
			$data['course_ids'][] = "sis_course_id:".$course_id;

			}
			//print_r($data);
			
			//echo "<br> This is array number ".$i." and has a count of ".$newResultCount;
			//$json = json_encode($data);
			//print_r($json);
			$query = http_build_query($data);

			//print_r($query);
			//echo "<br>";
			$query_url  = preg_replace('/%5B[0-9]+%5D/simU', '%5B%5D', $query);
			//print_r($query_url);
			$domain = $_POST['domain'];
			$event = $_POST['event'];
			//$domain = "http://requestb.in/17f49zb1";
			$account_number = $_POST['account_number'];
			//$conversation_id = $_POST['conversation_id'];
			$token = "1~OVzaepeSrdCKW9IJipmK2hMTeClJAQaGkD0RjQc59BDUQT3TRaUZgtPopqTdcKn4";
			//$sis_user_id = $_POST['user_id'];
			$url ="https://".$domain.".instructure.com/api/v1/accounts/".$account_number."/courses/?access_token=".$token."&event=".$event;
			//echo $url."<br>";
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS,
			array('attachment'=>"@$inputFile",
				  'access_token' => "$token")
			);
			//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			//curl_setopt($ch, CURLINFO_HEADER_OUT);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		        curl_setopt($ch, CURLOPT_POSTFIELDS,$query_url);
		        //curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
		        //echo curl_getinfo($ch);
				$output = curl_exec($ch);
				//info = curl_getinfo($ch);
				curl_close($ch);
				$json = json_decode($output, true);
				//print_r($json);
				//$id = $json['id'];
				//$participant = $json['participant'];
				//echo "<br>";
				$event_id = $json['id'];
				$event_url = $json['url'];
				echo "<h4>The event id is: ".$event_id.".<br>";
				echo "<h4>Please click on this <a href=".$event_url.">link</a> to follow the event.";

		

				unset($data);
			}
		echo "You can only do 500 courses at a time. This will be broken up into 500 course segments";
	}else{
		foreach($result as $course_id) {
			$data['course_ids'][] = "sis_course_id:".$course_id;
			$json = json_encode($data);
			//print_r($json);
			$query = http_build_query($data);

			//print_r($query);
			//echo "<br>";
			$query_url  = preg_replace('/%5B[0-9]+%5D/simU', '%5B%5D', $query);
			//print_r($query_url);
			$domain = $_POST['domain'];
			$event = $_POST['event'];
			//$domain = "http://requestb.in/17f49zb1";
			$account_number = $_POST['account_number'];
			//$conversation_id = $_POST['conversation_id'];
			$token = "1~OVzaepeSrdCKW9IJipmK2hMTeClJAQaGkD0RjQc59BDUQT3TRaUZgtPopqTdcKn4";
			//$sis_user_id = $_POST['user_id'];
			$url ="https://".$domain.".instructure.com/api/v1/accounts/".$account_number."/courses/?access_token=".$token."&event=".$event;
			//echo $url."<br>";
			$ch = curl_init($url);
			/*curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS,
			array('attachment'=>"@$inputFile",
				  'access_token' => "$token")
			);*/
			//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			//curl_setopt($ch, CURLINFO_HEADER_OUT);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		        curl_setopt($ch, CURLOPT_POSTFIELDS,$query_url);
		        //curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
		        //echo curl_getinfo($ch);
				$output = curl_exec($ch);
				//info = curl_getinfo($ch);
				curl_close($ch);
				$json = json_decode($output, true);
				//print_r($json);
				//$id = $json['id'];
				//$participant = $json['participant'];
				//echo "<br>";
				$event_id = $json['id'];
				$event_url = $json['url'];
				echo "<h4>The event id is: ".$event_id.".<br>";
				echo "<h4>Please click on this <a href=".$event_url.">link</a> to follow the event.";

			}
	}




/*[completion] => 0
[context_id] => 1
[context_type] => Account
[created_at] => 2013-04-23T07:35:48-06:00
[id] => 9
[message] => [tag] => course_batch_update
[updated_at] => 2013-04-23T07:35:48-06:00
[user_id] => 10000003793279
[workflow_state] => queued
[url] => https://eccc.beta.instructure.com/api/v1/progress/9 )*/
	
?>
