<?php


// We control which host will call this script in case the domains used are different

 $referrer = $_SERVER['HTTP_REFERER'];
 $parts = parse_url($referrer);
 $domain = $parts['host'];

 if($domain == 'www.hotst1.com')
 {
         header('Access-Control-Allow-Origin: https://www.hotst1.com');
 }

  else if($domain == 'www.hotst2.cl')
 {
         header('Access-Control-Allow-Origin: https://www.hotst2.cl');
 }


// Set Charset for Latin
header('Content-Type: text/html; charset=utf-8');

// require the autoloaders
require_once 'cc/api/src/Ctct/autoload.php';
require_once 'cc/api/vendor/autoload.php';
require_once 'sendmail-to-recep.php';


use Ctct\Components\Contacts\Contact;
use Ctct\ConstantContact;
use Ctct\Exceptions\CtctException;
use Ctct\Components\Component;



$resp = $_POST["conqueder"];


// Validate response
if(strpos($resp, 'tderecho141218') !== FALSE) {

    //echo $resp; 
    //echo "Verified.";
    Action_Msg();
} else {
    echo '<span class="label label-important">You do not have access to this servce. Please contact the admin at info@prosperosirus.com</span><p />';
}

function Action_Msg() {

// Enter your Constant Contact APIKEY and ACCESS_TOKEN
define("APIKEY", "yourapikeyprovidedbyconstantcontactthroughmashable");
define("ACCESS_TOKEN", "youraccesstokenprovidedbyconstantcontactthroughmashable");
$cc = new ConstantContact(APIKEY);

// check if the form was submitted
if (!empty($_POST)) {


$_POST['chosen_plan'] = "Company XYZ Website";

$Destination = "Company XYZ";
$To_email = "info@prosperosirus.com";
$CC_List_Num  = "1234567890";
$Topic = $Destination . "/Subject: ".$_POST["yoursubject"];

$email_content = '
Hi '.$Destination.',<p/>
We are informing you someone is interested in: '.$Destination.'<br/>
Here are the contact information:<p/>

<b> '.$_POST["yourmessage"].'</b><p/>

We have automatically save his contact info on our list at Constant Contact.<p/>

We suggest that you contact the prospect right now.</u><p/>

Best Regards,<p/>
--------------<br/>
Digital MKT Team<br/>
www.prosperosirus.com
';

$disp_var = $_POST["yourphone"]." ".$_POST["yourname"]." ".$_POST["yoursirname"]." ".$_POST["yoursubject"]." ".$_POST["yourname"]." ".$_POST["youremail"]."<br/>".$_POST["yourmessage"]; 

    try {

            $contact = new Contact();
            $List= $CC_List_Num;
            $Chosen_Plan = $_POST['chosen_plan'];

            //print_r($_POST);

            $contact->custom_fields = array(array('name' => 'CustomField1', 'value' => $Chosen_Plan),array('name' => 'CustomField2', 'value' => $_POST['yourphone']));
            $contact->addList($List);
            $contact->first_name = $_POST['yourname'];
            $contact->last_name = $_POST['yoursirname'];
            $contact->addEmail($_POST['youremail']);
            //$contact->company_name = $_POST['company_name'];

            $response = $cc->contactService->addContact(ACCESS_TOKEN, $contact, true);
          if (!empty($response->results)) {
            $action = '<span class="label label-important">We cannot process the information submitted. Please check them</span><p />';
            } else {
            $action = '<div class="container alert-success">The message was sent to '.$Destination.'. Thank you much !</div><p />';
            GoEmail(array($To_email),array($email_content),$Topic);
            }

    } catch (CtctException $ex) {
        $output = array_map(function ($object) { return $object->error_message; }, $ex->getErrors());
        if (strpos(implode("|",$output),"already exists")!= false) {
        $action = '<span class="label label-important">Thanks for coming back. Your message will be sent to:  '.$Destination.'</span><p />';
        GoEmail(array($To_email),array($email_content),$Topic);
        //$returnContact = $cc->contactService->updateContact(ACCESS_TOKEN, $contact, true);
        } else {
          GoEmail(array('info@prosperosirus.com'),array('check the script script '.$_SERVER["PATH_INFO"].'/'.$_SERVER["SCRIPT_FILENAME"].' Error found. '.$disp_var),$Topic);
          die('<span class="label label-important">An error occured. We have informed our technnical team.</span><p />');
          //var_dump($_POST);

        }
        //echo '<div class="container alert-error"><pre class="failure-pre">';
        //print_r($output);
        //print_r($ex->getErrors());
        //echo '</pre></div>';
        //die();
    }
    
//echo $action."/".var_dumo($_POST);
//var_dump($_POST);

  } else {
    echo "TPCCFRM_E001 - Invalid Parameters, the message could not be sent";
  }

}
?>