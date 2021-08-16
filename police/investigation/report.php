<?php

require_once __DIR__ . '/vendor/autoload.php';
$date=$_POST['date'];
$InvName=$_POST['InvName'];
$cName=$_POST['cname'];
$desc=$_POST['desc'];
if (isset($_POST['pdf'])) {
$mpdf = new \Mpdf\Mpdf();
 $mpdf->WriteHTML('<h1 style="text-align:center;">TANZANIA POLICE FORCE</h1> <br>');
 $mpdf->WriteHTML('<div class="logo" style="margin:auto;width:60%;text-align:center;"><img src="logo.jpg" style=" width:20%;item-align:center;"></div>');

$data='';
$data.='<strong>Date</strong>'.$date.'<br>';
$data.='<strong>Investigator Name:</strong>'.$InvName.'<br>';
$data.='<strong>Case Name:</strong>'.$cName.'<br><br><hr>';
if($desc){
    $data.='<br><br>'.$desc;
}
$mpdf->writeHTML($data);
$mpdf->Output();
}

?>
