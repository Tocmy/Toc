<?php
namespace App\Traits;

use App\Models\Setting\Seo;

/**
 *
 */
trait Seoable
{

     public function seos()
     {
         return $this->morphMany(Seo::class, 'seoable');
     }

     public function getTitle()
     {
         return $this->title;
     }

     public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        // View::share()

        return $this;
    }

    /**
     * Get the value of keywords
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set the value of keywords
     *
     * @return  self
     */
    public function setKeywords($keywords)
    {
        if (is_array($keywords)) $keywords = implode(', ', $keywords);
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get the value of author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of copyrights
     */
    public function getCopyrights()
    {
        return $this->copyrights;
    }

    /**
     * Set the value of copyrights
     *
     * @return  self
     */
    public function setCopyrights($copyrights)
    {
        $this->copyrights = $copyrights;

        return $this;
    }

    /**
     * Get the value of robots
     */
    public function getRobots()
    {
        return $this->robots;
    }

    /**
     * Set the value of robots
     *
     * @return  self
     */
    public function setRobots($robots)
    {
        $this->robots = $robots;

        return $this;
    }

    /**
     * Get the value of canonical
     */
    public function getCanonical()
    {
        return $this->canonical;
    }

    /**
     * Set the value of canonical
     *
     * @return  self
     */
    public function setCanonical($canonical)
    {
        $this->canonical = $canonical;

        return $this;
    }

    /**
     * Get the value of prev
     */
    public function getPrev()
    {
        return $this->prev;
    }

    /**
     * Set the value of prev
     *
     * @return  self
     */
    public function setPrev($prev)
    {
        $this->prev = $prev;

        return $this;
    }

    /**
     * Get the value of next
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * Set the value of next
     *
     * @return  self
     */
    public function setNext($next)
    {
        $this->next = $next;

        return $this;
    }

    /**
     * Get the value of alternates
     */
    public function getAlternates()
    {
        return $this->alternates;
    }

    /**
     * Set the value of alternates
     *
     * @return  self
     */
    public function setAlternate($lang, $link)
    {
        $this->alternates[] = [$lang, $link];

        return $this;
    }

    /**
     * Get the value of Metas
     */
    public function getMetas()
    {
        return $this->metas;
    }

    /**
     * Set the value of Metas
     *
     * @return  self
     */
    public function setMeta($name, $content)
    {
        $this->metas[] = [$name, $content];

        return $this;
    }

    /**
     * Get the value of Charset
     */
    public function getCharset()
    {
        return $this->charset;
    }

    /**
     * Set the value of Charset
     *
     * @return  self
     */
    public function setCharset($charset)
    {
        $this->charset = $charset;

        return $this;
    }

    /**
     * Get the value of OG
     */
    public function getOG()
    {
        return $this->open_graph;
    }

    /**
     * Set the value of OG
     *
     * @return  self
     */
    public function setOG($name, $content)
    {
        $this->open_graph[] = [$name, $content];

        return $this;
    }

    /**
     * Get the value of Twitter
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set the value of Twitter
     *
     * @return  self
     */
    public function setTwitter($name, $content)
    {
        $this->twitter[] = [$name, $content];

        return $this;
    }

    /**
     * Get the value of Images
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set the value of images
     *
     * @return  self
     */
    public function setImage($src)
    {
        $this->images[] = $src;

        return $this;
    }



}

?>
