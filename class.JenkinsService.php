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

class JenkinsService
{

  const JOBS_QUERY_PARAMS = "jobs[name,lastBuild[*,actions[*]],lastStableBuild[*,actions[*]]]";

  private $url;
  private $username;
  private $apiKey;


  /**
   * @param string $url
   * @param string $username
   * @param string $apiKey
   */
  public function __construct($url, $username, $apiKey)
  {
    $this->url = $url;
    $this->username = $username;
    $this->apiKey = $apiKey;
  }

  public function getAllJobs()
  {
    $queryUrl = 'http://' . $this->username . ':' . $this->apiKey . '@' . $this->url . '/api/json?tree=' . self::JOBS_QUERY_PARAMS;

    $curl = curl_init($queryUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    return json_decode(curl_exec($curl));


  }

} 