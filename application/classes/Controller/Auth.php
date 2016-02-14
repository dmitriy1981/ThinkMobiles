<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller_Base
{
    
    public $errors   = [];

    public function action_register()
    {
        // If authorisation OK, - go to index page
        $this->authBlocked();
        
        if (HTTP_Request::POST == $this->request->method())
	{
		try {
			// Create the user using form values
			$user = ORM::factory('User')
                                ->create_user($this->request->post(), 
                                                        [
                                                            'username',
                                                            'password',
                                                            'email'
                                                        ]);

			// Grant user login role
			$user->add('roles', ORM::factory('Role', ['name' => 'login']));
			// Reset values so form is not sticky
			$_POST = [];

                        $this->redirect('http://'
                            .$_SERVER['SERVER_NAME'].'/success/');
                        
                    }
                    catch (ORM_Validation_Exception $e) 
                    {
			$this->errors = $e->errors('models');
                    }
	}
        
	$this->template->content = View::factory('register_view')
                                  ->bind('errors', $this->errors);
    }
    public function action_success()
    {
	$this->template->content = View::factory('success_view');
    }
    public function action_login()
    {
        // If authorisation OK, - go to index page
        $this->authBlocked();
        
        $post = Arr::sanitize($this->request->post());
        
        if(!empty($post))
        {
            $username = $post['username'];
            $password = $post['password'];

            if (Auth::instance()->login($username, $password))
            {
                    // Authorization success
                $this->redirect('http://'
                            .$_SERVER['SERVER_NAME'].'/');
            }
            else
            {
                    // Authorization error
                $this->errors = ['Authentication failure'];
            }
        }

	$this->template->content = View::factory('login_view')
                               ->bind('errors', $this->errors);
    }
    public function action_logout()
    {
	Auth::instance()->logout();
        
                $this->redirect('http://'
                            .$_SERVER['SERVER_NAME'].'/');
    }
    
    //////////////
    private function authBlocked()
    {
        if(Auth::instance()->get_user() !== NULL)
        {
                $this->redirect('http://'
                            .$_SERVER['SERVER_NAME'].'/');
                exit;
        }
    }

} // End Auth