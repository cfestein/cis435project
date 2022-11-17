<?php
include 'lib/MailChimp.php';

use \DrewM\MailChimp\MailChimp;

$api_key = '57b4203a20bcffee221494419602a50a-us14';
$list_id = '809c581e11';

$MailChimp = new MailChimp($api_key);

if ($_POST) {
    $fname = $_POST['fname'];
    $email = $_POST['email'];

    $result = $MailChimp->post("lists/$list_id/members", [
        'email_address' => $email,
        'merge_fields' => ['FNAME' => $fname],
        'status'        => 'subscribed',
    ]);

    if ($MailChimp->success()) {
        //print_r($result);	
        echo '<a href="/success.html"></a>';
    } else {
        echo '<a href="/failure.html"></a>';
    }
} else {
    echo '<a href="failure.html"></a>';
}
