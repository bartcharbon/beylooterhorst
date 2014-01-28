<body background='black'>
	<div style="width:800px;">
	    <div class="content-header-background">
	        <div class="content-header">
	            Documenten
	            	        </div>
	    </div>
	    <div class="content-background">
	    <div  class="content-no-margin">
<?php
set_include_path(get_include_path() . PATH_SEPARATOR . '/Zend');
set_include_path(get_include_path() . PATH_SEPARATOR . '/Zend/Gdata');
set_include_path(get_include_path() . PATH_SEPARATOR . '/Zend/Gdata/Docs');
require_once 'Zend/Loader/StandardAutoloader.php';
require_once 'Zend/Gdata/Docs.php';
require_once 'Zend/Gdata/ClientLogin.php';

$loader = new Zend\Loader\StandardAutoloader(array('autoregister_zf' => true));
$loader->register();


$service = Zend_Gdata_Docs::AUTH_SERVICE_NAME;
$client = Zend_Gdata_ClientLogin::getHttpClient("scoutsbeilen@gmail.com", "-----------", $service);
$docs = new Zend_Gdata_Docs($client);
$feed = $docs->getDocumentListFeed('https://docs.google.com/feeds/documents/private/full/-/website');
	
foreach ($feed as $document) {
    $link = $document->getLink();

    echo '<a href="'.$link[1]->getHref().'" target="_blank" style="color:white">'.$document->getTitle().'</a><br/>';
}
?>
	    </div></div>
	    <div class="content-footer-background" style="width:800px;"></div>
    </div>

