<?php
namespace Echofin;

/**
* Class Echofin
*
* @package Echofin
*/


class Echofin{
	// @var string The Echofin API token to be used for requests.
    public static $apiToken;

    // @var bool The debug output mode. 
    public static $outputDebug = false;

    // @var string The base URL for the Echofin API.
    private static $apiBase = 'https://api.echofin.co';

    // @var string The version of the Echofin API to use for requests.
    private static $apiVersion = 'v1';

    // @var string The debug output message. 
    private static $outputMsg = null;

    const VERSION = '1.0';


    /**
     * Sets the API token to be used for requests.
     *
     * @param string $apiKey
     */
    public static function setToken($token)
    {
        self::$apiToken = $token;
    } 

    /**
     * Sets the debug output status to be used for requests.
     *
     * @param bool $status
     */
    public static function setDebug($status)
    {
        self::$outputDebug = $status;
    } 
  

    /**
     * Get the API base url.
     *
     * @param void 
     */
    private static function getAPIUrl(){
    	return self::$apiBase."/".self::$apiVersion."/";
    }


    /**
     * Handle the output of any request
     *
     * @param string $res 
     */
    protected static function handleOutput($res, $errCode){
    	if(self::$outputDebug==true){
    		echo $res;
		}		

		if($errCode!=200):				
			throw new \Exception($res);
		else:
			return $res;
		endif;
    }


    /**
     * Execute a curl by the endpoint url
     *
     * @param string $endpoint 
     * @param array $params
     */
    protected static function exec($endpoint, $params){

    	if(!isset($endpoint) || empty($endpoint)){
    		self::handleOutput(json_encode(array("error"=>"endpoint is invalid")));
    		exit; 
    	}

    	$ch = curl_init(self::getAPIUrl().$endpoint);
    	$params['token'] = self::$apiToken;
		$payload = json_encode($params);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);		
		curl_close($ch);

		return self::handleOutput($result, $httpcode);
		
    }
}

?>