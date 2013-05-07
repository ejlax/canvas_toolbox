
<?php
//print_r($_POST);

$name = $_POST['course_list'];
$result =  explode(" ", $name);
$count = count($result);
//print_r($result);
//$newResult = array_chunk($result, 500);
	//print_r($result);
$sis_or_canvas = $_POST['type'];
$i = 0;
$o = 0;
if($sis_or_canvas === 1 ){	
			foreach($result as $course_id){

			//$sis_course_data = 'course[sis_course_id]='; 
			//print_r($data);
			
			//echo "<br> This is array number ".$i." and has a count of ".$newResultCount;
			//$json = json_encode($data);
			//print_r($json);
			//$query = http_build_query($data);

			//print_r($query);
			//echo "<br>";
			//$query_url  = preg_replace('/%5B[0-9]+%5D/simU', '%5B%5D', $query);
			$domain = $_POST['domain'];
			//$event = $_POST['event'];
			//$domain = "http://requestb.in/17f49zb1";
			//$account_number = $_POST['account_number'];
			//$conversation_id = $_POST['conversation_id'];
			$token = "1~OVzaepeSrdCKW9IJipmK2hMTeClJAQaGkD0RjQc59BDUQT3TRaUZgtPopqTdcKn4";
			//$sis_user_id = $_POST['user_id'];
			//---- GET CANVAS ID from course  -----//
			$url ="https://".$domain.".instructure.com/api/v1/courses/sis_course_id:".$course_id."?access_token=".$token;
			$ch = curl_init($url);
			//curl_setopt($ch, CURLOPT_POST, true);
			//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			//curl_setopt($ch, CURLINFO_HEADER_OUT);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		        //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		        //curl_setopt($ch, CURLOPT_POSTFIELDS,$query_url);
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
				$canvas_course_id = $json['id'];
				$course_name = $json['name'];
				//echo $canvas_course_id;
			//----- REMOVE THE SIS ID ----//
			$url ="https://".$domain.".instructure.com/api/v1/courses/sis_course_id:".$course_id."?access_token=".$token."&course[sis_course_id]=";
			//echo $url."<br>";
			$ch = curl_init($url);
			//curl_setopt($ch, CURLOPT_POST, true);
			//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			//curl_setopt($ch, CURLINFO_HEADER_OUT);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		        //curl_setopt($ch, CURLOPT_POSTFIELDS,$query_url);
		        //curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
		        //echo curl_getinfo($ch);
				$output = curl_exec($ch);
				//info = curl_getinfo($ch);
				curl_close($ch);
				//$json = json_decode($output, true);
				//print_r($json);
				//$id = $json['id'];
				//$participant = $json['participant'];
				//echo "<br>";
				//$event_id = $json['id'];
				//$event_url = $json['url'];
				//echo "<h4>The event id is: ".$event_id.".<br>";
				//echo "<h4>Please click on this <a href=".$event_url.">link</a> to follow the event.";
				//unset($data);

				// ----- DELETE THE COURSE FROM CANVAS ----- //
				$url ="https://".$domain.".instructure.com/api/v1/courses/".$canvas_course_id."?access_token=".$token."&event=delete";
				//echo $url."<br>";
				$ch = curl_init($url);
				//curl_setopt($ch, CURLOPT_POST, true);
				//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				//curl_setopt($ch, CURLINFO_HEADER_OUT);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		        //curl_setopt($ch, CURLOPT_POSTFIELDS,$query_url);
		        //curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
		        //echo curl_getinfo($ch);
				$output = curl_exec($ch);
				//info = curl_getinfo($ch);
				curl_close($ch);
				$json = json_decode($output, true);
				//print_r($json);
				$error_code = $json['error_report_id'];
				$error_message = $json['message'];
				if ($json['delete'] != 1 ){
					//print_r($json);
					echo "<p class='text-error'><h4>There was an error in the process. The error message is '".$error_message."'. Please contact <a href='//help.instructure.com'>support</a> regarding this error code: ".$error_code.".</h4></p>";
				}else{
					echo "<p class='text-success'><h4>Course ".$course_name." was successfully deleted.</h4></p>";
				}
			}

	}else{
		foreach($result as $course_id){

			//$sis_course_data = 'course[sis_course_id]='; 
			//print_r($data);
			
			//echo "<br> This is array number ".$i." and has a count of ".$newResultCount;
			//$json = json_encode($data);
			//print_r($json);
			//$query = http_build_query($data);

			//print_r($query);
			//echo "<br>";
			//$query_url  = preg_replace('/%5B[0-9]+%5D/simU', '%5B%5D', $query);
			$domain = $_POST['domain'];
			//$event = $_POST['event'];
			//$domain = "http://requestb.in/17f49zb1";
			//$account_number = $_POST['account_number'];
			//$conversation_id = $_POST['conversation_id'];
			$token = "1~OVzaepeSrdCKW9IJipmK2hMTeClJAQaGkD0RjQc59BDUQT3TRaUZgtPopqTdcKn4";

				// ----- DELETE THE COURSE FROM CANVAS ----- //
				$url ="https://".$domain.".instructure.com/api/v1/courses/".$course_id."?access_token=".$token."&event=delete";
				//echo $url."<br>";
				$ch = curl_init($url);
				//curl_setopt($ch, CURLOPT_POST, true);
				//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				//curl_setopt($ch, CURLINFO_HEADER_OUT);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		        //curl_setopt($ch, CURLOPT_POSTFIELDS,$query_url);
		        //curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
		        //echo curl_getinfo($ch);
				$output = curl_exec($ch);
				//info = curl_getinfo($ch);
				curl_close($ch);
				$json = json_decode($output, true);
				print_r($json);
				$error_code = $json['error_report_id'];
				$error_message = $json['message'];

				if ($json['delete'] != 1 ){
					//print_r($json);
					$o++;
					echo "<h4>There was an error in the process. The error message is '".$error_message."'. Please contact <a href='//help.instructure.com'>support</a> regarding this error code: ".$error_code.".";
				}else{
					echo "<h5>Course ".$course_name." was successfully deleted.</h5>";
					$i++;
				}
			}if ($o > 0){
				echo "<p class='text-error'><h4>There were ".$o." errors.</h4></p>";
			}
			if($i > 0 ){
				echo "<p class='text-success'><h4>".$i." courses were successfully deleted.</h4></p>";
			}
	

	}
?>
