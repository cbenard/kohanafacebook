<?php
defined('SYSPATH') or die('No direct script access.');

class Controller_Blog extends Controller_Sitebase
{

    public function action_index()
    {
        $view = View::factory('homepage');
        $view->posts = ORM::factory('post')->order_by('dateposted', 'desc')
                        ->find_all();
        $this->template->content = $view;

        $this->setTitle('Home Page');
        $this->template->opengraph->url = Url::site('', true);
        $this->template->opengraph->description =
                "This is a Kohana demonstration site.";
    }

    public function action_view($id)
    {
        $view = View::factory('viewpost');
        $view->post = ORM::factory('post', $id);
        $view->isAdmin = $this->isAdmin;
        $this->template->content = $view;

        $this->setTitle($view->post->name);
        $this->template->opengraph->description =
                Text::limit_words($view->post->content, 100, "...");
        $this->template->opengraph->url =
                Route::url('default', array(
                    'controller' => 'blog',
                    'action' => 'view',
                    'id' => $id,
                ), true);
    }

    public function action_viewindividual($id)
    {
        $this->auto_render = false;
        $view = View::factory('viewindividual');
        $view->post = ORM::factory('post', $id);

        $this->request->response = $view;
    }

}

// End Welcome
