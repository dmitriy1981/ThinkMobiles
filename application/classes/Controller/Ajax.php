<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax extends Controller
{
    
    public $user    = '';

    public function action_add()
    {
        $this->user  = Auth::instance()->get_user();
        
        $post        = $this->request->post();
        
        $addInterest = Model_Interest::addInterests($post, $this->user->id);
    }


} // End Main
