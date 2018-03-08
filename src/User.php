<?php
namespace Echofin;
/**
 * Class User
*
* @package Echofin
*/


class User extends Echofin{

	// @var string The Echofin API token to be used for requests.
    private static $usersEndpoint = "user";

	/**
     * @param array|null $params
     *
     * @return Create a new user.
     */
	public static function create($params){
		return self::exec(self::$usersEndpoint."/register", $params);
	}
}

?>