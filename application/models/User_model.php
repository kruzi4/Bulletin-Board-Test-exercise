<?php

class User_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function checkRegData($firstname, $secondname, $email, $pass) {
    $this->firstname = trim(filter_var($firstname, FILTER_SANITIZE_STRING));
    $this->secondname = trim(filter_var($secondname, FILTER_SANITIZE_STRING));
    $this->email = trim(filter_var($email, FILTER_VALIDATE_EMAIL));
    $this->pass = $pass;

    if($firstname == '' || $secondname == '' || $email == '' || $pass == '')
      return false;
    else if(strlen($pass) < 3)
      return "Пароль слишком короткий, минимум 3 символа";
    else if($this->emailExists($email))
      return "Данный адрес электронной почты уже зарегестрирован";
    else{
      $this->setRegData();
      $this->checkAuthData($email, $pass);
    }
  }

  function emailExists($email) {
    $this->db->where('email',$email);
    $query = $this->db->get('users');
    if($query->num_rows() > 0){
        return true;
    }else{
        return false;
    }
  }

  public function setRegData() {
    $data = [
      'firstname' => $this->firstname,
      'secondname' => $this->secondname,
      'email' => $this->email,
      'pass' => $this->pass
    ];
    $this->db->insert('users', $data);
  	header('Location: /user/dashboard');
    return true;
  }

  public function checkAuthData($email, $pass) {
    $query = $this->db->get_where('users', [
      'email' => $email,
      'pass' => $pass
    ]);
    $user = $query->row_array();

    if($email != $user['email'] && $pass != '')
        return 'Пароль или логин не совпадают';
    else if($pass != $user['pass'])
        return 'Вы ввели не правильный пароль';
    else if($pass == '')
        return 'Введите пароль';
    else if($email == '')
        return 'Введите email';

    else if($pass == $user['pass']) {
        $this->setAuth($user['id']);
        return true;
    }
  }

  public function setAuth($user_id) {
    setcookie('user', $user_id, time() + 3600, '/');
  }

  public function logOut() {
    setcookie('user', $this->id, time() - 3600, '/');
    unset($_COOKIE['user']);
  }

  public function isLogged() {
    return isset($_COOKIE['user']) ? true : false;
  }

  public function getUser() {
    $query = $this->db->get_where('users', ['id' => $_COOKIE['user']]);
    return $query->row_array();
  }

  public function setUserName($name) {
    $name = trim(filter_var($name, FILTER_SANITIZE_STRING));
    $this->db->where('id', $this->getUser()['id']);
    $this->db->update('users', ['firstname' => $name]);
  }

  public function setUserEmail($email) {
    $email = trim(filter_var($email, FILTER_SANITIZE_STRING));
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
    }else if(trim($this->old_pass) == '' || trim($this->pass) == '' ){
      return "Вы не ввели данные";
    }else if($user['pass'] != $this->old_pass){
      return "Пароль неправильный";
    }
  }
}
