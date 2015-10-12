<?php
/**
 * Created by PhpStorm.
 * User: danielbaeck
 * Date: 12.10.15
 * Time: 13:31
 */

namespace App;


class Tokenizer {

    const SplitToken = "#@";

    public $str;
    public $tags = [];
    public $projects = [];
    public $escapedComments = [];
    public $comments;

    public function __construct($str)
    {
        $this->str = $str;
    }

    private function matchRegex($regex, $result, $strip = '#')
    {
        preg_match_all($regex, $this->str, $matches);

        foreach($matches[0] as $match)
        {
            $this->str = str_replace($match, self::SplitToken, $this->str);
            $this->{$result}[] = str_replace($strip, '', $match);
        }

        return $this;
    }

    public function findEscapedComments(){
        return $this->matchRegex("/\".*?\"/", 'escapedComments', '');
    }

    public function findTags(){
        return $this->matchRegex("/#[\w-]+/", 'tags');
    }

    public function findProjects(){
        return $this->matchRegex("/@[\w-]+/", 'projects', '@');
    }

    public function getTimes()
    {
        $parts = explode(self::SplitToken, $this->str);
        return (new TimeParser($parts))->parse();
    }

    public function processComments(){
        $parts = explode(self::SplitToken, $this->str);
        $parts = array_filter(array_map('trim', $parts));
        $this->escapedComments = array_filter(array_map('trim', $this->escapedComments));
        $sep = count($this->escapedComments) > 0 ? ', ' : '';
        $this->comments = implode(", ", $this->escapedComments) . $sep . implode(", ", $parts);

        return $this;
    }

}