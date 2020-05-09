<?php

class User_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function setData($firstname, $secondname, $email, $pass) {
    $this->firstname = $firstname;
    $this->secondname = $secondname;
    $this->email = $email;
    $this->pass = $pass;

    // $pass = password_hash($pass, PASSWORD_DEFAULT);

    $data = [
      'firstname' => $firstname,
      'secondname' => $secondname,
      'email' => $email,
      'pass' => $pass
    ];

    return $this->db->insert('users', $data);

    $this->setAuth($this->email);
  }

  public function checkAuthData($email, $pass) {
    $query = $this->db->get_where('users', array(
      'email' => $email,
      'pass' => $pass
    ));
    $user = $query->row_array();

    if($user['email'] == '')
        return 'Пользователя с таким email не существует';
    else if($pass == $user['pass']) {
        $this->setAuth($email);
        return true;
    }else
        return 'Пароли не совпадают';
  }

  public function setAuth($email) {
    setcookie('user', $email, time() + 3600, '/');
  }

  public function isLogged() {
    return isset($_COOKIE['user']) ? true : false;
  }

  public function logOut() {
    setcookie('user', $this->email, time() - 3600, '/');
    unset($_COOKIE['user']);
  }

  public function getUser() {
    $query = $this->db->get_where('users', ['email' => $_COOKIE['user']]);
    return $query->row_array();
  }

  public function setUserName($name) {
    $this->db->where('email', $_COOKIE['user']);
    $this->db->update('users', ['firstname' => $name]);
  }

  public function setUserEmail($email) {
    $this->db->where('id', $this->getUser()['id']);
    $this->db->update('users', ['email' => $email]);
  }

  public function setUserPassword($id,$old_pass,$pass) {
    $this->id = $id;
    $this->old_pass = $old_pass;
    $this->pass = $pass;

    $query = $this->db->get_where('users', ['id' => $this->id]);
    $user = $query->row_array();

    if($user['pass'] == $this->old_pass && $this->pass != $this->old_pass ) {
      $this->db->where('id', $this->id );
      $this->db->update('users', ['pass' => $this->pass]);
    }else if($this->old_pass == '' || $this->pass == '' ){
      return "Вы не ввели данные";
    }else if($user['pass'] != $this->old_pass){
      return "Пароль неправильный";
    }
  }


  // public function setUser($firstname, $secondname, $email, $pass) {
  //
  //   $pass = password_hash($pass, PASSWORD_DEFAULT);
  //
  //   $data = [
  //     'firstname' => $firstname,
  //     'secondname' => $secondname,
  //     'email' => $email,
  //     'pass' => $pass
  //   ];
  //
  //   return $this->db->insert('users', $data);
  //
  // }

}
