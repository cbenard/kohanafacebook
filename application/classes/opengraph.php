<?php
/* 
 An Open Graph tag looks like this:

<meta property="og:tag name" content="tag value"/>
If you use Open Graph tags, the following six are required:

og:title - The title of the entity.
og:type - The type of entity. You must select a type from the list of Open Graph types.
og:image - The URL to an image that represents the entity. Images must be at least 50 pixels by 50 pixels. Square images work best, but you are allowed to use images up to three times as wide as they are tall.
og:url - The canonical, permanent URL of the page representing the entity. When you use Open Graph tags, the Like button posts a link to the og:url instead of the URL in the Like button code.
og:site_name - A human-readable name for your site, e.g., "IMDb".
fb:admins or fb:app_id - A comma-separated list of either the Facebook IDs of page administrators or a Facebook Platform application ID. At a minimum, include only your own Facebook ID.


Activities
activity
sport
Businesses
bar
company
cafe
hotel
restaurant
Groups
cause
sports_league
sports_team
Organizations
band
government
non_profit
school
university
People
actor
athlete
author
director
musician
politician
public_figure
Places
city
country
landmark
state_province
Products and Entertainment
album
book
drink
food
game
product
song
movie
tv_show
For products which have a UPC code or ISBN number, you can specify them using the og:upc and og:isbn properties. These properties help uniquely identify products.

Websites
blog
website
article
 */
class Opengraph {

    public $title;
    public $image;
    public $video;
    public $description;
    public $url;
    public $type = "article";
    public $site_name = 'Kohana Demonstration Site';
    public $appid = '123307824402073';
    
    public function __construct($title = null, $url = null, $image = null)
    {
        $this->title = $title;
        $this->url = $url;
        $this->image =
            $image ?: 'http://chrisbenard.net/downloads/php-logo.jpg';
    }

    protected function CreateMetaTag($property, $content)
    {
        $tag = '<meta property="'.$property.'" content="'
            .Html::entities($content).'" />'."\n";
        return $tag;
    }

    public function __toString()
    {
        try
        {
            if (!$this->title)
            {
                $this->title = "A Meefaw Inc Video Page";
            }
            
            $ret = $this->CreateMetaTag("og:type", $this->type);
            $ret .= $this->CreateMetaTag("fb:app_id", $this->appid);
            $ret .= $this->CreateMetaTag("og:site_name", $this->site_name);
            $ret .= $this->CreateMetaTag("og:title", $this->title);

            if ($this->image)
                $ret .= $this->CreateMetaTag("og:image", $this->image);
            if ($this->description)
                $ret .= $this->CreateMetaTag("og:description", $this->description);
            if ($this->video)
                $ret .= $this->CreateMetaTag("og:video", $this->video);
            if ($this->url)
                $ret .= $this->CreateMetaTag("og:url", $this->url);

            return $ret;
        }
        catch (Exception $e)
        {
            return "";
        }
    }
}
?>
