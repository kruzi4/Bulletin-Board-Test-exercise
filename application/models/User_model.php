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

  function getUser() {
    $query = $this->db->get_where('users', ['email' => $_COOKIE['user']]);
    return $query->row_array();
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
