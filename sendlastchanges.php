<?php
if (!defined('MEDIAWIKI')) {
        echo <<<EOT
To install send_lastChanges , put the following line in LocalSettings.php:
require_once( "\$IP/extensions/sendlastchanges/sendlastchanges.php" );
EOT;
        exit( 1 );
}
 
$wgExtensionCredits['specialpage'][] = array(
        'name' => 'send last Changes',
        'author' => 'wikitechie team',
        'url' => 'http://www.mediawiki.org/wiki/Extension:MyExtension',
        'description' => 'sending recent change when it happen to others sites ',
        'version' => '0.0.0',
);
 
$dir = dirname(__FILE__) . '/';
# Location of the SpecialMyExtension class (Tell MediaWiki to load this file)
$wgAutoloadClasses['sendlastchanges'] = $dir . 'Specialsendlastchanges.php';
# Location of a messages file (Tell MediaWiki to load this file) 
$wgExtensionMessagesFiles['sendlastchanges'] = $dir . 'sendlastchanges.i18n.php';
# Tell MediaWiki about the new special page and its class name 
$wgSpecialPages['sendlastchanges'] = 'sendlastchanges';
//the extension body :
$wgHooks['RecentChange_save'][] = 'sendto';
function sendto($recentChange){
	$serialized_data=serialize($recentChange);
	$con=curl_init();
	curl_setopt( $con, CURLOPT_FOLLOWLOCATION, true );
	curl_setopt($con,CURLOPT_URL,"http://localhost/test.php");
	curl_setopt($con,CURLOPT_POST,true);
	curl_setopt($con,CURLOPT_POSTFIELDS,"data={$serialized_data}");
	$result=curl_exec($con);
	if($result){
		return true ;
	}
	else
	return false ;
	curl_close($con);
}
