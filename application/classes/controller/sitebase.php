<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sitebase
 *
 * @author php
 */
class Controller_Sitebase extends Controller_Template
{

    public $template = 'sitetemplate';
    protected $isAdmin;

    public function before()
    {
        parent::before();

        $this->template->title = "Untitled";
        $this->template->content = "";

        $fb = Helper_Facebook::instance();

        $this->template->facebook = $fb->facebook;
        $this->template->me = $fb->me;
        $this->template->uid = $fb->uid;
        $this->template->session = $fb->session;

        $this->isAdmin = $this->isAdmin();
        $this->template->isAdmin = $this->isAdmin();

        $this->template->opengraph = new Opengraph();
    }

    protected function isAdmin()
    {
        $fb = Helper_Facebook::instance();
        $session = $fb->session;
        $me = $fb->me;

        if ($session && $me && $me['id'])
        {
            return ORM::factory('admin')
                ->where('facebookid', '=', $me['id'])
                ->find()
                ->loaded();
        }
        else
        {
            return false;
        }
    }

    protected function setTitle($title)
    {
        $this->template->title = $title;
        $this->template->opengraph->title = $title;
    }

}

?>
