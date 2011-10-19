<?php
class sendlastchanges extends SpecialPage {
        function __construct() {
                parent::__construct('sendlastchanges');
             //   wfLoadExtensionMessages('sendlastchanges');
        }
 
        function execute( $par ) {
                global $wgRequest, $wgOut,$wgUser;
 
                $this->setHeaders();
 
                # Get request data from, e.g.
         $param = $wgRequest->getText('param');
 		 $groups=$wgUser->getGroups();
 		 if (!in_array("sysop", $groups)) {
 		 	$output="sorry {$wgUser->getName()} you don't have a permission to access this page ";
 		 }
 		 else{
                # Do stuff
         $output="
                <form action='?' method='POST'> 
                <input type='text' name='site'/>
                <input type='submit' value='add site' />
                </form>
                ";
 		 }
                $wgOut->addHTML( $output );
        }
}

?>
