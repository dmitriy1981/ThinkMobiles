<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Controller_Base
{
    
    public $user    = '';
    public $errors  = [];

    public function action_index()
    {
        $this->user = Auth::instance()->get_user();
        
        if($this->user !== NULL)
        {
            // User is logged in, continue
            
            // Get all interests
            $interests     = Model_Interest::getInterests();
            
            // Get user interests
            $userInterests = Model_Interest::getUserInterests($this->user->id);
            
            
            // Remove "user interests", from "all interests"
            $availableInterests = [];
            
            for($i = 0; $i < count($userInterests); $i++)
            {
                foreach ($interests AS $k => $v)
                {
                    if($interests[$k]['id'] == $userInterests[$i]['interest_id'])
                    {
                        $availableInterests[$i]['id']    = $interests[$k]['id'];
                        $availableInterests[$i]['title'] = $interests[$k]['title'];

                            unset($interests[$k]);
                    }
                }
            }
            
            // if isset POST
            if($data    = Arr::sanitize($this->request->post()))
            {

                $post     = Validation::factory($data);
                $post->rule('fname', 'not_empty')
                     ->rule('fname', 'alpha')
                     ->rule('fname', 'min_length', array(':value', 3))
                     ->rule('fname', 'max_length', array(':value', 30))
                     ->rule('lname', 'not_empty')
                     ->rule('lname', 'not_empty')
                     ->rule('lname', 'alpha')
                     ->rule('lname', 'min_length', array(':value', 3))
                     ->rule('lname', 'max_length', array(':value', 30))
                     ->rule('birthday', 'not_empty');


                if(!$post->check())
                {
                    $this->errors = $post->errors('userinfo');
                }
                else
                {
                    // Save user information
                   if((new Model_User)->userUpdate($data, $this->user))
                   {
                        $this->redirect('http://'
                                    .$_SERVER['SERVER_NAME'].'/');
                   }
                }
            }
            
            // User bdate
            if($this->user->bdate)
            {
                $bdate = date("m/d/Y", strtotime($this->user->bdate));
            }
            else
            {
                $bdate = '';
            }
            
            
            $this->template->content = View::factory('logged_view')
                        ->set('interests',              $interests)
                        ->set('userinterests', $availableInterests)
                        ->set('errors',              $this->errors)
                        ->set('bdate',                      $bdate)
                        ->set('userinfo',              $this->user);
        }
        else
        {
            //User isn't logged in, show blank page
            $this->template->content = View::factory('unlogged_view');
        }
    }


} // End Main
