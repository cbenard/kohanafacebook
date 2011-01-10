<?php
require_once(APPPATH . "vendor/facebook/facebook.php");

/**
 * Description of facebook
 *
 * @author Chris Benard
 */
class Helper_Facebook
{
    public $facebook;
    public $uid;
    public $me;
    public $session;
    
    private static $instance;
    
    private function __construct()
    {
        $this->facebook = new Facebook(array(
                    'appId' => SiteConfiguration::$fbappid,
                    'secret' => SiteConfiguration::$fbsecret,
                    'cookie' => true,
                ));

        $this->session = $this->facebook->getSession();

        if ($this->session)
        {
            try
            {
                $this->uid = $this->facebook->getUser();
                $this->me = $this->facebook->api('/me');
            }
            catch (FacebookApiException $e)
            {

            }
        }
    }

    public static function instance()
    {
        if (static::$instance === NULL)
        {
            static::$instance = new Helper_Facebook();
        }

        return static::$instance;
    }
}

?>
