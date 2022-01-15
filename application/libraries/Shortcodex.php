<?php
class Shortcodex {
    
    public static function parse_shortcodes($text) {
        preg_match_all(SHORTOCODE_REGEXP, $text, $matches, PREG_SET_ORDER);
        $shortcodes = array();
        foreach ($matches as $i => $value) {
            $shortcodes[$i]['shortcode'] = $value['shortcode'];
            $shortcodes[$i]['name'] = $value['name'];
            if (isset($value['attrs'])) {
                $attrs = self::parse_attrs($value['attrs']);
                $shortcodes[$i]['attrs'] = $attrs;
            }
            if (isset($value['content'])) {
                $shortcodes[$i]['content'] = $value['content'];
            }
        }
    
        return $shortcodes;
    }
    
    private static function parse_attrs($attrs) {
        preg_match_all(ATTRIBUTE_REGEXP, $attrs, $matches, PREG_SET_ORDER);
        $attributes = array();
        foreach ($matches as $i => $value) {
            $key = $value['name'];
            $attributes[$key] = $value['value'];
        }
        return $attributes;
    }

}