<?php
/*
* Echofin API Documentation: https://www.echofin.co/docs/api/overview/
* 
*/
  
  // Echofin singleton
  require(dirname(__FILE__) . '/../src/Echofin.php');
  // Users
  require(dirname(__FILE__) . '/../src/User.php');
  // Chatrooms
  require(dirname(__FILE__) . '/../src/Chatroom.php');



  // Set the API Token
  \Echofin\Echofin::setToken('63eb1087-88a9-4832-b4e7-0565d6d72d0b');


  /* Define a user Object */
  $userObject = array(
    'email' => 'myemail@domain.com',
    'fullName' => 'Jon Doe',
    'userName' => 'myUserName',
    'password' => 'ABCD1234',
    'emailVerification' => false
  );

  /* Create a new user to Echofin. Username & email must be unique accross Echofin. */
  try{
    $response = \Echofin\User::create($userObject);
    echo $response;
  }
  catch(Exception $e){
    print_r($e->getMessage());
    die('');
  }


  /* Add the created user to the private room with ID e435586f */
  try{
    $response = \Echofin\Chatroom::addUser('e435586f', $userObject['userName']);    
    echo $response;
  }
  catch(Exception $e){
    print_r($e->getMessage());
    die('');
  }


  /* Remove the user from private room with ID e435586f */
  try{
    $response = \Echofin\Chatroom::removeUser('e435586f', $userObject['userName']);   
    echo $response;
  }
  catch(Exception $e){
    print_r($e->getMessage());
  }


?>