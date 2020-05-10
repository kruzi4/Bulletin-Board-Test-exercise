<?php

class User_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function checkRegData($firstname, $secondname, $email, $pass) {
    $this->firstname = $firstname;
    $this->secondname = $secondname;
    $this->email = $email;
    $this->pass = $pass;

    $query = $this->db->get_where('users', [
      'email' => $email,
    ]);
    $user = $query->row_array();

    if($firstname == '' || $secondname == '' || $email == '' || $pass == '')
      return false;
    else if($email == $user['email'])
      return "Данный адресс электронной почты уже зарегестрирован";
    else if(strlen($pass) < 3)
      return "Пароль слишком короткий, минимум 3 символа";
    else{
      $this->setRegData();
      $this->setAuth($this->email);
      return true;
    }

  }

  public function setRegData() {
    $data = [
      'firstname' => $this->firstname,
      'secondname' => $this->secondname,
      'email' => $this->email,
      'pass' => $this->pass
    ];
    return $this->db->insert('users', $data);
  }

  public function checkAuthData($email, $pass) {
    $query = $this->db->get_where('users', [
      'email' => $email,
      'pass' => $pass
    ]);
    $user = $query->row_array();

    if($email != $user['email'] && $pass != '')
        return 'Пароль и логин не совпадают';
    else if($pass != $user['pass'])
        return 'Вы ввели не правильный пароль';
    else if($pass == '')
        return 'Введите пароль';
    else if($email == '')
        return 'Введите email';

    else if($pass == $user['pass']) {
        $this->setAuth($email);
        return true;
    }
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
    if($this->isLogged()) {
      $query = $this->db->get_where('users', ['email' => $_COOKIE['user']]);
      return $query->row_array();
    }
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
}
