<?php
namespace Echofin;
/**
 * Class User
*
* @package Echofin
*/


class Chatroom extends Echofin{

	// @var string The Echofin API token to be used for requests.
    private static $chatroomsEndpoint = "chatroom";

	

	/**
     * @param string $room
     * @param string $user
     *
     * @return add a user to private chatroom.
     */
	public static function addUser($room, $user){	
		return self::exec(self::$chatroomsEndpoint."/add-user", array('room'=>$room, 'user'=>$user));
	}

	/**
     * @param string $room
     * @param string $user
     *
     * @return removes a user from private chatroom.
     */
	public static function removeUser($room, $user){	
		return self::exec(self::$chatroomsEndpoint."/remove-user", array('room'=>$room, 'user'=>$user));
	}
}

?>