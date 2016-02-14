<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_User extends Model_Auth_User
{
    protected $_table_name  = 'users';
    protected $_primary_key = 'id';
    
    public function rules()
    {
        return array(
            'username' => array(
                array('not_empty'),
                array('min_length', array(':value', 3)),
                array(array($this, 'unique'), array('username', ':value')),
            ),
            'password' => array(
                array('not_empty'),
            ),
            'email' => array(
                array('not_empty'),
                array('email'),
                array(array($this, 'unique'), array('email', ':value')),
            ),
        );
    }
    public function userUpdate($post, $user)
    {
        $bdate = date("Y-m-d", strtotime($post['birthday']));
        
        $query = DB::update($this->_table_name)
                ->set(array(
                    'lname' => $post['lname'],
                    'fname' => $post['fname'],
                    'bdate' => $bdate,
                ))
                ->where('id', '=', $user->id);
        
        return $query->execute();
    }
}