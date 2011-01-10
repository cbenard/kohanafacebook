<?php
defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller_Sitebase
{

    public function before()
    {
        parent::before();

        if (!$this->isAdmin)
        {
            $this->request->action = "notauthorized";
        }
    }

    public function action_index()
    {
        $this->request->redirect('/');
    }

    public function action_notauthorized()
    {
        $view = View::factory('notauthorized');
        $this->setPostProperties($view);
        $this->template->content = $view;
        $view->me = $this->me;
        $this->request->status = 403;
        $this->setTitle('Not Authorized');
    }

    protected function validateEntries()
    {

    }

    public function action_addpost()
    {
        $errors = array();

        if (Arr::get($_POST, 'name') === null)
        {
            $view = View::factory('addpost');
            $this->setPostProperties($view);
            $this->template->content = $view;
            $this->setTitle('Add Post');
        }
        else if (!$this->savePost($errors))
        {
            $view = View::factory('addpost');
            $view->errors = $errors;
            $this->setPostProperties($view);
            $this->template->content = $view;
            $this->setTitle('Add Post');
        }
    }

    public function action_editpost($id)
    {
        $errors = array();

        if (Arr::get($_POST, 'name') === null)
        {
            $view = View::factory('addpost');
            $post = ORM::factory('post', $id);
            $this->setPostProperties($view, $post);
            $this->template->content = $view;
            $this->setTitle('Edit Post');
        }
        else if (!$this->savePost($errors))
        {
            $view = View::factory('addpost');
            $view->errors = $errors;
            $post = ORM::factory('post', $id);
            $this->setPostProperties($view, $post);
            $this->template->content = $view;
            $this->setTitle('Edit Post');
        }
    }

    protected function savePost(&$errors)
    {
        $errors = array();

        $validator = $this->getValidator();
        
        if (!$validator->check())
        {
            $errors = $validator->errors('addeditpost');
            return false;
        }

        try
        {
            $post = null;
            if (Arr::get($_POST, 'id'))
            {
                $post = ORM::factory('post', Arr::get($_POST, 'id'));
            }
            else
            {
                $post = ORM::factory('post');
            }

            $post->name = Arr::get($_POST, 'name');
            $post->content = Arr::get($_POST, 'content');

            $post->save();

            $this->request->redirect('/');

            return true;
        }
        catch (Exception $ex)
        {
            $errors[] = $ex->getMessage();

            return $false;
        }
    }

    protected function getValidator()
    {
        $post = Arr::extract($_POST,
                    array('id', 'name', 'content', 'token'));

        $validator = Validate::factory($post)
            ->filter(true, 'trim')
            ->rule('token', 'Security::check')
            ->rule('name', 'not_empty')
            ->rule('content', 'not_empty');

        return $validator;
    }

    protected function setPostProperties(View $view, Model_Post $post = null)
    {
        if (!$post)
        {
            $view->id = null;
            $view->name = null;
            $view->content = null;
            $view->deleteUrl = null;

            $values = Arr::extract($_POST,
                    array('id', 'name', 'content'));
            if (count($values))
            {
                $view->set($values);
            }
        }
        else
        {
            $view->id = $post->id;
            $view->name = $post->name;
            $view->content = $post->content;
            $view->deleteUrl = $post->deleteUrl;
        }
    }

    public function action_deletepost($id)
    {
        if (Arr::get($_GET, 'token')
            && Security::check(Arr::get($_GET, 'token')))
        {
            $post = ORM::factory('post', $id);
            $post->delete();

            $this->request->redirect('/');
        }
        else
        {
            $post = ORM::factory('post', $id);

            $this->request->redirect(
                    Route::url('default',
                            array(
                                'controller' => 'admin',
                                'action' => 'editpost',
                                'id' => $id)
                            , true)
                    );
        }
    }

}

// End Welcome
