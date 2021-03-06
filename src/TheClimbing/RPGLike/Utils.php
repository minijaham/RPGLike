<?php


namespace TheClimbing\RPGLike;


class Utils
{


    public static function parseKeywords(array $keywords, string $subject) : string
    {
        $subject = str_replace(['{', '}'], [' ', ' '], $subject);
        foreach($keywords as $key => $value) {
            $subject = str_replace($key, $value, $subject);
        }
        return $subject;
    }
    public static function parseArrayKeywords(array $keywords, array $messages)
    {
        foreach ($messages as $key => $message) {
            if (is_array($message)){
                foreach ($message as $key1 => $value) {
                    $messages[$key][$key1] = self::parseKeywords($keywords, $value);
                }
            }else{
                $messages[$key] = self::parseKeywords($keywords, $message);
            }
        }
        return $messages;
    }
}