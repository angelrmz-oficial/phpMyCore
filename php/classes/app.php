<?php
class app // extends AnotherClass
{

  function __construct()
  {
    global $app;
    $this->app=$app;
  }

  function pmc($key, $value){
    $this->app['pmc'][$key]=$value;
    return (file_put_contents(PATH_EXTRADATA . 'app.pmc.json', json_encode($this->app['pmc'])) === FALSE) ? false : true;
  }

  function adduser($username,$password,$permissions,$ips){
    array_push($this->app['users'], array(
      "username" => $username,
      "hashpass" => $password,
      "last_ip" => null,
      "last_connection" => null,
      "permissions" => $permissions,
      "ips" => $ips
    ));
    return (file_put_contents(PATH_EXTRADATA . 'app.users.json', json_encode($this->app['users'])) === FALSE) ? false : true;
  }

  function edituser($username,$newusername,$password,$permissions,$ips){
    foreach ($this->app['users'] as $i => &$user):
      if($user['username'] == $username):
        $this->app['users'][$i]['username']=$newusername;
        $this->app['users'][$i]['password']=($password !== "") ? $password : $this->app['users'][$i]['password'];
        $this->app['users'][$i]['permissions']=$permissions;
        $this->app['users'][$i]['ips']=$ips;
      endif;
    endforeach;

    return (file_put_contents(PATH_EXTRADATA . 'app.users.json', json_encode($this->app['users'])) === FALSE) ? false : true;
  }

  function deleteuser($username){
    foreach ($this->app['users'] as $i => &$user):
       if($user['username'] == $username):
         unset($this->app['users'][$i]);
       endif;
     endforeach;
    return (file_put_contents(PATH_EXTRADATA . 'app.users.json', json_encode($this->app['users'])) === FALSE) ? false : true;
  }

  function updateuser($username, $arrays){
    foreach ($this->app['users'] as $i => &$user):
      if($user['username'] == $username):
        foreach ($arrays as $key => $value) {
          $this->app['users'][$i][$key]=$value;
        }
      endif;
    endforeach;
    return (file_put_contents(PATH_EXTRADATA . 'app.users.json', json_encode($this->app['users'])) === FALSE) ? false : true;
  }

  function add_ip($_user){
    foreach ($this->app['users'] as $i => &$user):
      if($user == $_user):
         array_push($this->app['users'][$i]['ips'], remoteIP());
       endif;
     endforeach;
    return (file_put_contents(PATH_EXTRADATA . 'app.users.json', json_encode($this->app['users'])) === FALSE) ? false : true;
  }

  function last($_user){
    foreach ($this->app['users'] as $i => &$user):
      if($user == $_user):
        $this->app['users'][$i]['last_ip']=remoteIP();
        $this->app['users'][$i]['last_connection']=date("Y-m-d H:i:s");
      endif;
    endforeach;
    return (file_put_contents(PATH_EXTRADATA . 'app.users.json', json_encode($this->app['users'])) === FALSE) ? false : true;

  }

  function settings($data){
    foreach ($data as $key => $value):
      if(isset($this->app['settings'][$key])):
        $this->app['settings'][$key]=($value == "on" || $value == "off" || $value == "true" || $value == "false") ? filter_var($value, FILTER_VALIDATE_BOOLEAN) : $value;
      endif;
    endforeach;
    return (file_put_contents(PATH_EXTRADATA . 'app.settings.json', json_encode($this->app['settings'])) === FALSE) ? false : true;
  }

}

?>
