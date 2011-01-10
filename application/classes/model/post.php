<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of post
 *
 * @author php
 */
class Model_Post extends ORM
{

    public function __get($name)
    {
        $method = 'get' . ucfirst(strtolower($name));
        return (method_exists($this, $method)) ? $this->$method() : parent::__get($name);
    }

    public function getDate()
    {
        return getdate(strtotime($this->dateposted));
    }

    public function getMonth()
    {
        $date = $this->getDate();
        return substr($date['month'], 0, 3);
    }

    public function getDay()
    {
        $date = $this->getDate();
        return $date['mday'];
    }

    public function getUrl()
    {
        return Route::url('blogview',
                array(
                    'controller' => 'blog',
                    'action' => 'view',
                    'id' => $this->id,
                    'title' => Url::title($this->name)
                )
        );
    }

    public function getEditUrl()
    {
        return Route::url('default', array(
            'controller' => 'admin',
            'action' => 'editpost',
            'id' => $this->id));
    }

    public function getDeleteUrl()
    {
        return Route::url('default', array(
            'controller' => 'admin',
            'action' => 'deletepost',
            'id' => $this->id))
            . "?token=" . Security::token();
    }

}

?>
