<?php
/**
 * 
 * Encoding: UTF-8
 * @package ELMS
 *
 * @author CrossKnowledge {@link http://www.crossknowledge.com}
 * @copyright Copyright 2001 - 2013, CrossKnowledge
 * @filesource
 */

header('content-type: json/application');


$data = $_REQUEST;

if(empty($data["call"]))
{
  echo json_encode(array('Return' => 'error', 'message' => 'call param is missing'));
}

include_once "class.JenkinsService.php";
$jenkinsService =  new JenkinsService("athena-jenkins.epistema.com:8080", "blarosa", "e72eedba8f60d2323e91076da830cecd");

switch($data['call'])
{
  case "update":
    $result = array("Return" => "Success", "result" => $jenkinsService->getAllJobs());
    break;
}

echo json_encode($result);