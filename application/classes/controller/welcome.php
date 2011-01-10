<?php
defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Sitebase {

    public function action_index()
    {
        $this->template->content = 'hello, world!';
    }

    public function action_githubinstall()
    {
        $this->template->content = View::factory('githubinstall');
        $this->template->title = "Installation Instructions";
    }

} // End Welcome
