<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base extends Controller_Template
{
    
    public $template = 'layouts/main_layout';
    
    public function before()
    {
        parent::before();
        
            View::set_global('title',         'Тестовый сайт');				
            View::set_global('description',  'Сайт на Kohana');
        
        $this->template->styles  = ['jquery-ui','bootstrap',
                                      'bootstrap-theme.min','main'];
        $this->template->scripts = ['jquery-1.12.0.min', 'bootstrap',
                               'jquery-ui', 'jquery.maskedinput.min',
                             'main', 'ie10-viewport-bug-workaround'];
        $this->template->content = '';
    }

} // End Base