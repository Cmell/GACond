<?php

$mturkcode = $_GET['mturkcode'];
$file = fopen("conds.csv","r");

$affirmationcond = 'none';
$ratcond = 'none';
$grouptext = 'none';
while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
  if ($data[0] == $mturkcode) {
    $affirmationcond = $data[1];
    $ratcond = $data[2];
    $grouptext = $data[3];
    $taskorder = $data[4];
    break;
  }
}
fclose($file);

if (($affirmationcond === 'none') or ($ratcond === 'none')) {
  // problem
}

$retval = Array();

$retval['affirmcond'] = $affirmationcond;
$retval['ratcond'] = $ratcond;
$retval['grouptext'] = $grouptext;
$retval['taskorder'] = $taskorder;

header('Content-type: application/json');
exit(json_encode($retval));

?>
