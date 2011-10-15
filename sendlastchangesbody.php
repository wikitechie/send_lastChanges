<?php
 $wgHooks['RecentChange_save'][] = 'sendto';
 function sendto($recentChange){
		$serialized_data=serialize($recentChange);
		require_once 'shuber-curl-7965e91/curl.php';
		$curl = new Curl;
		 $response = $curl->post("http://localhost/test.php", array('recentChange' => $serialized_data));
		return true ;
		/*$con=curl_init();
		curl_setopt($con,CURLOPT_URL,"http://localhost/test.php");
		curl_setopt($con,CURLOPT_POSTFIELDS,array('recentChange' => $serialized_data));
		$result=curl_exec($con);
		if($result){
			return true ;
		}	
		else 
		 return false ;
		curl_close($con);*/
}
?>
