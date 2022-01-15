<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('doSeo'))
{

    function doSeo($string, $maxlen = 0)
    {

        $newStringTab = array();

        $string = cleanOut($string);

        $string = strtolower(doChars($string));

        $stringTab = str_split($string);

        $numbers = array(

            "0",

            "1",

            "2",

            "3",

            "4",

            "5",

            "6",

            "7",

            "8",

            "9",

            "-",

        );

        foreach ($stringTab as $letter)
        {

            if (in_array($letter, range("a", "z")) || in_array($letter, $numbers))
            {

                $newStringTab[] = $letter;

            }
            elseif ($letter == " ")
            {

                $newStringTab[] = "-";

            }

        }

        if (count($newStringTab))
        {

            $newString = implode($newStringTab);

            if ($maxlen > 0)
            {

                $newString = substr($newString, 0, $maxlen);

            }

            $newString = remDupes('--', '-', $newString);

        }
        else
        {

            $newString = '';

        }

        return $newString;

    }

}

if (!function_exists('doSeo2'))
{

    function doSeo2($string, $maxlen = 0)
    {

        $newStringTab = array();

        $string = cleanOut($string);

        $string = strtolower(doChars($string));

        $stringTab = str_split($string);

        $numbers = array(

            "0",

            "1",

            "2",

            "3",

            "4",

            "5",

            "6",

            "7",

            "8",

            "9",

            "-",

            "/",

        );

        foreach ($stringTab as $letter)
        {

            if (in_array($letter, range("a", "z")) || in_array($letter, $numbers))
            {

                $newStringTab[] = $letter;

            }
            elseif ($letter == " ")
            {

                $newStringTab[] = "-";

            }

        }

        if (count($newStringTab))
        {

            $newString = implode($newStringTab);

            if ($maxlen > 0)
            {

                $newString = substr($newString, 0, $maxlen);

            }

            $newString = remDupes('--', '-', $newString);

        }
        else
        {

            $newString = '';

        }

        return $newString;

    }

}

if (!function_exists('remDupes'))
{

    function remDupes($sSearch, $sReplace, $sSubject)
    {

        $i = 0;

        do
        {

            $sSubject = str_replace($sSearch, $sReplace, $sSubject);

            $pos = strpos($sSubject, $sSearch);

            $i++;

            if ($i > 100)
            {

                die('remDupes() loop error');

            }

        }
        while ($pos !== false);

        return $sSubject;

    }

}

if (!function_exists('doChars'))
{

    function doChars($string)
    {

        //cyrylic transcription
        

        $cyrylicFrom = array(

            'А',

            'Б',

            'В',

            'Г',

            'Д',

            'Е',

            'Ё',

            'Ж',

            'З',

            'И',

            'Й',

            'К',

            'Л',

            'М',

            'Н',

            'О',

            'П',

            'Р',

            'С',

            'Т',

            'У',

            'Ф',

            'Х',

            'Ц',

            'Ч',

            'Ш',

            'Щ',

            'Ъ',

            'Ы',

            'Ь',

            'Э',

            'Ю',

            'Я',

            'а',

            'б',

            'в',

            'г',

            'д',

            'е',

            'ё',

            'ж',

            'з',

            'и',

            'й',

            'к',

            'л',

            'м',

            'н',

            'о',

            'п',

            'р',

            'с',

            'т',

            'у',

            'ф',

            'х',

            'ц',

            'ч',

            'ш',

            'щ',

            'ъ',

            'ы',

            'ь',

            'э',

            'ю',

            'я'
        );

        $cyrylicTo = array(

            'A',

            'B',

            'V',

            'G',

            'D',

            'Ie',

            'Io',

            'Z',

            'Z',

            'I',

            'J',

            'K',

            'L',

            'M',

            'N',

            'O',

            'P',

            'R',

            'S',

            'T',

            'U',

            'F',

            'Ch',

            'C',

            'Tch',

            'Sh',

            'Shtch',

            '',

            'Y',

            '',

            'E',

            'Iu',

            'Ia',

            'a',

            'b',

            'v',

            'g',

            'd',

            'ie',

            'io',

            'z',

            'z',

            'i',

            'j',

            'k',

            'l',

            'm',

            'n',

            'o',

            'p',

            'r',

            's',

            't',

            'u',

            'f',

            'ch',

            'c',

            'tch',

            'sh',

            'shtch',

            '',

            'y',

            '',

            'e',

            'iu',

            'ia'
        );

        $from = array(

            "Á",

            "À",

            "Â",

            "Ä",

            "Ă",

            "Ā",

            "Ã",

            "Å",

            "Ą",

            "Æ",

            "Ć",

            "Ċ",

            "Ĉ",

            "Č",

            "Ç",

            "Ď",

            "Đ",

            "Ð",

            "É",

            "È",

            "Ė",

            "Ê",

            "Ë",

            "Ě",

            "Ē",

            "Ę",

            "Ə",

            "Ġ",

            "Ĝ",

            "Ğ",

            "Ģ",

            "á",

            "à",

            "â",

            "ä",

            "ă",

            "ā",

            "ã",

            "å",

            "ą",

            "æ",

            "ć",

            "ċ",

            "ĉ",

            "č",

            "ç",

            "ď",

            "đ",

            "ð",

            "é",

            "è",

            "ė",

            "ê",

            "ë",

            "ě",

            "ē",

            "ę",

            "ə",

            "ġ",

            "ĝ",

            "ğ",

            "ģ",

            "Ĥ",

            "Ħ",

            "I",

            "Í",

            "Ì",

            "İ",

            "Î",

            "Ï",

            "Ī",

            "Į",

            "Ĳ",

            "Ĵ",

            "Ķ",

            "Ļ",

            "Ł",

            "Ń",

            "Ň",

            "Ñ",

            "Ņ",

            "Ó",

            "Ò",

            "Ô",

            "Ö",

            "Õ",

            "Ő",

            "Ø",

            "Ơ",

            "Œ",

            "ĥ",

            "ħ",

            "ı",

            "í",

            "ì",

            "i",

            "î",

            "ï",

            "ī",

            "į",

            "ĳ",

            "ĵ",

            "ķ",

            "ļ",

            "ł",

            "ń",

            "ň",

            "ñ",

            "ņ",

            "ó",

            "ò",

            "ô",

            "ö",

            "õ",

            "ő",

            "ø",

            "ơ",

            "œ",

            "Ŕ",

            "Ř",

            "Ś",

            "Ŝ",

            "Š",

            "Ş",

            "Ť",

            "Ţ",

            "Þ",

            "Ú",

            "Ù",

            "Û",

            "Ü",

            "Ŭ",

            "Ū",

            "Ů",

            "Ų",

            "Ű",

            "Ư",

            "Ŵ",

            "Ý",

            "Ŷ",

            "Ÿ",

            "Ź",

            "Ż",

            "Ž",

            "ŕ",

            "ř",

            "ś",

            "ŝ",

            "š",

            "ş",

            "ß",

            "ť",

            "ţ",

            "þ",

            "ú",

            "ù",

            "û",

            "ü",

            "ŭ",

            "ū",

            "ů",

            "ų",

            "ű",

            "ư",

            "ŵ",

            "ý",

            "ŷ",

            "ÿ",

            "ź",

            "ż",

            "ž"
        );

        $to = array(

            "A",

            "A",

            "A",

            "A",

            "A",

            "A",

            "A",

            "A",

            "A",

            "AE",

            "C",

            "C",

            "C",

            "C",

            "C",

            "D",

            "D",

            "D",

            "E",

            "E",

            "E",

            "E",

            "E",

            "E",

            "E",

            "E",

            "G",

            "G",

            "G",

            "G",

            "G",

            "a",

            "a",

            "a",

            "a",

            "a",

            "a",

            "a",

            "a",

            "a",

            "ae",

            "c",

            "c",

            "c",

            "c",

            "c",

            "d",

            "d",

            "d",

            "e",

            "e",

            "e",

            "e",

            "e",

            "e",

            "e",

            "e",

            "g",

            "g",

            "g",

            "g",

            "g",

            "H",

            "H",

            "I",

            "I",

            "I",

            "I",

            "I",

            "I",

            "I",

            "I",

            "IJ",

            "J",

            "K",

            "L",

            "L",

            "N",

            "N",

            "N",

            "N",

            "O",

            "O",

            "O",

            "O",

            "O",

            "O",

            "O",

            "O",

            "CE",

            "h",

            "h",

            "i",

            "i",

            "i",

            "i",

            "i",

            "i",

            "i",

            "i",

            "ij",

            "j",

            "k",

            "l",

            "l",

            "n",

            "n",

            "n",

            "n",

            "o",

            "o",

            "o",

            "o",

            "o",

            "o",

            "o",

            "o",

            "o",

            "R",

            "R",

            "S",

            "S",

            "S",

            "S",

            "T",

            "T",

            "T",

            "U",

            "U",

            "U",

            "U",

            "U",

            "U",

            "U",

            "U",

            "U",

            "U",

            "W",

            "Y",

            "Y",

            "Y",

            "Z",

            "Z",

            "Z",

            "r",

            "r",

            "s",

            "s",

            "s",

            "s",

            "B",

            "t",

            "t",

            "b",

            "u",

            "u",

            "u",

            "u",

            "u",

            "u",

            "u",

            "u",

            "u",

            "u",

            "w",

            "y",

            "y",

            "y",

            "z",

            "z",

            "z"
        );

        $from = array_merge($from, $cyrylicFrom);

        $to = array_merge($to, $cyrylicTo);

        $newstring = str_replace($from, $to, $string);

        return $newstring;

    }

}

if (!function_exists('sanitize'))
{

    function sanitize($string, $trim = false, $int = false, $str = false)
    {

        //$string = filter_var($string, FILTER_SANITIZE_STRING);
        

        $string = htmlentities($string, ENT_COMPAT, 'UTF-8');

        $string = trim($string);

        $string = stripslashes($string);

        $string = strip_tags($string);

        $string = str_replace(array(

            '‘',

            '’',

            '“',

            '”'
        ) , array(

            "'",

            "'",

            '"',

            '"'
        ) , $string);

        if ($trim)

        $string = substr($string, 0, $trim);

        if ($int)

        $string = preg_replace("/[^0-9\s]/", "", $string);

        if ($str)

        $string = preg_replace("/[^a-zA-Z\s]/", "", $string);

        return $string;

    }

}

if (!function_exists('cleanOut'))
{

    function cleanOut($text)
    {

        $text = strtr($text, array(

            '\r\n' => "",

            '\r' => "",

            '\n' => ""
        ));

        $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');

        $text = str_replace('<br>', '<br />', $text);

        return stripslashes($text);

    }

}

if (!function_exists('site_settings'))
{

    function site_settings()
    {

        $CI = & get_instance();

        //$CI->db->
        

        $query = $CI
            ->db
            ->query('SELECT * FROM settings where id = 1 LIMIT 1');

        $row = $query->row();

        return $row;

    }

}

if (!function_exists('getValue'))
{

    function getValue($select, $table, $where, $what)
    {

        $CI = & get_instance();

        //$CI->db->
        

        $query = $CI
            ->db
            ->query('SELECT ' . $select . ' FROM ' . $table . ' where ' . $where . ' = ' . $what . ' LIMIT 1');

        $row = $query->row();

        return $row;

    }

}

if (!function_exists('get_key'))
{

    function get_key($limit = 20)
    {

        $chars = array(

            'a',
            'b',
            'c',
            'd',
            'e',
            'f',
            'g',
            'h',
            'i',
            'j',
            'k',
            'l',
            'm',

            'n',
            'o',
            'p',
            'q',
            'r',
            's',
            't',
            'u',
            'v',
            'w',
            'x',
            'y',
            'z',

            'A',
            'B',
            'C',
            'D',
            'E',
            'F',
            'G',
            'H',
            'I',
            'J',
            'K',
            'L',
            'M',

            'N',
            'O',
            'P',
            'Q',
            'R',
            'S',
            'T',
            'U',
            'V',
            'W',
            'X',
            'Y',
            'Z',

            '0',
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9'

        );

        shuffle($chars);

        $token = '';

        for ($i = 0;$i < $limit;$i++)
        { // <-- $num_chars instead of $len
            

            $token .= $chars[mt_rand(0, $limit) ];

        }

        return $token;

    }

}

if (!function_exists('validation_errors_array'))
{

    function validation_errors_array($prefix = '', $suffix = '')
    {

        if (false === ($OBJ = & _get_validation_object()))
        {

            return '';

        }

        return $OBJ->error_array($prefix, $suffix);

    }

}

if (!function_exists('get_user_ip'))
{

    function get_user_ip()
    {

        if (getenv("HTTP_CLIENT_IP"))
        {

            $vInfo['ip'] = getenv("HTTP_CLIENT_IP");

        }
        elseif (getenv("HTTP_X_FORWARDED_FOR"))
        {

            $vInfo['ip'] = getenv('HTTP_X_FORWARDED_FOR');

        }
        elseif (getenv('REMOTE_ADDR'))
        {

            $vInfo['ip'] = getenv('REMOTE_ADDR');

        }
        elseif (isset($_SERVER['REMOTE_ADDR']))
        {

            $vInfo['ip'] = $_SERVER['REMOTE_ADDR'];

        }
        else
        {

            $vInfo['ip'] = "Unknown";

        }

        //return $vInfo['ip'];
        

        if (!preg_match("/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/i", $vInfo['ip']) && $vInfo['ip'] != "Unknown")
        {

            $pos = strpos($vInfo['ip'], ",");

            $vInfo2['ip'] = substr($vInfo['ip'], 0, $pos);

            //return $vInfo['ip']."--";
            

            if ($vInfo2['ip'] == "")
            {

                if (in_array($vInfo['ip'], ['127.0.0.1', '::1']))
                {

                    $vInfo['ip'] = "Local";

                }
                else
                {

                    $vInfo['ip'] = "Unknown";

                }

            }

        }

        $vInfo['ip'] = str_replace("[^0-9\.]", "", $vInfo['ip']);

        return $vInfo['ip'];

    }

}

// if (!function_exists('check_attampt')) {


//     function check_attampt()


//     {


//         $CI =& get_instance();


//         $CI->load->model('logsModel');


//         $ip = $CI->input->ip_address();


//         $logs = $CI->logsModel->get_log_by_ip($ip);


//         if(!$logs){


//             $data = false;


//         }else{


//             if($logs->failed >= LOGIN_ATTAMPT){


//                 $data = true;


//             }else{


//                 $data = false;


//             }


//         }


//         return $data;


//     }


// }


if (!function_exists('greetingWord'))
{

    function greetingWord()
    {

        $hour = date("G");

        if ($hour > 0 && $hour < 24)
        {

            if ($hour >= 1 && $hour < 11)

            {

                return "Good Morning " . $hour . " ";

            }
            else if ($hour >= 11 && $hour < 17)
            {

                return "Good afternoon ";

            }
            else
            {

                return "Good evening ";

            }

        }

    }

}

if (!function_exists('timesince'))
{

    function timesince($original)
    {

        $original = convertMysqlDateTimeToUnixTimeStamp($original);

        // array of time period chunks
        

        $chunks = array(

            array(
                60 * 60 * 24 * 365,
                'year'
            ) ,

            array(
                60 * 60 * 24 * 30,
                'month'
            ) ,

            array(
                60 * 60 * 24 * 7,
                'week'
            ) ,

            array(
                60 * 60 * 24,
                'day'
            ) ,

            array(
                60 * 60,
                'hour'
            ) ,

            array(
                60,
                'min'
            ) ,

            array(
                1,
                'sec'
            ) ,

        );

        $today = time();

        /* Current unix time  */

        $since = $today - $original;

        // $j saves performing the count function each time around the loop
        

        for ($i = 0, $j = count($chunks);$i < $j;$i++)
        {

            $seconds = $chunks[$i][0];

            $name = $chunks[$i][1];

            // finding the biggest chunk (if the chunk fits, break)
            

            if (($count = floor($since / $seconds)) != 0)
            {

                break;

            }

        }

        $print = ($count == 1) ? '1 ' . $name : "$count {$name}s";

        if ($i + 1 < $j)
        {

            // now getting the second item
            

            $seconds2 = $chunks[$i + 1][0];

            $name2 = $chunks[$i + 1][1];

            // add second item if its greater than 0
            

            if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0)
            {

                $print .= ($count2 == 1) ? ', 1 ' . $name2 : " $count2 {$name2}s";

            }

        }

        return $print . ' ago';

    }

}

if (!function_exists('timesincenew'))
{

    function timesincenew($time)
    {

        $time = strtotime($time);

        $time = time() - $time; // to get the time since that moment
        

        $time = ($time < 1) ? 1 : $time;

        $tokens = array(

            31536000 => 'year',

            2592000 => 'month',

            604800 => 'week',

            86400 => 'day',

            3600 => 'hour',

            60 => 'minute',

            1 => 'second'

        );

        foreach ($tokens as $unit => $text)
        {

            if ($time < $unit) continue;

            $numberOfUnits = floor($time / $unit);

            return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');

        }

    }

}

if (!function_exists('convertMysqlDateTimeToUnixTimeStamp'))
{

    function convertMysqlDateTimeToUnixTimeStamp($datetime)
    {

        list($date, $time) = explode(' ', $datetime);

        list($year, $month, $day) = explode('-', $date);

        list($hours, $minutes, $seconds) = explode(':', $time);

        $UnixTimestamp = mktime($hours, $minutes, $seconds, $month, $day, $year);

        return $UnixTimestamp;

    }

}

if (!function_exists('buildMenu'))
{

    function buildMenu($array, $ids = array() , $parent = 0)
    {

        $menu_html = '<ul class="tenss">';

        if (!empty($array))
        {

            foreach ($array as $element)
            {
                if ($element->parent_id == $parent)
                {
                    if (in_array($element->id, $ids))
                    {
                        $sell = "checked";
                    }
                    else
                    {
                        $sell = "";
                    }

                    $menu_html .= '<li>';

                    $menu_html .= '<div class="d-flex align-items-center"><input type="checkbox" ' . $sell . ' name="cats[]" id="' . $element->id . '" value="' . $element->id . '"><label class="ml-2">' . $element->title . '</label></div>';

                    $menu_html .= buildMenu($array, $ids, $element->id);

                    $menu_html .= '</li>';
                }
            }

        }
        else
        {

            $menu_html .= '<li>';

            $menu_html .= 'No Category Found!';

            $menu_html .= '</li>';

        }

        $menu_html .= '</ul>';

        return $menu_html;

    }

}

if (!function_exists('buildRelated'))
{

    function buildRelated($type = "product", $product = null)
    {

        $products = getAllProds();
        $ids = getSelRel($product, $type);

        $menu_html = '<ul>';

        if (!empty($products))
        {

            foreach ($products as $element)
            {

                if (in_array($element->id, $ids))
                {
                    $sell = "checked";
                }
                else
                {
                    $sell = "";
                }

                $menu_html .= '<li>';

                $menu_html .= '<div class="checkbox-container"><label class="checkbox-label"><input type="checkbox" ' . $sell . ' name="related[]" id="' . $element->id . '" value="' . $element->id . '"><span class="checkbox-custom rectangular"></span></label></div>' . $element->title . ' <a target="_blank" href="' . base_url("product/" . $element->slug) . '" style="color: #ffb901;">[' . $element->article . ']</a>';

                $menu_html .= '</li>';

            }

        }
        else
        {

            $menu_html .= '<li>';

            $menu_html .= 'No Product Found!';

            $menu_html .= '</li>';

        }

        $menu_html .= '</ul>';

        return $menu_html;

    }

}

if (!function_exists('getordersenderemail'))
{
    function getordersenderemail($oid)
    {
        $CI = & get_instance();
        $CI
            ->db
            ->select('ord_demo_email');
        $CI
            ->db
            ->from('order_summary');
        $CI
            ->db
            ->join('order_status', 'order_summary.ord_status = order_status.ord_status_id');
        $CI
            ->db
            ->where('order_summary.ord_order_number', $oid);
        $query = $CI
            ->db
            ->get();
        $results = $query->result();
        return $results;
    }
}

if (!function_exists('getblogCategories'))
{

    function getblogCategories($blogid)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where('blog_id', $blogid);

        $query = $CI
            ->db
            ->get('blogs_sel_categories');

        $results = $query->result();

        $view = '';

        if ($results)
        {

            foreach ($results as $result)
            {

                $view .= getextraCategoryname("blogs_categories", $result->blogcategory_id) . "<br>";

            }

        }

        return $view;

    }

}

if (!function_exists('getproductsCategories'))
{

    function getproductsCategories($productid)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where('product_id', $productid);

        $query = $CI
            ->db
            ->get('products_sel_categories');

        $results = $query->result();

        $view = '';

        if ($results)
        {

            foreach ($results as $result)
            {

                $view .= getextraCategoryname("products_categories", $result->productcategory_id) . "<br>";

            }

        }

        return $view;

    }

}
if (!function_exists('getfrontproductsCategories'))
{

    function getfrontproductsCategories($productid)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where('product_id', $productid);

        $query = $CI
            ->db
            ->get('products_sel_categories');

        $results = $query->result();

        $view = '';

        if ($results)
        {

            foreach ($results as $result)
            {

                $view .= '<a href="' . getSeoLink("products_categories", $result->productcategory_id) . '">' . getextraCategoryname("products_categories", $result->productcategory_id) . '</a>, ';

            }

        }

        return $view;

    }

}

if (!function_exists('getnewsCategories'))
{

    function getnewsCategories($newsid)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where('news_id', $newsid);

        $query = $CI
            ->db
            ->get('news_sel_categories');

        $results = $query->result();

        $view = '';

        if ($results)
        {

            foreach ($results as $result)
            {

                $view .= getextraCategoryname("news_categories", $result->newscategory_id) . "<br>";

            }

        }

        return $view;

    }

}

if (!function_exists('getgalleryCategories'))
{

    function getgalleryCategories($galleryid)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where('gallery_id', $galleryid);

        $query = $CI
            ->db
            ->get('gallery_sel_categories');

        $results = $query->result();

        $view = '';

        if ($results)
        {

            foreach ($results as $result)
            {

                $view .= getextraCategoryname("gallery_categories", $result->gallerycategory_id) . "<br>";

            }

        }

        return $view;

    }

}

function getVarmaxprice($pid)
{
    $CI = & get_instance();
    $CI
        ->db
        ->select_max('price');
    $CI
        ->db
        ->from('variations');
    $CI
        ->db
        ->join('variation_sel_products', 'variation_sel_products.variation_id = variations.id');
    $CI
        ->db
        ->where('variation_sel_products.product_id', $pid);
    $CI
        ->db
        ->where('variations.price_option', '+');
    $query = $CI
        ->db
        ->get();
    $result = $query->row();
    if (!empty($result))
    {
        return $result->price;
    }
    else
    {
        return 0;
    }
}

if (!function_exists('delFile'))
{

    function delFile($table, $column, $path, $file)
    {

        if (file_exists(UPLOADPATH . $path . $file))
        {

            $CI = & get_instance();

            $CI
                ->db
                ->where($column, $file);

            $query = $CI
                ->db
                ->get($table);

            if ($query->num_rows() > 0)
            {

                return true;

            }
            else
            {

                unlink(UPLOADPATH . $path . $file);

                return true;

            }

        }
        else
        {

            return false;

        }

    }

}

if (!function_exists('delFile2'))
{

    function delFile2($table, $column, $path, $file)
    {

        if (file_exists(UPLOADPATH . $path . $file))
        {

            $CI = & get_instance();

            $CI
                ->db
                ->where($column, $file);

            $query = $CI
                ->db
                ->get($table);

            if ($query->num_rows() > 0)
            {

                return true;

            }
            else
            {

                unlink(UPLOADPATH . $path . $file);

                if (file_exists(UPLOADPATH . $path . "small/" . $file))
                {

                    unlink(UPLOADPATH . $path . "small/" . $file);

                }

                if (file_exists(UPLOADPATH . $path . "medium/" . $file))
                {

                    unlink(UPLOADPATH . $path . "medium/" . $file);

                }

                if (file_exists(UPLOADPATH . $path . "large/" . $file))
                {

                    unlink(UPLOADPATH . $path . "large/" . $file);

                }

                return true;

            }

        }
        else
        {

            return false;

        }

    }

}

if (!function_exists('getextraCategoryname'))
{

    function getextraCategoryname($cat_table, $blogcategoryid)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->select('title');

        $CI
            ->db
            ->where('id', $blogcategoryid);

        $query = $CI
            ->db
            ->get($cat_table);

        $result = $query->row();

        if (isset($result))
        {

            return $result->title;

        }
        else
        {

            return "Root";

        }

    }

}

function getvariationGroups($pid = 0)

{

    $CI = & get_instance();
    //     $query = $CI->db->query('SELECT id, title, type FROM `variation_sel_products`
    // join variation_group on variation_group.id = variation_sel_products.group_id
    // where variation_sel_products.product_id = 268
    // GROUP by variation_sel_products.group_id');
    $CI
        ->db
        ->select('id, title, type, is_color, is_required, affect_price');

    $CI
        ->db
        ->from('variation_sel_products');

    $CI
        ->db
        ->join('variation_group', 'variation_group.id = variation_sel_products.group_id');

    $CI
        ->db
        ->where('product_id', $pid);

    $CI
        ->db
        ->where('is_active', '1');

    $CI
        ->db
        ->group_by('group_id');

    $CI
        ->db
        ->order_by("sort", "asc");

    $query = $CI
        ->db
        ->get();

    if ($query->num_rows() > 0)
    {

        return $query->result();

    }
    else
    {

        return false;

    }

}

function getvariationOptions($groupid = 0, $prodpid = 0)

{

    $CI = & get_instance();

    $CI
        ->db
        ->select('id, title, sku, price, price_option, detail, qty, color, image');

    $CI
        ->db
        ->from('variation_sel_products');

    $CI
        ->db
        ->join('variations', 'variations.id = variation_sel_products.variation_id');

    $CI
        ->db
        ->where('variation_sel_products.group_id', $groupid);
    $CI
        ->db
        ->where('variation_sel_products.product_id', $prodpid);

    $CI
        ->db
        ->order_by("variations.sort", "asc");

    $query = $CI
        ->db
        ->get();

    if ($query->num_rows() > 0)
    {

        return $query->result();

    }
    else
    {

        return false;

    }

}

function getprdVariation($pid = 0)

{
    $CI = & get_instance();

    $CI
        ->load
        ->library('Flexi_cart');

    $groups = getvariationGroups($pid);

    if ($groups)
    {

        $x = 0;

        $returndata = '<div class="prdoptions">';

        foreach ($groups as $group)
        {

            $variations = getvariationOptions($group->id, $pid);

            if ($group->is_required == "1")
            {
                $reqfield = 'required="required"';
                $reqcheckbox = 'class="checkreq"';
                $reqstar = ' <span style="color:red">*</span>';
            }
            else
            {
                $reqfield = '';
                $reqcheckbox = '';
                $reqstar = '';
            }

            $returndata .= '<div class="form-group goption' . $x . '">';

            $returndata .= '<label>Select ' . $group->title . $reqstar . '</label>';

            if ($group->type == "select")
            {

                $returndata .= '<select class="optionselect form-control" name="options[]" ' . $reqfield . '>';

                $returndata .= '<option value="">Choose an Option</option>';

                if ($variations)
                {

                    foreach ($variations as $variation)
                    {

                        if ($group->affect_price == '1')
                        {

                            if ($variation->price <= 0)
                            {
                                $addprc = '';
                                $gvdd = "0,";
                            }
                            else
                            {

                                $addprc = $variation->price_option . " " . $CI
                                    ->flexi_cart
                                    ->get_currency_symbol() . $variation->price;

                                $gvdd = $variation->id . ",";

                            }

                        }
                        else
                        {

                            $addprc = '';

                            $gvdd = "0,";

                        }

                        $returndata .= '<option data-optionv="' . $group->id . ',' . $variation->id . '" value="' . $gvdd . $group->title . " - " . $variation->title . '">' . $variation->title . ' ' . $addprc . '</option>';

                    }

                }

                $returndata .= '</select>';

            }
            elseif ($group->type == "check")
            {

                if ($variations)
                {

                    $returndata .= '<div class="checkbox marlab">';

                    foreach ($variations as $variation)
                    {

                        if ($group->affect_price == '1')
                        {

                            if ($variation->price <= 0)
                            {
                                $addprc = '';
                                $gvdd = "0,";
                            }
                            else
                            {

                                $addprc = $variation->price_option . " " . $CI
                                    ->flexi_cart
                                    ->get_currency_symbol() . $variation->price;

                                $gvdd = $variation->id . ",";

                            }

                        }
                        else
                        {

                            $addprc = '';

                            $gvdd = "0,";

                        }

                        $returndata .= '<label><input ' . $reqcheckbox . ' name="options[]" type="checkbox" value="' . $gvdd . $group->title . " - " . $variation->title . '">' . $variation->title . ' ' . $addprc . '</label>';

                    }

                    $returndata .= '</div>';

                }

            }
            elseif ($group->type == "radio")
            {

                if ($variations)
                {

                    $returndata .= '<div class="radio marlab row">';

                    foreach ($variations as $variation)
                    {

                        if ($group->affect_price == '1')
                        {

                            if ($variation->price <= 0)
                            {
                                $addprc = '';
                                $gvdd = "0,";
                            }
                            else
                            {

                                $addprc = $variation->price_option . " " . $CI
                                    ->flexi_cart
                                    ->get_currency_symbol() . $variation->price;

                                $gvdd = $variation->id . ",";

                            }

                        }
                        else
                        {

                            $addprc = '';

                            $gvdd = "0,";

                        }

                        $returndata .= '<div class="col-md-6"><label><input class="optionradio" data-optionv="' . $group->id . ',' . $variation->id . '" ' . $reqfield . ' name="options[]" type="radio" value="' . $gvdd . $group->title . " - " . $variation->title . '"><p class="m-0 ml-2">' . $variation->title . ' ' . $addprc . '</p></label></div>';

                    }

                    $returndata .= '</div>';

                }

            }

            $returndata .= '</div>';

            $x++;
        }

        $returndata .= '</div>';

    }
    else
    {

        $returndata = "";

    }

    return $returndata;

    // return $groups;
    
}

if (!function_exists('getvariationbygroupid'))
{

    function getvariationbygroupid($groupid)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where('group_id', $groupid);

        $query = $CI
            ->db
            ->get('variations');

        $results = $query->result();

        $return = count($results);

        return $return;

    }

}

if (!function_exists('getmoreviewsbyproductid'))
{

    function getmoreviewsbyproductid($productid)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where('product_id', $productid);

        $query = $CI
            ->db
            ->get('moreviews');

        $results = $query->result();

        $return = count($results);

        return $return;

    }

}

if (!function_exists('getmoreviews'))
{

    function getmoreviews($productid)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where('product_id', $productid);

        $query = $CI
            ->db
            ->get('moreviews');

        $results = $query->result();

        return $results;

    }

}

if (!function_exists('getValues'))
{

    function getValues($table, $where = null, $what = null, $limit = null, $order = null, $orders = null, $notin = null, $where2 = null, $what2 = null, $offset = 0)

    {

        $CI = & get_instance();

        if ($where)
        {
            $CI
                ->db
                ->where($where, $what);
        }

        if ($where2)
        {
            $CI
                ->db
                ->where($where2, $what2);
        }

        if ($notin)
        {
            $CI
                ->db
                ->where_not_in("id", $notin);
        }

        if ($order)
        {
            $CI
                ->db
                ->order_by($order, $orders);
        }

        if ($offset != 0)
        {

            $query = $CI
                ->db
                ->get($table, $limit, $offset);

        }
        elseif ($limit)
        {

            $query = $CI
                ->db
                ->get($table, $limit);

        }
        else
        {

            $query = $CI
                ->db
                ->get($table);

        }

        $results = $query->result();

        return $results;

    }

}

if (!function_exists('getValuesCategories'))
{

    function getValuesCategories($table, $categorytable, $tableidname, $categoryidname, $catid = null, $limit = null, $order = null, $orders = null, $notin = null, $offset = 0)

    {

        $CI = & get_instance();

        if ($orders)
        {

            $gorder = " ORDER BY $table.$order $orders ";

        }
        elseif ($order)
        {

            $gorder = " ORDER BY $table.$order ASC ";

        }
        else
        {

            $gorder = " ORDER BY $table.sort ASC ";

        }

        if ($offset != 0)
        {

            $glimit = " LIMIT " . intval($limit) . " OFFSET " . intval($offset);

        }
        elseif ($limit)
        {

            $glimit = " LIMIT " . intval($limit);

        }
        else
        {

            $glimit = "";

        }

        if ($notin)
        {

            if (is_array($notin))
            {

                $notinim = implode(",", $notin);

            }
            else
            {

                $notinim = $notin;

            }

            $gnotin = " AND $table.id NOT IN ($notinim) ";

        }
        else
        {

            $gnotin = "";

        }

        $gwhere = " AND $table.is_active = '1' ";

        $query = $CI
            ->db
            ->query("SELECT $table.* FROM $categorytable JOIN $table ON $categorytable.$tableidname = $table.id WHERE $categorytable.$categoryidname = $catid $gnotin $gwhere $gorder $glimit");

        $results = $query->result();

        return $results;

    }

}

if (!function_exists('getValuee'))
{

    function getValuee($select, $table, $where, $what, $where2 = null, $what2 = null)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->select($select);

        $CI
            ->db
            ->where($where, $what);

        if ($where2)
        {

            $CI
                ->db
                ->where($where2, $what2);

        }

        $query = $CI
            ->db
            ->get($table);

        $result = $query->row();

        if (isset($result))
        {

            return $result->$select;

        }
        else
        {

            return "";

        }

    }

}

if (!function_exists('getSingleValuee'))
{

    function getSingleValuee($table, $where, $what)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where($where, $what);

        $query = $CI
            ->db
            ->get($table);

        if ($query->num_rows() > 0)
        {

            return $query->row();

        }
        else
        {

            return false;

        }

    }

}

if (!function_exists('getParentwithlink'))
{

    function getParentwithlink($table, $path, $id)
    {

        $parent = getValuee("parent_id", $table, "id", $id);

        if ($parent == 0)
        {

            return "Parent";

        }
        else
        {

            $parentid = getValuee("parent_id", $table, "id", $parent);

            $alink = '<a class="nlink" href="' . base_url() . ADMIN_FOLDER . $path . $parentid . '">' . getValuee("title", $table, "id", $parent) . '</a>';

            return $alink;

        }

    }

}

if (!function_exists('checkParentif'))
{

    function checkParentif($table, $id)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where('parent_id', $id);

        $query = $CI
            ->db
            ->get($table);

        $pp = $query->row();

        if (isset($pp))
        {

            return 1;

        }
        else
        {

            return 0;

        }

    }

}

if (!function_exists('countryOptions'))
{

    function countryOptions($sel = "none")
    {

        $CI = & get_instance();

        $query = $CI
            ->db
            ->get("countries");

        $results = $query->result();

        $rreturn = '';

        if (isset($results))
        {

            foreach ($results as $result)
            {

                if ($result->name == $sel)
                {
                    $select = "selected";
                }
                else
                {
                    $select = "";
                }

                $rreturn .= '<option ' . $select . ' value="' . $result->name . '">' . $result->name . '</option>';

            }

        }

        return $rreturn;

    }

}

if (!function_exists('geturlsegment'))
{

    function geturlsegment($endslug, $fullurl)
    {

        $urlpath = "";

        if (is_numeric($endslug))
        {

            $xss = explode("/", $fullurl);

            array_splice($xss, count($xss) - 2, 2);

            foreach ($xss as $xs)
            {

                $urlpath .= $xs . "/";

            }

            $urlpath = rtrim($urlpath, "/");

        }
        else
        {

            $urlpath = $fullurl;

        }

        return $urlpath;

    }

}

if (!function_exists('newperc'))
{

    function newperc($html)
    {

        $out = preg_replace_callback(

        "/<img[\s\S]*?>/",

        function ($m)
        {

            $image = $m[0];

            preg_match('/<img(.*)src(.*)=(.*)"(.*)"/U', $image, $result);

            $imgpath = explode(".", array_pop($result));

            array_pop($imgpath);

            $nnp = implode(".", $imgpath);

            $returndata = '

                <picture>

                    <source srcset="' . $nnp . '.webp" type="image/webp">

                    ' . $image . '

                </picture>

                ';

            return $returndata;

        }
        ,

        $html);

        return $out;

        // require_once('Simple_html_dom.php');
        // $dom = new Simple_html_dom();
        // $dom->load($htmlc);
        //$images = $dom->find('img');
        // foreach($dom->find('img') as $a){
        //     $a->outertext = '<div id="wrapper">';
        //     $a->outertext = '</div>';
        // }
        

        // foreach ($images as $image) {
        

        //     $div = $dom->createElement('div');
        //     $div->appendChild($image);
        

        // }
        

        //$dom->find('img',0)->outertext = '<div id="wrapper">' . $html->find('img',0)->outertext. '</div>';
        

        // foreach($dom->find('img') as $elem) {
        //     $elem->outertext = '<div id="wrapper">';
        //     $elem->outertext = $elem->innertext;
        //     $elem->outertext = '</div>';
        

        // }
        

        // foreach($dom->find('img') as $e){
        

        // }
        

        //$newhtml = $dom->find('img')->outertext = '<div id="wrapper">' . $dom->find('img')->outertext. '</div>';
        

        //return $dom->save();
        // $CI =& get_instance();
        // $CI->load->helper('simple_html_dom');
        // $html = str_get_html($htmlc)
        // return $html;
        // $iimgg = $html->find('img');
        // foreach($iimgg as $e){
        //     echo $e."<br>";
        // }
        
    }

}

if (!function_exists('convertiimg'))
{

    function convertiimg($file)
    {

        $xs = explode(".", $file);

        return base_url($xs[0] . ".webp");

    }

}

if (!function_exists('randomPassword'))
{

    function randomPassword($limit = 8)
    {

        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";

        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0;$i < $limit;$i++)
        {

            $n = rand(0, $alphaLength);

            $pass[] = $alphabet[$n];

        }

        return implode($pass); //turn the array into a string
        
    }

}

if (!function_exists('getMeta'))
{

    function getMeta($table, $id, $cms = null)
    {

        $result = site_settings();

        if ($table == "settings")
        {

            $bbnnimg = base_url("files/frontend/images/logo.png");

            list($iwidth, $iheight) = getimagesize($bbnnimg);

            if (isset($result))
            {

                $metas = array(

                    '<meta charset="utf-8">',

                    '<meta http-equiv="X-UA-Compatible" content="IE=edge">',

                    '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />',

                    '<title>' . $result->meta_title . '</title>',

                    '<meta name="keywords" content="' . $result->meta_key . '"/>',

                    '<meta name="description" content="' . $result->meta_desc . '"/>',

                    '<meta name="robots" content="index" />',

                    '<meta name="robots" content="follow" />',

                    '<meta name="revisit-after" content="1 day" />',

                    '<meta name="generator" content="Powered by Tecmyer IT Services" />',

                    '<link rel="canonical" href="' . base_url() . '">',

                    '<meta property="og:locale" content="en_US" />',

                    '<meta property="og:type" content="object" />',

                    '<meta property="og:title" content="' . $result->meta_title . '" />',

                    '<meta property="og:description" content="' . $result->meta_desc . '" />',

                    '<meta property="og:url" content="' . base_url() . '" />',

                    '<meta property="og:site_name" content="' . $result->company_name . '" />',

                    '<meta property="og:image" content="' . $bbnnimg . '" />',

                    '<meta property="og:image:secure_url" content="' . $bbnnimg . '" />',

                    '<meta property="og:image:width" content="' . $iwidth . '" />',

                    '<meta property="og:image:height" content="' . $iheight . '" />',

                    '<link rel="shortcut icon" type="image/x-icon" href="' . base_url() . 'files/frontend/favicon.ico" />',

                    '<link rel="icon" href="' . base_url("files/frontend/favicon.gif") . '" type="image/gif" >'

                );

            }
            else
            {

                $metas = array();

            }

        }
        elseif ($table == "author")
        {

            $bbnnimg = base_url("files/frontend/images/logo.png");

            list($iwidth, $iheight) = getimagesize($bbnnimg);

            $metas = array(

                '<meta charset="utf-8">',

                '<meta http-equiv="X-UA-Compatible" content="IE=edge">',

                '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />',

                '<title>' . $id->name . ' ' . $cms->meta_title . '</title>',

                '<meta name="keywords" content="' . $id->name . ' ' . $cms->meta_key . '"/>',

                '<meta name="description" content="' . $id->name . ' ' . $cms->meta_desc . '"/>',

                '<meta name="robots" content="index" />',

                '<meta name="robots" content="follow" />',

                '<meta name="revisit-after" content="1 day" />',

                '<meta name="generator" content="Powered by Tecmyer IT Services" />',

                '<link rel="canonical" href="' . base_url("author/" . $id->username . "/") . '">',

                '<meta property="og:locale" content="en_US" />',

                '<meta property="og:type" content="object" />',

                '<meta property="og:title" content="' . $id->name . ' ' . $cms->meta_title . '" />',

                '<meta property="og:description" content="' . $id->name . ' ' . $cms->meta_desc . '" />',

                '<meta property="og:url" content="' . base_url("author/" . $id->username . "/") . '" />',

                '<meta property="og:site_name" content="' . $result->company_name . '" />',

                '<meta property="og:image" content="' . $bbnnimg . '" />',

                '<meta property="og:image:secure_url" content="' . $bbnnimg . '" />',

                '<meta property="og:image:width" content="' . $iwidth . '" />',

                '<meta property="og:image:height" content="' . $iheight . '" />',

                '<link rel="shortcut icon" type="image/x-icon" href="' . base_url() . 'files/frontend/favicon.ico" />',

                '<link rel="icon" href="' . base_url("files/frontend/favicon.gif") . '" type="image/gif" >'

            );

        }
        elseif ($table == "tags")
        {

            $bbnnimg = base_url("files/frontend/images/logo.png");

            list($iwidth, $iheight) = getimagesize($bbnnimg);

            $metas = array(

                '<meta charset="utf-8">',

                '<meta http-equiv="X-UA-Compatible" content="IE=edge">',

                '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />',

                '<title>' . $id->normal_tag . ' Archives - ' . $result->company_name . '</title>',

                '<meta name="keywords" content="' . $id->normal_tag . ' ' . $cms->meta_key . '"/>',

                '<meta name="description" content="' . $id->normal_tag . ' Archives"/>',

                '<meta name="robots" content="index" />',

                '<meta name="robots" content="follow" />',

                '<meta name="revisit-after" content="1 day" />',

                '<link rel="canonical" href="' . base_url("keywords/" . $id->seo_tag . "/") . '">',

                '<meta property="og:locale" content="en_US" />',

                '<meta property="og:type" content="object" />',

                '<meta property="og:title" content="' . $id->normal_tag . ' Archives - ' . $result->company_name . '" />',

                '<meta property="og:description" content="' . $id->normal_tag . ' Archives" />',

                '<meta property="og:url" content="' . base_url("keywords/" . $id->seo_tag . "/") . '" />',

                '<meta property="og:site_name" content="' . $result->company_name . '" />',

                '<meta property="og:image" content="' . $bbnnimg . '" />',

                '<meta property="og:image:secure_url" content="' . $bbnnimg . '" />',

                '<meta property="og:image:width" content="' . $iwidth . '" />',

                '<meta property="og:image:height" content="' . $iheight . '" />',

                '<meta name="generator" content="Powered by Tecmyer IT Services" />',

                '<link rel="shortcut icon" type="image/x-icon" href="' . base_url() . 'files/frontend/favicon.ico" />',

                '<link rel="icon" href="' . base_url("files/frontend/favicon.gif") . '" type="image/gif" >'

            );

        }
        elseif ($table == "search")
        {

            $bbnnimg = base_url("files/frontend/images/logo.png");

            list($iwidth, $iheight) = getimagesize($bbnnimg);

            $metas = array(

                '<meta charset="utf-8">',

                '<meta http-equiv="X-UA-Compatible" content="IE=edge">',

                '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />',

                '<title>You searched for ' . $id . ' - ' . $cms->meta_title . $result->company_name . '</title>',

                '<meta name="keywords" content="' . $cms->meta_key . $id . ',search,products"/>',

                '<meta name="description" content="' . $cms->meta_desc . ' - ' . $result->company_name . '"/>',

                '<meta name="robots" content="index" />',

                '<meta name="robots" content="follow" />',

                '<meta name="revisit-after" content="1 day" />',

                '<link rel="canonical" href="' . base_url("search/" . $id . "/") . '">',

                '<meta property="og:locale" content="en_US" />',

                '<meta property="og:type" content="object" />',

                '<meta property="og:title" content="You searched for ' . $id . ' - ' . $cms->meta_title . $result->company_name . '" />',

                '<meta property="og:description" content="' . $cms->meta_desc . ' - ' . $result->company_name . '" />',

                '<meta property="og:url" content="' . base_url("search/" . $id . "/") . '" />',

                '<meta property="og:site_name" content="' . $result->company_name . '" />',

                '<meta property="og:image" content="' . $bbnnimg . '" />',

                '<meta property="og:image:secure_url" content="' . $bbnnimg . '" />',

                '<meta property="og:image:width" content="' . $iwidth . '" />',

                '<meta property="og:image:height" content="' . $iheight . '" />',

                '<meta name="generator" content="Powered by Tecmyer IT Services" />',

                '<link rel="shortcut icon" type="image/x-icon" href="' . base_url() . 'files/frontend/favicon.ico" />',

                '<link rel="icon" href="' . base_url("files/frontend/favicon.gif") . '" type="image/gif" >'

            );

        }
        elseif ($table == "cart")
        {

            $bbnnimg = base_url("files/frontend/images/logo.png");

            list($iwidth, $iheight) = getimagesize($bbnnimg);

            $metas = array(

                '<meta charset="utf-8">',

                '<meta http-equiv="X-UA-Compatible" content="IE=edge">',

                '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />',

                '<title>Cart - ' . $result->company_name . '</title>',

                '<meta name="keywords" content="cart,inquiry,basket"/>',

                '<meta name="description" content="Cart page - ' . $result->company_name . '"/>',

                '<meta name="robots" content="index" />',

                '<meta name="robots" content="follow" />',

                '<meta name="revisit-after" content="1 day" />',

                '<link rel="canonical" href="' . base_url("cart/") . '">',

                '<meta property="og:locale" content="en_US" />',

                '<meta property="og:type" content="object" />',

                '<meta property="og:title" content="Cart - ' . $result->company_name . '" />',

                '<meta property="og:description" content="Cart page - ' . $result->company_name . '" />',

                '<meta property="og:url" content="' . base_url("cart/") . '" />',

                '<meta property="og:site_name" content="' . $result->company_name . '" />',

                '<meta property="og:image" content="' . $bbnnimg . '" />',

                '<meta property="og:image:secure_url" content="' . $bbnnimg . '" />',

                '<meta property="og:image:width" content="' . $iwidth . '" />',

                '<meta property="og:image:height" content="' . $iheight . '" />',

                '<meta name="generator" content="Powered by Tecmyer IT Services" />',

                '<link rel="shortcut icon" type="image/x-icon" href="' . base_url() . 'files/frontend/favicon.ico" />',

                '<link rel="icon" href="' . base_url("files/frontend/favicon.gif") . '" type="image/gif" >'

            );

        }
        elseif ($table == "paypal")
        {

            $bbnnimg = base_url("files/frontend/images/logo.png");

            list($iwidth, $iheight) = getimagesize($bbnnimg);

            $metas = array(

                '<meta charset="utf-8">',

                '<meta http-equiv="X-UA-Compatible" content="IE=edge">',

                '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />',

                '<title>Payment - ' . $result->company_name . '</title>',

                '<meta name="keywords" content="cart,inquiry,basket"/>',

                '<meta name="description" content="Payment - ' . $result->company_name . '"/>',

                '<meta name="robots" content="index" />',

                '<meta name="robots" content="follow" />',

                '<meta name="revisit-after" content="1 day" />',

                '<link rel="canonical" href="' . base_url("cart/") . '">',

                '<meta property="og:locale" content="en_US" />',

                '<meta property="og:type" content="object" />',

                '<meta property="og:title" content="Payment - ' . $result->company_name . '" />',

                '<meta property="og:description" content="Payment - ' . $result->company_name . '" />',

                '<meta property="og:url" content="' . base_url("cart/") . '" />',

                '<meta property="og:site_name" content="' . $result->company_name . '" />',

                '<meta property="og:image" content="' . $bbnnimg . '" />',

                '<meta property="og:image:secure_url" content="' . $bbnnimg . '" />',

                '<meta property="og:image:width" content="' . $iwidth . '" />',

                '<meta property="og:image:height" content="' . $iheight . '" />',

                '<meta name="generator" content="Powered by Tecmyer IT Services" />',

                '<link rel="shortcut icon" type="image/x-icon" href="' . base_url() . 'files/frontend/favicon.ico" />',

                '<link rel="icon" href="' . base_url("files/frontend/favicon.gif") . '" type="image/gif" >'

            );

        }
        elseif ($table == "storeprd")
        {

            $bbnnimg = base_url("files/frontend/images/logo.png");

            list($iwidth, $iheight) = getimagesize($bbnnimg);

            $metas = array(

                '<meta charset="utf-8">',

                '<meta http-equiv="X-UA-Compatible" content="IE=edge">',

                '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />',

                '<title>Store Products - ' . $result->company_name . '</title>',

                '<meta name="keywords" content="Store, Products"/>',

                '<meta name="description" content="Store all Products - ' . $result->company_name . '"/>',

                '<meta name="robots" content="index" />',

                '<meta name="robots" content="follow" />',

                '<meta name="revisit-after" content="1 day" />',

                '<link rel="canonical" href="' . base_url("product-category/") . '">',

                '<meta property="og:locale" content="en_US" />',

                '<meta property="og:type" content="object" />',

                '<meta property="og:title" content="Store Products - ' . $result->company_name . '" />',

                '<meta property="og:description" content="Store All Products - ' . $result->company_name . '" />',

                '<meta property="og:url" content="' . base_url("product-category/") . '" />',

                '<meta property="og:site_name" content="' . $result->company_name . '" />',

                '<meta property="og:image" content="' . $bbnnimg . '" />',

                '<meta property="og:image:secure_url" content="' . $bbnnimg . '" />',

                '<meta property="og:image:width" content="' . $iwidth . '" />',

                '<meta property="og:image:height" content="' . $iheight . '" />',

                '<meta name="generator" content="Powered by Tecmyer IT Services" />',

                '<link rel="shortcut icon" type="image/x-icon" href="' . base_url() . 'files/frontend/favicon.ico" />',

                '<link rel="icon" href="' . base_url("files/frontend/favicon.gif") . '" type="image/gif" >'

            );

        }
        else
        {

            $CI = & get_instance();

            $CI
                ->db
                ->where("id", $id);

            $query = $CI
                ->db
                ->get($table);

            $result2 = $query->row();

            if (isset($result2))
            {

                if ($result2->meta_title == "" || $result2->meta_key == "" || $result2->meta_desc == "")
                {

                    $metas = site_settings();

                }

                if ($result2->meta_title == "")
                {

                    $meta_title_is = $result2->title . " - " . $metas->company_name;

                }
                else
                {

                    $meta_title_is = $result2->meta_title;

                }

                if ($result2->meta_key == "")
                {

                    $meta_keyword_is = '';

                }
                else
                {

                    $meta_keyword_is = $result2->meta_key;

                }

                if ($result2->meta_desc == "")
                {

                    if ($table == "products")
                    {

                        $short_detail = getValuee("short_detail", "products", "id", $id);

                        if ($short_detail == "")
                        {

                            $full_detail = strip_tags(cleanOut(getValuee("full_detail", "products", "id", $id)));

                            $meta_description_is = substr($full_detail, 0, 160);

                        }
                        else
                        {

                            $meta_description_is = substr($short_detail, 0, 160);

                        }

                    }
                    else
                    {

                        $full_detail = strip_tags(cleanOut(getValuee("content", $table, "id", $id)));

                        $meta_description_is = substr($full_detail, 0, 160);

                    }

                }
                else
                {

                    $meta_description_is = $result2->meta_desc;

                }

                $meta_description_is = preg_replace('/[ \t]+/', ' ', preg_replace('/[\r\n]+/', "\n", $meta_description_is));

                if ($table == "blogs")
                {

                    $category_id = getValuee("blogcategory_id", "blogs_sel_categories", "blog_id", $id);

                    $category_name = getValuee("title", "blogs_categories", "id", $category_id);

                    $fblog = getSingleValuee("blogs", "id", $id);

                    if ($fblog->thumbnail != "")
                    {

                        $bbnnimg = base_url() . "uploads/blog/" . $fblog->thumbnail;

                    }
                    else
                    {

                        $bbnnimg = base_url("files/frontend/images/logo.png");

                    }

                    list($iwidth, $iheight) = getimagesize($bbnnimg);

                    $metas = array(

                        '<meta charset="utf-8">',

                        '<meta http-equiv="X-UA-Compatible" content="IE=edge">',

                        '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />',

                        '<title>' . $meta_title_is . '</title>',

                        '<meta name="keywords" content="' . $meta_keyword_is . '"/>',

                        '<meta name="description" content="' . $meta_description_is . '"/>',

                        '<meta name="robots" content="index" />',

                        '<meta name="robots" content="follow" />',

                        '<meta name="revisit-after" content="1 day" />',

                        '<link rel="canonical" href="' . getSeoLink($table, $id) . '">',

                        '<meta property="og:locale" content="en_US" />',

                        '<meta property="og:type" content="article" />',

                        '<meta property="og:title" content="' . $meta_title_is . '" />',

                        '<meta property="og:description" content="' . $meta_description_is . '" />',

                        '<meta property="og:url" content="' . getSeoLink($table, $id) . '" />',

                        '<meta property="og:site_name" content="' . $result->company_name . '" />',

                        '<meta property="article:section" content="' . $category_name . '" />',

                        '<meta property="article:published_time" content="' . $fblog->created . '" />',

                        '<meta property="article:modified_time" content="' . $fblog->updated . '" />',

                        '<meta property="og:updated_time" content="' . $fblog->updated . '" />',

                        '<meta property="og:image" content="' . $bbnnimg . '" />',

                        '<meta property="og:image:secure_url" content="' . $bbnnimg . '" />',

                        '<meta property="og:image:width" content="' . $iwidth . '" />',

                        '<meta property="og:image:height" content="' . $iheight . '" />',

                        '<meta name="generator" content="Powered by Tecmyer IT Services" />',

                        '<link rel="shortcut icon" type="image/x-icon" href="' . base_url() . 'files/frontend/favicon.ico" />',

                        '<link rel="icon" href="' . base_url("files/frontend/favicon.gif") . '" type="image/gif" >'

                    );

                }
                else
                {

                    $contr = $CI
                        ->uri
                        ->segment(1);

                    if ($contr == "product-category")
                    {

                        if ($result2->thumbnail != "")
                        {

                            $bbnnimg = base_url() . "uploads/products/categories/" . $result2->thumbnail;

                        }
                        else
                        {

                            $bbnnimg = base_url("files/frontend/images/logo.png");

                        }

                        list($iwidth, $iheight) = getimagesize($bbnnimg);

                    }
                    elseif ($contr == "topics")
                    {

                        if ($result2->thumbnail != "")
                        {

                            $bbnnimg = base_url() . "uploads/blog/categories/" . $result2->thumbnail;

                        }
                        else
                        {

                            $bbnnimg = base_url("files/frontend/images/logo.png");

                        }

                        list($iwidth, $iheight) = getimagesize($bbnnimg);

                    }
                    elseif ($contr == "product")
                    {

                        if ($result2->image != "")
                        {

                            $bbnnimg = base_url() . "uploads/products/medium/" . $result2->image;

                        }
                        else
                        {

                            $bbnnimg = base_url("files/frontend/images/logo.png");

                        }

                        list($iwidth, $iheight) = getimagesize($bbnnimg);

                    }
                    else
                    {

                        if ($result2->thumbnail != "")
                        {

                            $bbnnimg = base_url() . "uploads/pages/" . $result2->thumbnail;

                        }
                        else
                        {

                            $bbnnimg = base_url("files/frontend/images/logo.png");

                        }

                        list($iwidth, $iheight) = getimagesize($bbnnimg);

                    }

                    $metas = array(

                        '<meta charset="utf-8">',

                        '<meta http-equiv="X-UA-Compatible" content="IE=edge">',

                        '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />',

                        '<title>' . $meta_title_is . '</title>',

                        '<meta name="keywords" content="' . $meta_keyword_is . '"/>',

                        '<meta name="description" content="' . $meta_description_is . '"/>',

                        '<meta name="custom1" content="' . $CI
                            ->uri
                            ->segment(1) . '"/>',

                        '<meta name="robots" content="index" />',

                        '<meta name="robots" content="follow" />',

                        '<meta name="revisit-after" content="1 day" />',

                        '<link rel="canonical" href="' . getSeoLink($table, $id) . '">',

                        '<meta property="og:locale" content="en_US" />',

                        '<meta property="og:type" content="object" />',

                        '<meta property="og:title" content="' . $meta_title_is . '" />',

                        '<meta property="og:description" content="' . $meta_description_is . '" />',

                        '<meta property="og:url" content="' . getSeoLink($table, $id) . '" />',

                        '<meta property="og:site_name" content="' . $result->company_name . '" />',

                        '<meta property="og:image" content="' . $bbnnimg . '" />',

                        '<meta property="og:image:secure_url" content="' . $bbnnimg . '" />',

                        '<meta property="og:image:width" content="' . $iwidth . '" />',

                        '<meta property="og:image:height" content="' . $iheight . '" />',

                        '<meta name="generator" content="Powered by Tecmyer IT Services" />',

                        '<link rel="shortcut icon" type="image/x-icon" href="' . base_url() . 'files/frontend/favicon.ico" />',

                        '<link rel="icon" href="' . base_url("files/frontend/favicon.gif") . '" type="image/gif" >'

                    );

                }

            }
            else
            {

                $metas = array();

            }

        }

        return $metas;

    }

}

if (!function_exists('getTags'))
{

    function getTags($type, $id)
    {

        $alltags = '';

        if ($type == "blogs")
        {

            $tags = getValues("tags", "t_table", "blogs", null, null, null, null, "t_table_id", $id);

            if (!empty($tags))
            {

                $alltags = '';

                foreach ($tags as $tag)
                {

                    $alltags .= '<a href="' . base_url("keywords/" . $tag->seo_tag) . '/">' . $tag->normal_tag . '</a>, ';

                }

            }
            else
            {

                $alltags = "N/A";

            }

        }
        elseif ($type == "products")
        {

            $tags = getValues("tags", "t_table", "products", null, null, null, null, "t_table_id", $id);

            if (!empty($tags))
            {

                $alltags = '';

                foreach ($tags as $tag)
                {

                    $alltags .= '<a href="' . base_url() . "product-tag/" . $tag->seo_tag . '/">' . $tag->normal_tag . '</a>, ';

                }

            }
            else
            {

                $alltags = "N/A";

            }

        }

        return $alltags;

    }

}

if (!function_exists('getCmsN'))
{

    function getCmsN($id)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->select("title");

        $CI
            ->db
            ->where("id", $id);

        $query = $CI
            ->db
            ->get("cms");

        $result = $query->row();

        if (isset($result))
        {

            return $result->title;

        }
        else
        {

            return "";

        }

    }

}

if (!function_exists('getCmsold'))
{

    function getCmsold($id, $replace = false)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->select("content");

        $CI
            ->db
            ->where("id", $id);

        $query = $CI
            ->db
            ->get("cms");

        $result = $query->row();

        if (isset($result))
        {

            $content = tecShortcodes(cleanOut($result->content) , $replace);

            return $content;

        }
        else
        {

            return "";

        }

    }

}

if (!function_exists('getCms'))
{

    function getCms($id)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->select("content");

        $CI
            ->db
            ->where("id", $id);

        $query = $CI
            ->db
            ->get("cms");

        $result = $query->row();

        if (isset($result))
        {

            $content = shortCodex($result->content);

            return $content;

        }
        else
        {

            return "";

        }

    }

}

if (!function_exists('getBlog'))
{

    function getBlog($id, $replace = false)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->select("content");

        $CI
            ->db
            ->where("id", $id);

        $query = $CI
            ->db
            ->get("blogs");

        $result = $query->row();

        if (isset($result))
        {

            $content = tecShortcodes(cleanOut($result->content) , $replace);

            return $content;

        }
        else
        {

            return "";

        }

    }

}

if (!function_exists('getCatContent'))
{

    function getCatContent($id, $replace = false)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->select("content");

        $CI
            ->db
            ->where("id", $id);

        $query = $CI
            ->db
            ->get("products_categories");

        $result = $query->row();

        if (isset($result))
        {

            $content = tecShortcodes(cleanOut($result->content) , $replace);

            return $content;

        }
        else
        {

            return "";

        }

    }

}

if (!function_exists('getAllCms'))
{

    function getAllCms($id, $limit = null)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where("parent_id", $id);

        if ($limit)
        {
            $query = $CI
                ->db
                ->get("cms", $limit);
        }
        else
        {
            $query = $CI
                ->db
                ->get("cms");
        }

        $result = $query->result();

        if (isset($result))
        {

            return $result;

        }
        else
        {

            return false;

        }

    }

}

/******************************** */

if (!function_exists('tecShortcodes'))
{

    function tecShortcodes($content, $replace = "Hello how are you")
    {

        //Loop through all shortcodes
        

        $shortcodes = array(

            "tec_gallery" => function ($data)
            {

                $content = "";

                if (isset($data["main"]))
                {

                    $galleries = getValues("gallery_sel_categories", "gallerycategory_id", $data["main"]);

                    if (!empty($galleries))
                    {

                        foreach ($galleries as $gallerie)
                        {

                            $content .= '

                            <div class="col-lg-3 col-md-3 col-sm-3">

                            <a data-fancybox="gallery" data-caption="' . getValuee("title", "gallery", "id", $gallerie->gallery_id) . '" href="' . base_url("uploads/gallery/" . getValuee("file", "gallery", "id", $gallerie->gallery_id)) . '" tabindex="0">

                            <img src="' . base_url("uploads/gallery/" . getValuee("thumbnail", "gallery", "id", $gallerie->gallery_id)) . '" class="grayscale img-responsive">

                            </a>

                            </div>

                            ';

                        }

                    }

                }

                return $content;

            }
            ,

            "tec_prdspecifications" => function ($data)
            {

                $content = "<tr>";

                if (isset($data["heading"]))
                {

                    $content .= "<td>" . str_replace("^", " ", $data["heading"]) . "</td><td>" . str_replace("^", " ", $data["value"]) . "</td>";

                }

                $content .= "</tr>";

                return $content;

            }
            ,

            "tec_news" => function ($data)
            {

                $content = '';

                if (isset($data["main"]))
                {

                    $newscat = $data["main"];

                    $CI = & get_instance();

                    $query = $CI
                        ->db
                        ->query("SELECT news.* FROM news_sel_categories JOIN news ON news_sel_categories.news_id = news.id WHERE news_sel_categories.newscategory_id = $newscat");

                    $select = $query->result();

                    if (isset($select))
                    {

                        foreach ($select as $news)
                        {

                            if (isset($data["templete"]))
                            {

                                if ($data["templete"] == 4)
                                {

                                    $template = getValuee("content", "shortcode_templete", "id", $data["templete"]);

                                    $icon_code = $news->icon_code;

                                    $title = $news->title;

                                    $short = $news->short_detail;
                                    $short = $news->short_detail;

                                    $content .= str_replace(array(
                                        '[ICONCODE]',
                                        '[TITLE]',
                                        '[SHORT]'
                                    ) , array(
                                        $icon_code,
                                        $title,
                                        $short
                                    ) , $template);

                                }

                            }

                        }

                    }

                }
                else
                {

                    if (isset($data["limit"]))
                    {
                        $limit = $data["limit"];
                    }
                    else
                    {
                        $limit = 5;
                    }

                    $CI = & get_instance();
                    $query = $CI
                        ->db
                        ->query("SELECT * FROM blogs ORDER BY created DESC LIMIT $limit");
                    $select = $query->result();

                    if (isset($select))
                    {
                        foreach ($select as $news)
                        {
                            if (isset($data["templete"]))
                            {

                                if ($data["templete"] == 4)
                                {

                                    $template = getValuee("content", "shortcode_templete", "id", $data["templete"]);

                                    if ($news->thumbnail == "")
                                    {
                                        $thumbnail = base_url() . "files/frontend/images/blank.jpg";
                                    }
                                    else
                                    {
                                        $thumbnail = base_url() . "uploads/blog/" . $news->thumbnail;
                                    }
                                    $title = $news->title;

                                    if (strlen($news->short_detail) > 115)
                                    {
                                        $short = substr($news->short_detail, 0, 115) . " ...";
                                    }
                                    else
                                    {
                                        $short = $news->short_detail;
                                    }
                                    $alink = getNSeoLink("blogs", $news->id);

                                    $content .= str_replace(array(
                                        '[THUMBNAIL]',
                                        '[LINK]',
                                        '[TITLE]',
                                        '[SHORT]'
                                    ) , array(
                                        $thumbnail,
                                        $alink,
                                        $title,
                                        $short
                                    ) , $template);
                                }
                            }
                        }
                    }
                    else
                    {
                        $content .= "No data found!";
                    }
                }

                return $content;

            }
            ,

            "tec_cms" => function ($data)
            {
                $content = '';
                if (isset($data["main"]))
                {
                    $content = '';
                    $cmss = getValues("cms", "parent_id", $data["main"]);
                    //$content .= count($cmss);
                    if (isset($cmss))
                    {
                        $x1 = 1;
                        if (isset($data["templete"]) && $data["templete"] == 12)
                        {

                            $content .= '<select class="ajaxd-select" name="ajax_post" id="ajaxd-select">';

                            $content .= '<option value="" data-permalink="' . getSeoLink("cms", $data["main"]) . '">Select Product</option>';

                        }
                        elseif (isset($data["templete"]) && $data["templete"] == 13)
                        {

                            $content .= '<select class="ajaxd-select" name="ajax_post" id="ajaxd-select2">';

                            $content .= '<option value="0">Select Product</option>';

                        }
                        foreach ($cmss as $cms)
                        {

                            if (isset($data["templete"]))
                            {

                                if ($data["templete"] == 1)
                                {

                                    if ($x1 == 1)
                                    {
                                        $anim = "fadeInLeft";
                                    }
                                    elseif ($x1 == 2)
                                    {
                                        $anim = "fadeInUp";
                                    }
                                    elseif ($x1 == 3)
                                    {
                                        $anim = "fadeInRight";
                                    }
                                    elseif ($x1 == 4)
                                    {
                                        $anim = "fadeInLeft";
                                    }
                                    elseif ($x1 == 5)
                                    {
                                        $anim = "fadeInUp";
                                    }
                                    elseif ($x1 == 6)
                                    {
                                        $anim = "fadeInRight";
                                    }
                                    else
                                    {
                                        $anim = "fadeInUp";
                                    }

                                    $template = getValuee("content", "shortcode_templete", "id", $data["templete"]);

                                    $link = getSeoLink("cms", $cms->id);

                                    $icon = base_url() . "uploads/pages/" . $cms->icon;

                                    $title = ($cms->helper_name != "") ? $cms->helper_name : $cms->title;

                                    $contentp = $cms->short_detail;

                                    $content .= str_replace(array(
                                        '[ANIMATION]',
                                        '[ICON]',
                                        '[TITLE]',
                                        '[LINK]',
                                        '[SHORT]'
                                    ) , array(
                                        $anim,
                                        $icon,
                                        $title,
                                        $link,
                                        $contentp
                                    ) , $template);

                                }
                                elseif ($data["templete"] == 3)
                                {

                                    $template = getValuee("content", "shortcode_templete", "id", $data["templete"]);

                                    $thumbnail = base_url() . "uploads/pages/" . $cms->thumbnail;

                                    $title = $cms->title;

                                    $short = $cms->short_detail;

                                    $contentp = cleanOut($cms->content);

                                    $imgalt = $cms->title;

                                    $content .= str_replace(array(
                                        '[THUMBNAIL]',
                                        '[TITLE]',
                                        '[SHORT]',
                                        '[CONTENT]',
                                        '[IMGALT]'
                                    ) , array(
                                        $thumbnail,
                                        $title,
                                        $short,
                                        $contentp,
                                        $imgalt
                                    ) , $template);

                                }
                                elseif ($data["templete"] == 5)
                                {

                                    $template = getValuee("content", "shortcode_templete", "id", $data["templete"]);

                                    $icon = base_url() . "uploads/pages/" . $cms->icon;

                                    $link = getSeoLink("cms", $cms->id);

                                    $imgalt = $cms->title . " Client";

                                    $content .= str_replace(array(
                                        '[ICON]',
                                        '[LINK]',
                                        '[IMGALT]'
                                    ) , array(
                                        $icon,
                                        $link,
                                        $imgalt
                                    ) , $template);

                                }
                                elseif ($data["templete"] == 6)
                                {

                                    $template = getValuee("content", "shortcode_templete", "id", $data["templete"]);

                                    $icon = base_url() . "uploads/pages/" . $cms->icon;

                                    $titleb = explode(" ", $cms->title, 2);

                                    if (isset($titleb[1]))
                                    {

                                        $title = $titleb[0] . " <strong>" . $titleb[1] . "</strong>";

                                    }
                                    else
                                    {

                                        $title = $titleb[0];

                                    }

                                    $short = $cms->short_detail;

                                    $contentb = $cms->content;

                                    $imgalt = $cms->title;

                                    $content .= str_replace(array(
                                        '[ICON]',
                                        '[TITLE]',
                                        '[SHORT]',
                                        '[CONTENT]',
                                        '[IMGALT]'
                                    ) , array(
                                        $icon,
                                        $title,
                                        $short,
                                        cleanOut($contentb) ,
                                        $imgalt
                                    ) , $template);

                                }
                                elseif ($data["templete"] == 7)
                                {

                                    $template = getValuee("content", "shortcode_templete", "id", $data["templete"]);

                                    $title = $cms->title;

                                    $contentb = $cms->content;

                                    $content .= str_replace(array(
                                        '[TITLE]',
                                        '[CONTENT]'
                                    ) , array(
                                        $title,
                                        cleanOut($contentb)
                                    ) , $template);

                                }
                                elseif ($data["templete"] == 8)
                                {

                                    $template = getValuee("content", "shortcode_templete", "id", $data["templete"]);

                                    $link = getSeoLink("cms", $cms->id);

                                    $title = $cms->title;

                                    $thumbnail = base_url() . "uploads/pages/" . $cms->thumbnail;

                                    $content .= str_replace(array(
                                        '[LINK]',
                                        '[TITLE]',
                                        '[THUMBNAIL]'
                                    ) , array(
                                        $link,
                                        $title,
                                        $thumbnail
                                    ) , $template);

                                }
                                elseif ($data["templete"] == 9)
                                {

                                    $template = getValuee("content", "shortcode_templete", "id", $data["templete"]);

                                    $link = "https://www." . $cms->short_detail;

                                    $slug = $cms->slug;

                                    $content .= str_replace(array(
                                        '[LINK]',
                                        '[SLUG]'
                                    ) , array(
                                        $link,
                                        $slug,
                                    ) , $template);

                                }
                                elseif ($data["templete"] == 12 || $data["templete"] == 13)
                                {

                                    $template = getValuee("content", "shortcode_templete", "id", $data["templete"]);

                                    $link = getSeoLink("cms", $cms->id);

                                    $title = $cms->title;

                                    $idd = $cms->id;

                                    $content .= str_replace(array(
                                        '[LINK]',
                                        '[TITLE]',
                                        '[ID]'
                                    ) , array(
                                        $link,
                                        $title,
                                        $idd
                                    ) , $template);

                                }

                            }

                            $x1++;
                        }
                        if (isset($data["templete"]) && $data["templete"] == 12)
                        {

                            $content .= '</select>';

                        }
                        elseif (isset($data["templete"]) && $data["templete"] == 13)
                        {

                            $content .= '</select>';

                        }
                    }
                    else
                    {

                        $content .= "No record Found";

                    }
                }
                elseif (isset($data["ids"]))
                {

                    $ids = explode(",", $data["ids"]);

                    $CI = & get_instance();

                    $CI
                        ->db
                        ->where_in('id', $ids);

                    $query = $CI
                        ->db
                        ->get("cms");

                    $results = $query->result();

                    if (isset($results))
                    {

                        $x1 = 1;

                        foreach ($results as $cms)
                        {

                            if (isset($data["templete"]))
                            {

                                if ($data["templete"] == 1)
                                {

                                    if ($x1 == 1)
                                    {
                                        $anim = "fadeInLeft";
                                    }
                                    elseif ($x1 == 2)
                                    {
                                        $anim = "fadeInUp";
                                    }
                                    elseif ($x1 == 3)
                                    {
                                        $anim = "fadeInRight";
                                    }
                                    elseif ($x1 == 4)
                                    {
                                        $anim = "fadeInLeft";
                                    }
                                    elseif ($x1 == 5)
                                    {
                                        $anim = "fadeInUp";
                                    }
                                    elseif ($x1 == 6)
                                    {
                                        $anim = "fadeInRight";
                                    }
                                    else
                                    {
                                        $anim = "fadeInUp";
                                    }

                                    $template = getValuee("content", "shortcode_templete", "id", $data["templete"]);

                                    $link = getSeoLink("cms", $cms->id);

                                    $icon = base_url() . "uploads/pages/" . $cms->icon;

                                    $title = ($cms->helper_name != "") ? $cms->helper_name : $cms->title;

                                    $contentp = $cms->short_detail;

                                    $content .= str_replace(array(
                                        '[ANIMATION]',
                                        '[ICON]',
                                        '[TITLE]',
                                        '[LINK]',
                                        '[SHORT]'
                                    ) , array(
                                        $anim,
                                        $icon,
                                        $title,
                                        $link,
                                        $contentp
                                    ) , $template);

                                }
                                elseif ($data["templete"] == 3)
                                {

                                    $template = getValuee("content", "shortcode_templete", "id", $data["templete"]);

                                    $thumbnail = base_url() . "uploads/pages/" . $cms->thumbnail;

                                    $title = $cms->title;

                                    $short = $cms->short_detail;

                                    $contentp = $cms->content;

                                    $content .= str_replace(array(
                                        '[THUMBNAIL]',
                                        '[TITLE]',
                                        '[SHORT]',
                                        '[CONTENT]'
                                    ) , array(
                                        $thumbnail,
                                        $title,
                                        $short,
                                        $contentp
                                    ) , $template);

                                }

                            }

                            $x1++;

                        }

                    }
                    else
                    {

                        $content .= "No record Fount";

                    }

                }
                elseif (isset($data["id"]))
                {

                    if (isset($data["id"]))
                    {
                        $content .= cleanOut(getValuee("content", "cms", "id", $data["id"]));
                    }

                }
                elseif (isset($data["video"]))
                {

                    if (isset($data["templete"]))
                    {
                        $content .= getValuee("content", "shortcode_templete", "id", $data["templete"]);
                    }

                }

                return $content;

            }
            ,

            "tec_map" => function ($data)
            {

                $content = "";

                if (isset($data["type"]))
                {

                    if ($data["type"] == "contact")
                    {

                        $content .= '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3156.4362891565715!2d144.9437021158421!3d-37.70943583585472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65ad9422f60e7%3A0xd05c97e89937959d!2s23%20Curtin%20Ave%2C%20Hadfield%20VIC%203046%2C%20Australia!5e0!3m2!1sen!2s!4v1606451108906!5m2!1sen!2s" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';

                    }

                }

                return $content;

            }
            ,

            "tec_extra_prod" => function ($data)
            {

                $content = "";

                if (isset($data["type"]))
                {

                    if ($data["type"] == "featured")
                    {

                        if (isset($data["limit"]))
                        {
                            $limit = $data["limit"];
                        }
                        else
                        {
                            $limit = "";
                        }

                        $ftrprds = getFeaturedPrd($limit);

                        if (!empty($ftrprds))
                        {

                            foreach ($ftrprds as $ftrprd)
                            {

                                if (isset($data["templete"]))
                                {

                                    $template = getValuee("content", "shortcode_templete", "id", $data["templete"]);

                                    $link = base_url("product/" . $ftrprd->slug);

                                    $img = base_url() . "uploads/products/small/" . $ftrprd->image;

                                    $title = $ftrprd->title;

                                    $short = $ftrprd->short_detail;

                                    $imagealt = $ftrprd->article . " popular product";

                                    $content .= str_replace(array(
                                        '[LINK]',
                                        '[IMG]',
                                        '[TITLE]',
                                        '[SHORT]',
                                        '[IMGALT]'
                                    ) , array(
                                        $link,
                                        $img,
                                        $title,
                                        $short,
                                        $imagealt
                                    ) , $template);

                                }

                            }

                        }

                    }
                    elseif ($data["type"] == "prods")
                    {

                        if (isset($data["ids"]))
                        {

                            $ids = explode(",", $data["ids"]);

                            $CI = & get_instance();

                            $CI
                                ->db
                                ->where_in('id', $ids);

                            $query = $CI
                                ->db
                                ->get("products");

                            $extraprds = $query->result();

                            if (!empty($extraprds))
                            {

                                foreach ($extraprds as $ftrprd)
                                {

                                    if (isset($data["templete"]))
                                    {

                                        $template = getValuee("content", "shortcode_templete", "id", $data["templete"]);

                                        $link = base_url("product/" . $ftrprd->slug);

                                        $img = base_url() . "uploads/products/small/" . $ftrprd->image;

                                        $title = $ftrprd->title;

                                        $content .= str_replace(array(
                                            '[LINK]',
                                            '[IMG]',
                                            '[TITLE]'
                                        ) , array(
                                            $link,
                                            $img,
                                            $title
                                        ) , $template);

                                    }

                                }

                            }

                        }

                    }

                }

                return $content;

            }
            ,

            "tec_frame" => function ($data)
            {

                $content = "";

                if (isset($data["type"]))
                {

                    if ($data["type"] == "crmform")
                    {

                        $content .= '<iframe src="https://crm.intercel.com.au/forms/ticket" width="600" height="850" frameborder="0" allowfullscreen="allowfullscreen"><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start">﻿</span></iframe>';

                    }
                    elseif ($data["type"] == "feedback")
                    {
                        $content .= '<iframe width="1500" height="5500" id="iFrameResizer0" src="https://docs.google.com/forms/d/1ZhIW1KBo-sE0qlxn1u1zr5QWPhy0DxuEJ1JpUwqoVrg/viewform?embedded=true" frameborder="0" marginwidth="0" marginheight="0" scrolling="no">Loading...</iframe>';
                    }

                }

                return $content;

            }
            ,

            "tec_form" => function ($data, $replace)
            {

                $content = "";
                if (isset($data['type']))
                {

                    if ($data['type'] == "contact")
                    {

                        $content .= $replace;

                        //$content .= $template;
                        

                        
                    }

                }
                elseif (isset($data['action']))
                {
                    $content = "\r\n" . form_open(base_url() . $data['action']) . "\r\n";
                }

                return $content;

            }
            ,

            "tec_captcha" => function ($data)
            {
                $content = "";
                if (isset($data['type']))
                {
                    $captchaurl = getCaptcha("#010101", "captcha");
                    $content .= '<img src="' . $captchaurl . '" alt="Captcha" class="captchaimg">';
                }
                else
                {
                    $content .= '';
                }
                return $content;
            }
            ,

            "tec_form_notice" => function ($data)
            {
                $content = "";
                if (isset($data['type']))
                {
                    $CI = & get_instance();
                    $returndd = '';
                    if ($CI
                        ->session
                        ->userdata("formnotice") !== NULL)
                    {
                        $formnotice = $CI
                            ->session
                            ->userdata("formnotice");
                        if (isset($formnotice['errors']))
                        {
                            $returndd .= '<div class="formerrors alert alert-danger alert-dismissible fade show" role="alert">';
                            $returndd .= '<h4>ERROR:</h4>';
                            $returndd .= '<ul>';
                            foreach ($formnotice['errors'] as $error)
                            {
                                $returndd .= '<li><i class="fa fa-exclamation-triangle">&nbsp;</i>' . $error . '</li>';
                            }
                            $returndd .= '</ul>';
                            $returndd .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
                            $returndd .= '</div>';
                        }
                        elseif (isset($formnotice['success']))
                        {
                            $returndd .= '<div class="formsuccess alert alert-success alert-dismissible fade show" role="alert">';
                            $returndd .= '<h4>SUCCESS:</h4>';
                            $returndd .= '<ul>';
                            foreach ($formnotice['success'] as $success)
                            {
                                $returndd .= '<li><i class="fa fa-check-square">&nbsp;</i>' . $success . '</li>';
                            }
                            $returndd .= '</ul>';
                            $returndd .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
                            $returndd .= '</div>';
                        }
                    }
                    $content .= $returndd;
                    $CI
                        ->session
                        ->unset_userdata('formnotice');
                }
                return $content;
            }

        );

        foreach ($shortcodes as $key => $function)
        {

            $dat = array();

            preg_match_all("/\[\[" . $key . " (.+?)\]\]/", $content, $dat);

            if (count($dat) > 0 && $dat[0] != array() && isset($dat[1]))
            {

                $i = 0;

                $actual_string = $dat[0];

                foreach ($dat[1] as $temp)
                {

                    $temp = explode(" ", $temp);

                    $params = array();

                    foreach ($temp as $d)
                    {

                        list($opt, $val) = explode("=", $d);

                        $params[$opt] = trim($val, '"');

                    }

                    $content = str_replace($actual_string[$i], $function($params, $replace) , $content);

                    $i++;

                }

            }

        }

        return $content;

    }

}

if (!function_exists('hexToRgb'))
{

    function hexToRgb($hex, $alpha = false)
    {

        if (strstr($hex, '#'))
        {

            $hex = str_replace('#', '', $hex);

        }

        $length = strlen($hex);

        $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1) , 2) : 0));

        $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1) , 2) : 0));

        $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1) , 2) : 0));

        if ($alpha)
        {

            $rgb['a'] = $alpha;

        }

        return $rgb;

    }

}

function tUc($text, $seprator = "_")
{
    if (strpos($text, $seprator) !== false)
    {
        $xname = explode("_", $text);
        $newname = implode(" ", $xname);
    }
    else
    {
        $newname = $text;
    }
    return ucwords($newname);
}
function getCaptcha($color = "#010101", $session = "captcha")
{

    $CI = & get_instance();

    $CI
        ->load
        ->library('antispam');

    $rgbc = hexToRgb($color);

    $captcha = $CI
        ->antispam
        ->get_antispam_image($rgbc['r'], $rgbc['g'], $rgbc['b']);

    $CI
        ->session
        ->unset_userdata($session);

    $CI
        ->session
        ->set_userdata($session, $captcha['word']);

    return $captcha['image'];

}

if (!function_exists('tecShortcodesAdmin'))
{

    function tecShortcodesAdmin($content)
    {

        //Loop through all shortcodes
        

        $shortcodes = array(

            "tec_prdspecifications" => function ($data)
            {

                $content = '<div class="j-row toclone-widget-right toclone" style="padding-right: 135px;">';

                $content .= '<div class="row">';

                $content .= '



                <div class="col-md-6">



                    <div class="material-group">



                        <div class="form-group form-primary">



                            <input type="text" name="specih[]" value="' . str_replace("^", " ", $data["heading"]) . '" class="form-control">



                            <span class="form-bar"></span>



                            <label class="float-label">Specification Heading</label>



                        </div>



                    </div>



                </div>';

                $content .= '



                <div class="col-md-6">



                    <div class="material-group">



                        <div class="form-group form-primary">



                            <input type="text" name="speciv[]" value="' . str_replace("^", " ", $data["value"]) . '" class="form-control">



                            <span class="form-bar"></span>



                            <label class="float-label">Specification Value</label>



                        </div>



                    </div>



                </div>';

                $content .= '</div>';

                $content .= '<button style="position:absolute;top:0;right:65px;" type="button" class="btn btn-primary clone-btn-right clone"><i class="icofont icofont-plus"></i></button>';

                $content .= '<button style="position:absolute;top:0;right:0;" type="button" class="btn btn-default clone-btn-right delete"><i class="icofont icofont-minus"></i></button>';

                $content .= '</div>';

                return $content;

            }

        );

        foreach ($shortcodes as $key => $function)
        {

            $dat = array();

            preg_match_all("/\[\[" . $key . " (.+?)\]\]/", $content, $dat);

            if (count($dat) > 0 && $dat[0] != array() && isset($dat[1]))
            {

                $i = 0;

                $actual_string = $dat[0];

                foreach ($dat[1] as $temp)
                {

                    $temp = explode(" ", $temp);

                    $params = array();

                    foreach ($temp as $d)
                    {

                        list($opt, $val) = explode("=", $d);

                        $params[$opt] = trim($val, '"');

                    }

                    $content = str_replace($actual_string[$i], $function($params) , $content);

                    $i++;

                }

            }

        }

        return $content;

    }

}

if (!function_exists('form_notice_short_tag'))
{
    function form_notice_short_tag($array)
    {
        $CI = & get_instance();
        $returndd = '';
        if ($CI
            ->session
            ->userdata("formnotice") !== NULL)
        {
            $formnotice = $CI
                ->session
                ->userdata("formnotice");
            if (isset($formnotice['errors']))
            {
                $returndd .= '<div class="formerrors">';
                $returndd .= '<h4>ERROR:</h4>';
                $returndd .= '<ul>';
                foreach ($formnotice['errors'] as $error)
                {
                    $returndd .= '<li><i class="fa fa-exclamation-triangle">&nbsp;</i>' . $error . '</li>';
                }
                $returndd .= '</ul>';
                $returndd .= '</div>';
            }
            elseif (isset($formnotice['success']))
            {
                $returndd .= '<div class="formsuccess">';
                $returndd .= '<h4>SUCCESS:</h4>';
                $returndd .= '<ul>';
                foreach ($formnotice['success'] as $success)
                {
                    $returndd .= '<li><i class="fa fa-check-square">&nbsp;</i>' . $success . '</li>';
                }
                $returndd .= '</ul>';
                $returndd .= '</div>';
            }
        }
        $returndata = array(
            'data' => $returndd
        );
        $CI
            ->session
            ->unset_userdata('formnotice');
        return $returndata;
    }
}

if (!function_exists('form_open_short_tag'))
{

    function form_open_short_tag($array)
    {

        if (isset($array["action"]))
        {

            $action = $array["action"];

            unset($array["action"]);

            $contentpp = "\r\n" . form_open(base_url() . $action, $array) . "\r\n";

            $returndata = array(
                'data' => $contentpp
            );

            return $returndata;

        }

    }

}

if (!function_exists('form_close_short_tag'))
{

    function form_close_short_tag($array)
    {

        $contentpp = "\r\n</form>\r\n";

        $returndata = array(
            'data' => $contentpp
        );

        return $returndata;

    }

}

if (!function_exists('select_short_tag'))
{

    function select_short_tag($array)
    {

        $dataselect = '';

        if (isset($array['name']))
        {

            if (isset($array['required']) && $array['required'] == "required")
            {

                $requiredthis = $array['name'];

            }
            else
            {

                $requiredthis = "";

            }

            if (isset($array['id']))
            {
                $selectid = ' id="' . $array['id'] . '" ';
            }
            else
            {
                $selectid = '';
            }

            if (isset($array['class']))
            {
                $selectclass = ' class="' . $array['class'] . '" ';
            }
            else
            {
                $selectclass = '';
            }

            $dataselect .= "\r\n" . '<select name="' . $array['name'] . '"' . $selectid . $selectclass . '>';

            if (isset($array['options']) && isset($array['values']))
            {

                $options = explode("|", $array['options']);

                $values = explode("|", $array['values']);

                $xx = 0;

                foreach ($options as $option)
                {

                    $dataselect .= "\r\n" . '<option value="' . $values[$xx] . '">' . $option . '</option>';

                    $xx++;

                }

            }

            $dataselect .= '</select>' . "\r\n";

        }
        else
        {

            $dataselect .= "select field name not defined";

        }

        $returndata = array(

            'data' => $dataselect,

            'term_name' => $requiredthis,

        );

        return $returndata;

    }

}

if (!function_exists('input_short_tag'))
{

    function input_short_tag($array)
    {

        $newtag = "\r\n" . '<input ';

        $formterms = array();

        foreach ($array as $attr => $value)
        {

            if (isset($array['required']) && $array['required'] == "required")
            {

                $requiredthis = $array['name'];

            }
            else
            {

                $requiredthis = "";

            }

            $newtag .= $attr . "=\"" . $value . "\" ";

        }

        $newtag .= '>' . "\r\n";

        $returndata = array(

            'data' => $newtag,

            'term_name' => $requiredthis,

        );

        return $returndata;

    }

}

if (!function_exists('captcha_short_tag'))
{

    function captcha_short_tag($array)
    {

        if (isset($array['color']))
        {

            $ccolor = $array['color'];

        }
        else
        {

            $ccolor = "#010101";

        }

        if (isset($array['class']))
        {

            $classc = $array['class'];

        }
        else
        {

            $classc = 'captcha';

        }

        $captchaurl = getCaptcha($ccolor, $session = "captcha");

        $captchaimg = '<img src="' . $captchaurl . '" alt="Captcha" class="' . $classc . '">';

        $returndata = array(
            'data' => $captchaimg
        );

        return $returndata;

    }

}

if (!function_exists('youtube_shortcode'))
{

    function youtube_shortcode($array)
    {

        $youtubetag = '<iframe ';

        foreach ($array as $attr => $value)
        {

            $youtubetag .= $attr . "=\"" . $value . "\" ";

        }

        $youtubetag .= '></iframe>';

        return $youtubetag;

    }

}

if (!function_exists('googlemap_shortcode'))
{

    function googlemap_shortcode($array)
    {

        $youtubetag = '<iframe ';

        foreach ($array as $attr => $value)
        {

            if ($attr == "pb")
            {

                $youtubetag .= "src=\"https://www.google.com/maps/embed?pb=" . $value . "\"";

            }
            else
            {

                $youtubetag .= $attr . "=\"" . $value . "\" ";

            }

        }

        $youtubetag .= '></iframe>';

        return $youtubetag;

    }

}

if (!function_exists('form_shortcode'))
{

    function form_shortcode($array)
    {

        if (isset($array['template']))
        {

            $content = getValuee("content", "shortcode_templete", "id", $array["template"]);

            if (empty($content))
            {

                return '<div class="text-center">[Invalid Form Template id]</div>';

            }

            if (isset($array['return']) && $array['return'] != "")
            {
                $returnpage = $array['return'];
            }
            else
            {
                return '<div class="text-center">[Return path not defined]</div>';
            }

            if (isset($array['subject']) && $array['subject'] != "")
            {
                $subjectof = $array['subject'];
            }
            else
            {
                return '<div class="text-center">[Subject not defined]</div>';
            }

            $forminfo = array(
                'return_page' => $returnpage,
                'form_subject' => $subjectof
            );

            $CI = & get_instance();

            $CI
                ->load
                ->library('shortcodex');

            $content = cleanOut($content);

            $shortcodes = $CI->shortcodex::parse_shortcodes($content);

            if (!$shortcodes)
            {

                return $content;

            }

            $formterms = array();

            foreach ($shortcodes as $shortcode)
            {

                $funcname = $shortcode['name'] . "_short_tag";

                if (isset($shortcode['attrs']))
                {

                    if (is_array($shortcode['attrs']))
                    {

                        foreach ($shortcode['attrs'] as $key => $val)
                        {

                            $shortcode['attrs'][$key] = trim($val, '"');

                        }

                    }

                }

                if (function_exists($funcname))
                {

                    if (!isset($shortcode['attrs']))
                    {

                        $shortcode['attrs'] = "na";

                    }

                    $callfunc = $funcname($shortcode['attrs']);

                    $replacecont = $callfunc['data'];

                    if (isset($callfunc['term_name']))
                    {

                        if ($callfunc['term_name'] != "")
                        {

                            $formterms['form_required'][$callfunc['term_name']] = "true";

                        }

                    }

                    $content = str_replace($shortcode['shortcode'], $replacecont, $content);

                }
                else
                {

                    if (isset($shortcode['content']))
                    {

                        $newtag = "\r\n" . '<' . $shortcode['name'] . ' ';

                        if (isset($shortcode['attrs']['required']) && $shortcode['attrs']['required'] == "required")
                        {

                            $formterms['form_required'][$shortcode['attrs']['name']] = "true";

                        }

                        foreach ($shortcode['attrs'] as $attr => $value)
                        {

                            $newtag .= $attr . "=\"" . $value . "\" ";

                        }

                        $newtag .= '>' . $shortcode['content'] . '</' . $shortcode['name'] . '>' . "\r\n";

                        $content = str_replace($shortcode['shortcode'], $newtag, $content);

                    }

                }

            }
            $formterms['form_info'] = $forminfo;
            $CI
                ->session
                ->set_userdata('formterms', $formterms);

            return $content;

        }

    }

}

if (!function_exists('gallery_shortcode'))
{

    function gallery_shortcode($array)
    {

        if (!isset($array['template']))
        {

            return '<div class="text-center">[Invalid gallery Template]</div>';

        }

        $content = getValuee("content", "shortcode_templete", "id", $array["template"]);

        if (empty($content))
        {

            return '<div class="text-center">[Invalid gallery Template id]</div>';

        }

        if (isset($array['main']) && $array['main'] != "")
        {

            if (isset($array['start']) && $array['start'] != "")
            {
                $ggstart = intval($array['start']);
            }
            else
            {
                $ggstart = null;
            }

            if (isset($array['limit']) && $array['limit'] != "")
            {
                $gglimit = intval($array['limit']);
            }
            else
            {
                $gglimit = null;
            }

            if (isset($array['sort']) && $array['sort'] != "")
            {
                $ggsort = $array['sort'];
            }
            else
            {
                $ggsort = null;
            }

            if (isset($array['sorttype']) && $array['sorttype'] != "")
            {
                $ggsorttype = $array['sorttype'];
            }
            else
            {
                $ggsorttype = null;
            }

            if (isset($array['exclude']) && $array['exclude'] != "")
            {

                $exclude1 = $array['exclude'];

                if (strpos($exclude1, '|') !== false)
                {
                    $ggexclude = explode("|", $exclude1);
                }
                else
                {
                    $ggexclude = $exclude1;
                }

            }
            else
            {
                $ggexclude = null;
            }

            $galleries = getValuesCategories("gallery", "gallery_sel_categories", "gallery_id", "gallerycategory_id", $array['main'], $gglimit, $ggsort, $ggsorttype, $ggexclude, $ggstart);

            if (!empty($galleries))
            {

                $newcont = '';

                foreach ($galleries as $gallerie)
                {

                    $gall = getSingleValuee("gallery", "id", $gallerie->id);

                    $gtitle = $gall->title;

                    $gthumbnail = base_url("uploads/gallery/" . $gall->thumbnail);

                    $gfile = base_url("uploads/gallery/" . $gall->file);

                    $gfiletype = str_replace(".", "", $gall->file_ext);

                    $gvideo = cleanOut($gall->video);

                    $newcont .= str_replace(array(
                        '[TITLE]',
                        '[THUMBNAIL]',
                        '[FILE]',
                        '[FILETYPE]',
                        '[VIDEO]'
                    ) , array(
                        $gtitle,
                        $gthumbnail,
                        $gfile,
                        $gfiletype,
                        cleanOut($gvideo)
                    ) , $content);

                }

                $content = $newcont;

            }

            return $content;

        }
        elseif (isset($array['ids']) && $array['ids'] != "")
        {

            if (strpos($array['ids'], '|') !== false)
            {

                $galleries = explode("|", $array['ids']);

                $newcont = '';

                foreach ($galleries as $gallerie)
                {

                    $gall = getSingleValuee("gallery", "id", $gallerie);

                    $gtitle = $gall->title;

                    $gthumbnail = base_url("uploads/gallery/" . $gall->thumbnail);

                    $gfile = base_url("uploads/gallery/" . $gall->file);

                    $gfiletype = str_replace(".", "", $gall->file_ext);

                    $gvideo = cleanOut($gall->video);

                    $newcont .= str_replace(array(
                        '[TITLE]',
                        '[THUMBNAIL]',
                        '[FILE]',
                        '[FILETYPE]',
                        '[VIDEO]'
                    ) , array(
                        $gtitle,
                        $gthumbnail,
                        $gfile,
                        $gfiletype,
                        cleanOut($gvideo)
                    ) , $content);

                }

            }
            else
            {

                $newcont = '<div class="text-center">[Invalid gallery ids]</div>';

            }

            $content = $newcont;

            return $content;

        }
        elseif (isset($array['id']) && $array['id'] != "")
        {

            $gall = getSingleValuee("gallery", "id", $array['id']);

            $gtitle = $gall->title;

            $gthumbnail = base_url("uploads/gallery/" . $gall->thumbnail);

            $gfile = base_url("uploads/gallery/" . $gall->file);

            $gfiletype = str_replace(".", "", $gall->file_ext);

            $gvideo = cleanOut($gall->video);

            $content = str_replace(array(
                '[TITLE]',
                '[THUMBNAIL]',
                '[FILE]',
                '[FILETYPE]',
                '[VIDEO]'
            ) , array(
                $gtitle,
                $gthumbnail,
                $gfile,
                $gfiletype,
                cleanOut($gvideo)
            ) , $content);

            return $content;

        }
        else
        {

            return $content;

        }

    }

}

if (!function_exists('news_shortcode'))
{

    function news_shortcode($array)
    {

        if (!isset($array['template']))
        {

            return '<div class="text-center">[Invalid news Template]</div>';

        }

        $content = getValuee("content", "shortcode_templete", "id", $array["template"]);

        if (empty($content))
        {

            return '<div class="text-center">[Invalid news Template id]</div>';

        }

        if (isset($array['main']) && $array['main'] != "")
        {

            if (isset($array['start']) && $array['start'] != "")
            {
                $ggstart = intval($array['start']);
            }
            else
            {
                $ggstart = null;
            }

            if (isset($array['limit']) && $array['limit'] != "")
            {
                $gglimit = intval($array['limit']);
            }
            else
            {
                $gglimit = null;
            }

            if (isset($array['sort']) && $array['sort'] != "")
            {
                $ggsort = $array['sort'];
            }
            else
            {
                $ggsort = null;
            }

            if (isset($array['sorttype']) && $array['sorttype'] != "")
            {
                $ggsorttype = $array['sorttype'];
            }
            else
            {
                $ggsorttype = null;
            }

            if (isset($array['exclude']) && $array['exclude'] != "")
            {

                $exclude1 = $array['exclude'];

                if (strpos($exclude1, '|') !== false)
                {
                    $ggexclude = explode("|", $exclude1);
                }
                else
                {
                    $ggexclude = $exclude1;
                }

            }
            else
            {
                $ggexclude = null;
            }

            $newss = getValuesCategories("news", "news_sel_categories", "news_id", "newscategory_id", $array['main'], $gglimit, $ggsort, $ggsorttype, $ggexclude, $ggstart);

            if (!empty($newss))
            {

                $newcont = '';

                foreach ($newss as $news)
                {

                    $gall = getSingleValuee("news", "id", $news->id);

                    $glink = base_url("news/" . $gall->slug . "/");

                    $gtitle = $gall->title;

                    $gshort_detail = $gall->short_detail;

                    $gcontent = cleanOut($gall->content);

                    $gicon = base_url("uploads/news/" . $gall->icon);

                    $gthumbnail = base_url("uploads/news/" . $gall->thumbnail);

                    $gbanner = base_url("uploads/news/" . $gall->banner);

                    $newcont .= str_replace(array(
                        '[LINK]',
                        '[TITLE]',
                        '[SHORT]',
                        '[CONTENT]',
                        '[ICON]',
                        '[THUMBNAIL]',
                        '[BANNER]'
                    ) , array(
                        $glink,
                        $gtitle,
                        $gshort_detail,
                        cleanOut($gcontent) ,
                        $gicon,
                        $gthumbnail,
                        $gbanner
                    ) , $content);

                }

                $content = $newcont;

            }

            return $content;

        }
        elseif (isset($array['ids']) && $array['ids'] != "")
        {

            if (strpos($array['ids'], '|') !== false)
            {

                $newss = explode("|", $array['ids']);

                $newcont = '';

                foreach ($newss as $news)
                {

                    $gall = getSingleValuee("news", "id", $news->id);

                    $glink = base_url("news/" . $gall->slug . "/");

                    $gtitle = $gall->title;

                    $gshort_detail = $gall->short_detail;

                    $gcontent = cleanOut($gall->content);

                    $gicon = base_url("uploads/news/" . $gall->icon);

                    $gthumbnail = base_url("uploads/news/" . $gall->thumbnail);

                    $gbanner = base_url("uploads/news/" . $gall->banner);

                    $newcont .= str_replace(array(
                        '[LINK]',
                        '[TITLE]',
                        '[SHORT]',
                        '[CONTENT]',
                        '[ICON]',
                        '[THUMBNAIL]',
                        '[BANNER]'
                    ) , array(
                        $glink,
                        $gtitle,
                        $gshort_detail,
                        cleanOut($gcontent) ,
                        $gicon,
                        $gthumbnail,
                        $gbanner
                    ) , $content);

                }

            }
            else
            {

                $newcont = '<div class="text-center">[Invalid gallery ids]</div>';

            }

            $content = $newcont;

            return $content;

        }
        elseif (isset($array['id']) && $array['id'] != "")
        {

            $gall = getSingleValuee("news", "id", $array['id']);

            $glink = base_url("news/" . $gall->slug . "/");

            $gtitle = $gall->title;

            $gshort_detail = $gall->short_detail;

            $gcontent = cleanOut($gall->content);

            $gicon = base_url("uploads/news/" . $gall->icon);

            $gthumbnail = base_url("uploads/news/" . $gall->thumbnail);

            $gbanner = base_url("uploads/news/" . $gall->banner);

            $content = str_replace(array(
                '[LINK]',
                '[TITLE]',
                '[SHORT]',
                '[CONTENT]',
                '[ICON]',
                '[THUMBNAIL]',
                '[BANNER]'
            ) , array(
                $glink,
                $gtitle,
                $gshort_detail,
                cleanOut($gcontent) ,
                $gicon,
                $gthumbnail,
                $gbanner
            ) , $content);

            return $content;

        }
        else
        {

            return $content;

        }

    }

}

if (!function_exists('cmspage_shortcode'))
{

    function cmspage_shortcode($array)
    {

        if (!isset($array['template']))
        {

            return '<div class="text-center">[Invalid cmspage Template]</div>';

        }

        $content = getValuee("content", "shortcode_templete", "id", $array["template"]);

        if (empty($content))
        {

            return '<div class="text-center">[Invalid cmspage Template id]</div>';

        }

        if (isset($array['main']) && $array['main'] != "")
        {

            if (isset($array['start']) && $array['start'] != "")
            {
                $ggstart = intval($array['start']);
            }
            else
            {
                $ggstart = 0;
            }

            if (isset($array['limit']) && $array['limit'] != "")
            {
                $gglimit = intval($array['limit']);
            }
            else
            {
                $gglimit = null;
            }

            if (isset($array['sort']) && $array['sort'] != "")
            {
                $ggsort = $array['sort'];
            }
            else
            {
                $ggsort = null;
            }

            if (isset($array['sorttype']) && $array['sorttype'] != "")
            {
                $ggsorttype = $array['sorttype'];
            }
            else
            {
                $ggsorttype = null;
            }

            if (isset($array['exclude']) && $array['exclude'] != "")
            {

                $exclude1 = $array['exclude'];

                if (strpos($exclude1, '|') !== false)
                {
                    $ggexclude = explode("|", $exclude1);
                }
                else
                {
                    $ggexclude = $exclude1;
                }

            }
            else
            {
                $ggexclude = null;
            }

            $cmss = getValues("cms", "parent_id", $array['main'], $gglimit, $ggsort, $ggsorttype, $ggexclude, "is_active", "1", $ggstart);

            if (!empty($cmss))
            {

                $newcont = '';

                foreach ($cmss as $cms)
                {

                    $gall = getSingleValuee("cms", "id", $cms->id);

                    $glink = getSeoLink("cms", $gall->id);

                    $gtitle = $gall->title;

                    $gshort_detail = $gall->short_detail;

                    $gcontent = cleanOut($gall->content);

                    $gicon = base_url("uploads/pages/" . $gall->icon);

                    $gthumbnail = base_url("uploads/pages/" . $gall->thumbnail);

                    $gbanner = base_url("uploads/pages/" . $gall->banner);

                    $newcont .= str_replace(array(
                        '[ID]',
                        '[LINK]',
                        '[TITLE]',
                        '[SHORT]',
                        '[CONTENT]',
                        '[ICON]',
                        '[THUMBNAIL]',
                        '[BANNER]'
                    ) , array(
                        $gall->id,
                        $glink,
                        $gtitle,
                        $gshort_detail,
                        cleanOut($gcontent) ,
                        $gicon,
                        $gthumbnail,
                        $gbanner
                    ) , $content);

                }

                $content = $newcont;

            }

            return $content;

        }
        elseif (isset($array['ids']) && $array['ids'] != "")
        {

            if (strpos($array['ids'], '|') !== false)
            {

                $cmss = explode("|", $array['ids']);

                $newcont = '';

                foreach ($cmss as $cms)
                {

                    $gall = getSingleValuee("cms", "id", $cms->id);

                    $glink = getSeoLink("cms", $gall->id);

                    $gtitle = $gall->title;

                    $gshort_detail = $gall->short_detail;

                    $gcontent = cleanOut($gall->content);

                    $gicon = base_url("uploads/pages/" . $gall->icon);

                    $gthumbnail = base_url("uploads/pages/" . $gall->thumbnail);

                    $gbanner = base_url("uploads/pages/" . $gall->banner);

                    $newcont .= str_replace(array(
                        '[ID]',
                        '[LINK]',
                        '[TITLE]',
                        '[SHORT]',
                        '[CONTENT]',
                        '[ICON]',
                        '[THUMBNAIL]',
                        '[BANNER]'
                    ) , array(
                        $gall->id,
                        $glink,
                        $gtitle,
                        $gshort_detail,
                        cleanOut($gcontent) ,
                        $gicon,
                        $gthumbnail,
                        $gbanner
                    ) , $content);

                }

            }
            else
            {

                $newcont = '<div class="text-center">[Invalid gallery ids]</div>';

            }

            $content = $newcont;

            return $content;

        }
        elseif (isset($array['id']) && $array['id'] != "")
        {

            $gall = getSingleValuee("cms", "id", $array['id']);

            $glink = getSeoLink("cms", $gall->id);

            $gtitle = $gall->title;

            $gshort_detail = $gall->short_detail;

            $gcontent = cleanOut($gall->content);

            $gicon = base_url("uploads/pages/" . $gall->icon);

            $gthumbnail = base_url("uploads/pages/" . $gall->thumbnail);

            $gbanner = base_url("uploads/pages/" . $gall->banner);

            $content = str_replace(array(
                '[ID]',
                '[LINK]',
                '[TITLE]',
                '[SHORT]',
                '[CONTENT]',
                '[ICON]',
                '[THUMBNAIL]',
                '[BANNER]'
            ) , array(
                $gall->id,
                $glink,
                $gtitle,
                $gshort_detail,
                cleanOut($gcontent) ,
                $gicon,
                $gthumbnail,
                $gbanner
            ) , $content);

            return $content;

        }
        else
        {

            return $content;

        }

    }

}

if (!function_exists('singlecmspage_shortcode'))
{

    function singlecmspage_shortcode($array)
    {

        if (isset($array['id']) && $array['id'] != "")
        {

            $gall = getSingleValuee("cms", "id", $array['id']);

            $content = cleanOut($gall->content);

            return $content;

        }
        else
        {

            return "";

        }

    }

}

if (!function_exists('blog_shortcode'))
{

    function blog_shortcode($array)
    {

        if (!isset($array['template']))
        {

            return '<div class="text-center">[Invalid blog Template]</div>';

        }

        $content = getValuee("content", "shortcode_templete", "id", $array["template"]);

        if (empty($content))
        {

            return '<div class="text-center">[Invalid blog Template id]</div>';

        }

        if (isset($array['main']) && $array['main'] != "")
        {

            if (isset($array['start']) && $array['start'] != "")
            {
                $ggstart = intval($array['start']);
            }
            else
            {
                $ggstart = null;
            }

            if (isset($array['limit']) && $array['limit'] != "")
            {
                $gglimit = intval($array['limit']);
            }
            else
            {
                $gglimit = null;
            }

            if (isset($array['sort']) && $array['sort'] != "")
            {
                $ggsort = $array['sort'];
            }
            else
            {
                $ggsort = null;
            }

            if (isset($array['sorttype']) && $array['sorttype'] != "")
            {
                $ggsorttype = $array['sorttype'];
            }
            else
            {
                $ggsorttype = null;
            }

            if (isset($array['exclude']) && $array['exclude'] != "")
            {

                $exclude1 = $array['exclude'];

                if (strpos($exclude1, '|') !== false)
                {
                    $ggexclude = explode("|", $exclude1);
                }
                else
                {
                    $ggexclude = $exclude1;
                }

            }
            else
            {
                $ggexclude = null;
            }

            $blogs = getValuesCategories("blogs", "blogs_sel_categories", "blog_id", "blogcategory_id", $array['main'], $gglimit, $ggsort, $ggsorttype, $ggexclude, $ggstart);

            if (!empty($blogs))
            {

                $newcont = '';

                foreach ($blogs as $blog)
                {

                    $gall = getSingleValuee("blogs", "id", $blog->id);

                    $glink = getSeoLink("blogs", $gall->id);

                    $gtitle = $gall->title;

                    $gauthor = $gall->author;

                    $gshort_detail = $gall->short_detail;

                    $gcontent = cleanOut($gall->content);

                    $gicon = base_url("uploads/blog/" . $gall->icon);

                    $gthumbnail = base_url("uploads/blog/" . $gall->thumbnail);

                    $gbanner = base_url("uploads/blog/" . $gall->banner);

                    $newcont .= str_replace(array(
                        '[LINK]',
                        '[TITLE]',
                        '[AUTHOR]',
                        '[SHORT]',
                        '[CONTENT]',
                        '[ICON]',
                        '[THUMBNAIL]',
                        '[BANNER]'
                    ) , array(
                        $glink,
                        $gtitle,
                        $gauthor,
                        $gshort_detail,
                        cleanOut($gcontent) ,
                        $gicon,
                        $gthumbnail,
                        $gbanner
                    ) , $content);

                }

                $content = $newcont;

            }

            return $content;

        }
        elseif (isset($array['ids']) && $array['ids'] != "")
        {

            if (strpos($array['ids'], '|') !== false)
            {

                $blogs = explode("|", $array['ids']);

                $newcont = '';

                foreach ($blogs as $blog)
                {

                    $gall = getSingleValuee("blogs", "id", $blog->id);

                    $glink = getSeoLink("blogs", $gall->id);

                    $gtitle = $gall->title;

                    $gauthor = $gall->author;

                    $gshort_detail = $gall->short_detail;

                    $gcontent = cleanOut($gall->content);

                    $gicon = base_url("uploads/blog/" . $gall->icon);

                    $gthumbnail = base_url("uploads/blog/" . $gall->thumbnail);

                    $gbanner = base_url("uploads/blog/" . $gall->banner);

                    $newcont .= str_replace(array(
                        '[LINK]',
                        '[TITLE]',
                        '[AUTHOR]',
                        '[SHORT]',
                        '[CONTENT]',
                        '[ICON]',
                        '[THUMBNAIL]',
                        '[BANNER]'
                    ) , array(
                        $glink,
                        $gtitle,
                        $gauthor,
                        $gshort_detail,
                        cleanOut($gcontent) ,
                        $gicon,
                        $gthumbnail,
                        $gbanner
                    ) , $content);

                }

            }
            else
            {

                $newcont = '<div class="text-center">[Invalid gallery ids]</div>';

            }

            $content = $newcont;

            return $content;

        }
        elseif (isset($array['id']) && $array['id'] != "")
        {

            $gall = getSingleValuee("blogs", "id", $array['id']);

            $glink = getSeoLink("blogs", $gall->id);

            $gtitle = $gall->title;

            $gauthor = $gall->author;

            $gshort_detail = $gall->short_detail;

            $gcontent = cleanOut($gall->content);

            $gicon = base_url("uploads/blog/" . $gall->icon);

            $gthumbnail = base_url("uploads/blog/" . $gall->thumbnail);

            $gbanner = base_url("uploads/blog/" . $gall->banner);

            $content = str_replace(array(
                '[LINK]',
                '[TITLE]',
                '[AUTHOR]',
                '[SHORT]',
                '[CONTENT]',
                '[ICON]',
                '[THUMBNAIL]',
                '[BANNER]'
            ) , array(
                $glink,
                $gtitle,
                $gauthor,
                $gshort_detail,
                cleanOut($gcontent) ,
                $gicon,
                $gthumbnail,
                $gbanner
            ) , $content);

            return $content;

        }
        else
        {

            return $content;

        }

    }

}

if (!function_exists('products_shortcode'))
{
    function products_shortcode($array)
    {
        if (!isset($array['template']))
        {
            return '<div class="text-center">[Invalid product Template]</div>';
        }
        $content = getValuee("content", "shortcode_templete", "id", $array["template"]);
        if (empty($content))
        {
            return '<div class="text-center">[Invalid product Template id]</div>';
        }
        $CI = & get_instance();
        $CI
            ->load
            ->library('Flexi_cart');

        if (isset($array['start']) && $array['start'] != "")
        {
            $ggstart = intval($array['start']);
        }
        else
        {
            $ggstart = 0;
        }
        if (isset($array['limit']) && $array['limit'] != "")
        {
            $gglimit = intval($array['limit']);
        }
        else
        {
            $gglimit = null;
        }
        if (isset($array['sort']) && $array['sort'] != "")
        {
            $ggsort = $array['sort'];
        }
        else
        {
            $ggsort = null;
        }
        if (isset($array['sorttype']) && $array['sorttype'] != "")
        {
            $ggsorttype = $array['sorttype'];
        }
        else
        {
            $ggsorttype = null;
        }
        if (isset($array['exclude']) && $array['exclude'] != "")
        {
            $exclude1 = $array['exclude'];
            if (strpos($exclude1, '|') !== false)
            {
                $ggexclude = explode("|", $exclude1);
            }
            else
            {
                $ggexclude = $exclude1;
            }
        }
        else
        {
            $ggexclude = null;
        }

        if (isset($array["type"]) && $array["type"] != "")
        {
            $products = getValues("products", "is_" . $array["type"], "1", $gglimit, $ggsort, $ggsorttype, $ggexclude, "is_active", "1", $ggstart);
            if (!empty($products))
            {
                $newcont = '';
                foreach ($products as $product)
                {
                    $glink = base_url("product/" . $product->slug);
                    $gtitle = $product->title;
                    $img_alt = $product->img_alt;
                    $garticle = $product->article;
                    $gshort_detail = $product->short_detail;
                    $varprice = getVarmaxprice($product->id);
                    $prdprices = getuserprdprice($product->id);
                    $prodnewprice = $prdprices["new_price"];
                    $prodoldprice = $prdprices["old_price"];
                    if ($prodoldprice == 0)
                    {
                        if ($varprice == 0)
                        {
                            if ($prodnewprice == 0)
                            {
                                // $finalprice = "Call for pricing";
                                $finalprice = "<div>Call for pricing: +61 (0)3 9239 2000</div>";
                            }
                            else
                            {
                                $finalprice = '<div>' . $CI
                                    ->flexi_cart
                                    ->get_currency_symbol() . $prodnewprice . '</div>';
                            }
                        }
                        else
                        {
                            $nn1pricee = $prodnewprice + $varprice;
                            $mm1pricee = number_format($nn1pricee, 2);
                            $finalprice = '<div>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $prodnewprice . ' - ' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm1pricee . '</div>';
                        }
                    }
                    else
                    {
                        if ($varprice == 0)
                        {
                            $nn2pricee = $prodnewprice + $varprice;
                            $mm2pricee = number_format($nn2pricee, 2);
                            $nn3pricee = $prodoldprice + $varprice;
                            $mm3pricee = number_format($nn3pricee, 2);
                            $finalprice = '<div>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm2pricee . '<span>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm3pricee . '</span></div>';
                        }
                        else
                        {
                            $nn4pricee = $prodnewprice + $varprice;
                            $mm4pricee = number_format($nn4pricee, 2);
                            $nn5pricee = $prodoldprice + $varprice;
                            $mm5pricee = number_format($nn5pricee, 2);
                            $finalprice = '<div>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $prodnewprice . ' - ' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm4pricee . '<span>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $prodoldprice . ' - ' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm5pricee . '</span></div>';
                        }
                    }
                    $gprice = $finalprice;
                    if ($product->discounted_price <= 0)
                    {
                        $goldprice = "";
                    }
                    else
                    {
                        $goldprice = $CI
                            ->flexi_cart
                            ->get_currency_symbol() . $product->discounted_price;
                    }
                    $gimage = base_url("uploads/products/small/" . $product->image);
                    $newcont .= str_replace(array(
                        '[img_alt]',
                        '[LINK]',
                        '[TITLE]',
                        '[ARTICLE]',
                        '[SHORT]',
                        '[PRICE]',
                        '[OLDPRICE]',
                        '[IMAGE]'
                    ) , array(
                        $img_alt,
                        $gtitle,
                        $garticle,
                        $gshort_detail,
                        $gprice,
                        $goldprice,
                        $gimage
                    ) , $content);
                }
                $content = $newcont;
            }
            else
            {
                $content = '<div class="col-md-12 text-center"><p class="p-3 bg-warning">No record found!</p></div>';
            }
            return $content;
        }
        elseif (isset($array["category"]) && $array["category"] != "")
        {
            $products = getValuesCategories("products", "products_sel_categories", "product_id", "productcategory_id", $array['category'], $gglimit, $ggsort, $ggsorttype, $ggexclude, $ggstart);
            if (!empty($products))
            {
                $newcont = '';
                foreach ($products as $product)
                {
                    $glink = base_url("product/" . $product->slug);
                    $gtitle = $product->title;
                    $img_alt = $product->img_alt;
                    $garticle = $product->article;
                    $gshort_detail = $product->short_detail;
                    $varprice = getVarmaxprice($product->id);
                    $prdprices = getuserprdprice($product->id);
                    $prodnewprice = $prdprices["new_price"];
                    $prodoldprice = $prdprices["old_price"];
                    if ($prodoldprice == 0)
                    {
                        if ($varprice == 0)
                        {
                            if ($prodnewprice == 0)
                            {
                                // $finalprice = "Call for pricing";
                                $finalprice = "<div>Call for pricing: +61 (0)3 9239 2000</div>";
                            }
                            else
                            {
                                $finalprice = '<div>' . $CI
                                    ->flexi_cart
                                    ->get_currency_symbol() . $prodnewprice . '</div>';
                            }
                        }
                        else
                        {
                            $nn1pricee = $prodnewprice + $varprice;
                            $mm1pricee = number_format($nn1pricee, 2);
                            $finalprice = '<div>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $prodnewprice . ' - ' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm1pricee . '</div>';
                        }
                    }
                    else
                    {
                        if ($varprice == 0)
                        {
                            $nn2pricee = $prodnewprice + $varprice;
                            $mm2pricee = number_format($nn2pricee, 2);
                            $nn3pricee = $prodoldprice + $varprice;
                            $mm3pricee = number_format($nn3pricee, 2);
                            $finalprice = '<div>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm2pricee . '<span>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm3pricee . '</span></div>';
                        }
                        else
                        {
                            $nn4pricee = $prodnewprice + $varprice;
                            $mm4pricee = number_format($nn4pricee, 2);
                            $nn5pricee = $prodoldprice + $varprice;
                            $mm5pricee = number_format($nn5pricee, 2);
                            $finalprice = '<div>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $prodnewprice . ' - ' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm4pricee . '<span>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $prodoldprice . ' - ' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm5pricee . '</span></div>';
                        }
                    }
                    $gprice = $finalprice;
                    if ($product->discounted_price <= 0)
                    {
                        $goldprice = "";
                    }
                    else
                    {
                        $goldprice = $CI
                            ->flexi_cart
                            ->get_currency_symbol() . $product->discounted_price;
                    }
                    $gimage = base_url("uploads/products/small/" . $product->image);
                    $newcont .= str_replace(array(
                        '[img_alt]',
                        '[LINK]',
                        '[TITLE]',
                        '[ARTICLE]',
                        '[SHORT]',
                        '[PRICE]',
                        '[OLDPRICE]',
                        '[IMAGE]'
                    ) , array(
                        $img_alt,
                        $glink,
                        $gtitle,
                        $garticle,
                        $gshort_detail,
                        $gprice,
                        $goldprice,
                        $gimage
                    ) , $content);
                }
                $content = $newcont;
            }
            return $content;
        }
        elseif (isset($array["ids"]) && $array["ids"] != "")
        {
            if (strpos($array['ids'], '|') !== false)
            {
                $products = explode("|", $array['ids']);
                $newcont = '';
                foreach ($products as $productn)
                {
                    $product = getSingleValuee("products", "id", $productn->id);
                    $glink = base_url("product/" . $product->slug);
                    $gtitle = $product->title;
                    $garticle = $product->article;
                    $gshort_detail = $product->short_detail;
                    $varprice = getVarmaxprice($product->id);
                    $prdprices = getuserprdprice($product->id);
                    $prodnewprice = $prdprices["new_price"];
                    $prodoldprice = $prdprices["old_price"];
                    if ($prodoldprice == 0)
                    {
                        if ($varprice == 0)
                        {
                            if ($prodnewprice == 0)
                            {
                                // $finalprice = "Call for pricing";
                                $finalprice = "<div>Call for pricing: +61 (0)3 9239 2000</div>";
                            }
                            else
                            {
                                $finalprice = '<div>' . $CI
                                    ->flexi_cart
                                    ->get_currency_symbol() . $prodnewprice . '</div>';
                            }
                        }
                        else
                        {
                            $nn1pricee = $prodnewprice + $varprice;
                            $mm1pricee = number_format($nn1pricee, 2);
                            $finalprice = '<div>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $prodnewprice . ' - ' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm1pricee . '</div>';
                        }
                    }
                    else
                    {
                        if ($varprice == 0)
                        {
                            $nn2pricee = $prodnewprice + $varprice;
                            $mm2pricee = number_format($nn2pricee, 2);
                            $nn3pricee = $prodoldprice + $varprice;
                            $mm3pricee = number_format($nn3pricee, 2);
                            $finalprice = '<div>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm2pricee . '<span>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm3pricee . '</span></div>';
                        }
                        else
                        {
                            $nn4pricee = $prodnewprice + $varprice;
                            $mm4pricee = number_format($nn4pricee, 2);
                            $nn5pricee = $prodoldprice + $varprice;
                            $mm5pricee = number_format($nn5pricee, 2);
                            $finalprice = '<div>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $prodnewprice . ' - ' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm4pricee . '<span>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $prodoldprice . ' - ' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm5pricee . '</span></div>';
                        }
                    }
                    $gprice = $finalprice;
                    if ($product->discounted_price <= 0)
                    {
                        $goldprice = "";
                    }
                    else
                    {
                        $goldprice = $CI
                            ->flexi_cart
                            ->get_currency_symbol() . $product->discounted_price;
                    }
                    $gimage = base_url("uploads/products/small/" . $product->image);
                    $newcont .= str_replace(array(
                        '[LINK]',
                        '[TITLE]',
                        '[ARTICLE]',
                        '[SHORT]',
                        '[PRICE]',
                        '[OLDPRICE]',
                        '[IMAGE]'
                    ) , array(
                        $glink,
                        $gtitle,
                        $garticle,
                        $gshort_detail,
                        $gprice,
                        $goldprice,
                        $gimage
                    ) , $content);
                }
            }
            else
            {
                $newcont = '<div class="text-center">[Invalid gallery ids]</div>';
            }
            $content = $newcont;
            return $content;
        }
        elseif (isset($array["all"]) && $array["all"] != "")
        {
            $products = getValues("products", "is_active", "1", $gglimit, $ggsort, $ggsorttype, $ggexclude, null, null, $ggstart);
            if (!empty($products))
            {
                $newcont = '';
                foreach ($products as $product)
                {
                    $glink = base_url("product/" . $product->slug);
                    $gtitle = $product->title;
                    $garticle = $product->article;
                    $gshort_detail = $product->short_detail;
                    $varprice = getVarmaxprice($product->id);
                    $prdprices = getuserprdprice($product->id);
                    $prodnewprice = $prdprices["new_price"];
                    $prodoldprice = $prdprices["old_price"];
                    if ($prodoldprice == 0)
                    {
                        if ($varprice == 0)
                        {
                            if ($prodnewprice == 0)
                            {
                                // $finalprice = "Call for pricing";
                                $finalprice = "<div>Call for pricing: +61 (0)3 9239 2000</div>";
                            }
                            else
                            {
                                $finalprice = '<div>' . $CI
                                    ->flexi_cart
                                    ->get_currency_symbol() . $prodnewprice . '</div>';
                            }
                        }
                        else
                        {
                            $nn1pricee = $prodnewprice + $varprice;
                            $mm1pricee = number_format($nn1pricee, 2);
                            $finalprice = '<div>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $prodnewprice . ' - ' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm1pricee . '</div>';
                        }
                    }
                    else
                    {
                        if ($varprice == 0)
                        {
                            $nn2pricee = $prodnewprice + $varprice;
                            $mm2pricee = number_format($nn2pricee, 2);
                            $nn3pricee = $prodoldprice + $varprice;
                            $mm3pricee = number_format($nn3pricee, 2);
                            $finalprice = '<div>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm2pricee . '<span>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm3pricee . '</span></div>';
                        }
                        else
                        {
                            $nn4pricee = $prodnewprice + $varprice;
                            $mm4pricee = number_format($nn4pricee, 2);
                            $nn5pricee = $prodoldprice + $varprice;
                            $mm5pricee = number_format($nn5pricee, 2);
                            $finalprice = '<div>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $prodnewprice . ' - ' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm4pricee . '<span>' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $prodoldprice . ' - ' . $CI
                                ->flexi_cart
                                ->get_currency_symbol() . $mm5pricee . '</span></div>';
                        }
                    }
                    $gprice = $finalprice;

                    if ($product->discounted_price <= 0)
                    {
                        $goldprice = "";
                    }
                    else
                    {
                        $goldprice = $CI
                            ->flexi_cart
                            ->get_currency_symbol() . $product->discounted_price;
                    }

                    $gimage = base_url("uploads/products/small/" . $product->image);
                    $newcont .= str_replace(array(
                        '[LINK]',
                        '[TITLE]',
                        '[ARTICLE]',
                        '[SHORT]',
                        '[PRICE]',
                        '[OLDPRICE]',
                        '[IMAGE]'
                    ) , array(
                        $glink,
                        $gtitle,
                        $garticle,
                        $gshort_detail,
                        $gprice,
                        $goldprice,
                        $gimage
                    ) , $content);
                }
                $content = $newcont;
            }
            else
            {
                $content = '<div class="col-md-12 text-center"><p class="p-3 bg-warning">No record found!</p></div>';
            }
            return $content;
        }
        elseif (isset($array["id"]) && $array["id"] != "")
        {
            $newcont = '';
            $product = getSingleValuee("products", "id", $productn->id);
            $glink = base_url("product/" . $product->slug);
            $gtitle = $product->title;
            $garticle = $product->article;
            $gshort_detail = $product->short_detail;
            $varprice = getVarmaxprice($product->id);
            $prdprices = getuserprdprice($product->id);
            $prodnewprice = $prdprices["new_price"];
            $prodoldprice = $prdprices["old_price"];
            if ($prodoldprice == 0)
            {
                if ($varprice == 0)
                {
                    if ($prodnewprice == 0)
                    {
                        // $finalprice = "Call for pricing";
                        $finalprice = "<div>Call for pricing: +61 (0)3 9239 2000</div>";
                    }
                    else
                    {
                        $finalprice = '<div>' . $CI
                            ->flexi_cart
                            ->get_currency_symbol() . $prodnewprice . '</div>';
                    }
                }
                else
                {
                    $nn1pricee = $prodnewprice + $varprice;
                    $mm1pricee = number_format($nn1pricee, 2);
                    $finalprice = '<div>' . $CI
                        ->flexi_cart
                        ->get_currency_symbol() . $prodnewprice . ' - ' . $CI
                        ->flexi_cart
                        ->get_currency_symbol() . $mm1pricee . '</div>';
                }
            }
            else
            {
                if ($varprice == 0)
                {
                    $nn2pricee = $prodnewprice + $varprice;
                    $mm2pricee = number_format($nn2pricee, 2);
                    $nn3pricee = $prodoldprice + $varprice;
                    $mm3pricee = number_format($nn3pricee, 2);
                    $finalprice = '<div>' . $CI
                        ->flexi_cart
                        ->get_currency_symbol() . $mm2pricee . '<span>' . $CI
                        ->flexi_cart
                        ->get_currency_symbol() . $mm3pricee . '</span></div>';
                }
                else
                {
                    $nn4pricee = $prodnewprice + $varprice;
                    $mm4pricee = number_format($nn4pricee, 2);
                    $nn5pricee = $prodoldprice + $varprice;
                    $mm5pricee = number_format($nn5pricee, 2);
                    $finalprice = '<div>' . $CI
                        ->flexi_cart
                        ->get_currency_symbol() . $prodnewprice . ' - ' . $CI
                        ->flexi_cart
                        ->get_currency_symbol() . $mm4pricee . '<span>' . $CI
                        ->flexi_cart
                        ->get_currency_symbol() . $prodoldprice . ' - ' . $CI
                        ->flexi_cart
                        ->get_currency_symbol() . $mm5pricee . '</span></div>';
                }
            }
            $gprice = $finalprice;
            $goldprice = $CI
                ->flexi_cart
                ->get_currency_symbol() . $product->discounted_price;
            $gimage = base_url("uploads/products/small/" . $product->image);
            $newcont .= str_replace(array(
                '[LINK]',
                '[TITLE]',
                '[ARTICLE]',
                '[SHORT]',
                '[PRICE]',
                '[OLDPRICE]',
                '[IMAGE]'
            ) , array(
                $glink,
                $gtitle,
                $garticle,
                $gshort_detail,
                $gprice,
                $goldprice,
                $gimage
            ) , $content);
            $content = $newcont;
            return $content;
        }
        else
        {
            return $content;
        }
    }
}

if (!function_exists('shortCodex'))
{

    function shortCodex($content)
    {

        $CI = & get_instance();

        $CI
            ->load
            ->library('shortcodex');

        $content = cleanOut($content);

        $shortcodes = $CI->shortcodex::parse_shortcodes($content);

        if (!$shortcodes)
        {

            return $content;

        }

        foreach ($shortcodes as $shortcode)
        {

            $funcname = $shortcode['name'] . "_shortcode";

            if (is_array($shortcode['attrs']))
            {

                foreach ($shortcode['attrs'] as $key => $val)
                {

                    $shortcode['attrs'][$key] = trim($val, '"');

                }

            }

            if (function_exists($funcname))
            {

                $content = str_replace($shortcode['shortcode'], $funcname($shortcode['attrs']) , $content);

            }
            else
            {

                if (isset($shortcode['content']))
                {

                    $newtag = "\r\n" . '<' . $shortcode['name'] . ' ';

                    foreach ($shortcode['attrs'] as $attr => $value)
                    {

                        $newtag .= $attr . "=\"" . $value . "\" ";

                    }

                    $newtag .= '>' . $shortcode['content'] . '</' . $shortcode['name'] . '>' . "\r\n";

                    $content = str_replace($shortcode['shortcode'], $newtag, $content);

                }

            }

        }

        return $content;

    }

}

if (!function_exists('check_image'))
{

    function check_image($path, $file)

    {

        if ($file != "")
        {

            if (file_exists(UPLOADPATH . $path . $file))
            {

                $image = base_url() . "uploads/" . $path . $file;

            }
            else
            {

                $image = base_url() . "files/assets/images/blank.jpg";

            }

        }
        else
        {

            $image = base_url() . "files/assets/images/blank.jpg";

        }

        return $image;

    }

}

if (!function_exists('getFileType'))
{

    function getFileType($ext, $type)
    {

        if ($type == "file")
        {

            if ($ext == ".jpg" || $ext == ".png" || $ext == ".gif" || $ext == ".jpeg")
            {

                $fileicon = base_url("files/backend/images/image.jpg");

            }
            elseif ($ext == ".doc" || $ext == ".docx")
            {

                $fileicon = base_url("files/backend/images/word.jpg");

            }
            elseif ($ext == ".xls")
            {

                $fileicon = base_url("files/backend/images/excel.jpg");

            }
            elseif ($ext == ".pdf")
            {

                $fileicon = base_url("files/backend/images/pdf.jpg");

            }
            elseif ($ext == ".zip" || $ext == ".gzip" || $ext == ".rar")
            {

                $fileicon = base_url("files/backend/images/archive.jpg");

            }
            else
            {

                $fileicon = base_url("files/backend/images/blank.jpg");

            }

        }
        else
        {

            $fileicon = base_url("files/backend/images/video.jpg");

        }

        return $fileicon;

    }

}

if (!function_exists('getCategoryTreeIDs'))
{

    function getCategoryTreeIDs($table, $catID)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where("id", $catID);

        $query = $CI
            ->db
            ->get($table);

        $result = $query->row();

        $path = array();

        if (!$result->parent_id == 0)
        {

            $path[] = $result->slug;

            $path = array_merge(getCategoryTreeIDs($table, $result->parent_id) , $path);

        }
        else
        {

            $path[] = $result->slug;

        }

        return $path;

    }

}

if (!function_exists('getPagesTreeIDs'))
{

    function getPagesTreeIDs($table, $id)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where("id", $id);

        $query = $CI
            ->db
            ->get($table);

        $result = $query->row();

        $path = array();

        if (isset($result))
        {

            if (!$result->parent_id == 0)
            {

                $path[] = $result->id;

                $path = array_merge(getPagesTreeIDs($table, $result->parent_id) , $path);

            }
            else
            {

                $path[] = $result->id;

            }

        }

        return $path;

    }

}

if (!function_exists('getPagesSlugs'))
{

    function getPagesSlugs($table, $parent_id)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where("id", $parent_id);

        $query = $CI
            ->db
            ->get($table);

        $result = $query->row();

        $path = array();

        if (isset($result))
        {

            if (!$result->parent_id == 0)
            {

                $path[] = $result->slug;

                $path = array_merge(getPagesSlugs($table, $result->parent_id) , $path);

            }
            else
            {

                $path[] = $result->slug;

            }

        }

        return $path;

    }

}

if (!function_exists('makeslugs'))
{

    function makeslugs($table, $parent)
    {

        $path = getPagesSlugs($table, $parent);

        $numItems = count($path);

        $ddb = '';

        for ($i = 0;$i <= $numItems - 1;$i++)
        {

            $ddb .= $path[$i] . '/';

        }

        return $ddb;

    }

}

if (!function_exists('showPagesBreadCrumb'))
{

    function showPagesBreadCrumb($table, $id)
    {

        $array = getPagesTreeIDs($table, $id);

        $numItems = count($array);

        $ddb = '<ul class="breadcrumbb">';
        $ddb .= '<li><a href="' . base_url() . '">Home</a></li>';

        for ($i = 0;$i <= $numItems - 1;$i++)
        {

            if ($array[$i] != $id)
            {

                $ddb .= '<li><a href="' . getSeoLink($table, $array[$i]) . '">' . getCmsN($array[$i]) . '</a></li>';

            }
            else
            {

                $ddb .= '<li>' . getCmsN($array[$i]) . '</li>';

            }

        }

        $ddb .= '</ul>';

        return $ddb;

    }

}

if (!function_exists('showCatsBreadCrumb'))
{

    function showCatsBreadCrumb($table, $id, $pg_link = false)
    {

        if ($id == 0)
        {
            $ddb = '<ol class="breadcrumbb">';
            $ddb .= '<li class="breadcrumb-item"><a href="' . base_url() . '">Home</a></li>';
            $ddb .= '<li class="breadcrumb-item">Products</li>';
            $ddb .= '</ol>';
        }
        else
        {
            $array = getPagesTreeIDs($table, $id);
            $numItems = count($array);
            $ddb = '<ol class="breadcrumb">';
            $ddb .= '<li class="breadcrumb-item"><a href="' . base_url() . '">Home</a></li>';
            $ddb .= '<li class="breadcrumb-item"><a href="' . base_url('shop/') . '">Shop</a></li>';
            for ($i = 0;$i <= $numItems - 1;$i++)
            {
                if ($array[$i] != $id)
                {
                    $ddb .= '<li class="breadcrumb-item"><a href="' . getSeoLink($table, $array[$i]) . '">' . getValuee("title", $table, "id", $array[$i]) . '</a></li>';
                }
                else
                {
                    if ($pg_link)
                    {
                        $ddb .= '<li class="breadcrumb-item"><a href="' . getSeoLink($table, $array[$i]) . '">' . getValuee("title", $table, "id", $array[$i]) . '</a></li>';
                    }
                    else
                    {
                        $ddb .= '<li class="breadcrumb-item">' . getValuee("title", $table, "id", $array[$i]) . '</li>';
                    }
                }
            }
            $ddb .= '</ol>';
        }
        return $ddb;
    }

}

if (!function_exists('showBlogsBreadCrumb'))
{

    function showBlogsBreadCrumb($table, $id)
    {

        $parent_id = getValuee("blogcategory_id", "blogs_sel_categories", "blog_id", $id);

        $cat = getSingleValuee("blogs_categories", "id", $parent_id);

        $ddb = '<a href="' . base_url() . '">Home</a> / ';

        if ($cat)
        {

            $ddb .= '<a href="' . base_url("topics/" . $cat->slug . "/") . '">' . $cat->title . '</a>';

        }

        return $ddb;

    }

}

if (!function_exists('showBlogscatBreadCrumb'))
{

    function showBlogscatBreadCrumb($title, $slug)
    {

        $ddb = '<a href="' . base_url() . '">Home</a> / ';

        $ddb .= '<a href="' . base_url("topics/" . $slug . "/") . '">' . $title . '</a>';

        return $ddb;

    }

}

if (!function_exists('getSeoLink'))
{

    function getSeoLink($type, $id)
    {

        if ($type == "cms")
        {

            $parents = getCategoryTreeIDs("cms", $id);

            $sel = '';

            foreach ($parents as $parent)
            {

                $sel .= $parent . "/";

            }

            $link_a = base_url() . $sel;

        }
        elseif ($type == "blogs")
        {

            $link_a = base_url() . getValuee("slug", "blogs", "id", $id);

        }
        elseif ($type == "products_categories")
        {

            $parents = getCategoryTreeIDs("products_categories", $id);

            $sel = '';

            foreach ($parents as $parent)
            {

                $sel .= $parent . "/";

            }

            $link_a = base_url() . "product-category/" . $sel;

        }
        elseif ($type == "products")
        {

            $link_a = base_url() . "product/" . getValuee("article", "products", "id", $id) . "/";

        }
        elseif ($type == "blogs_categories")
        {

            $link_a = base_url() . "topics/" . getValuee("slug", "blogs_categories", "id", $id) . "/";

        }

        return $link_a;

    }

}

if (!function_exists('getNSeoLink'))
{

    function getNSeoLink($type, $id)
    {

        if ($type == "cms")
        {

            $parents = getCategoryTreeIDs("cms", $id);

            $sel = '';

            foreach ($parents as $parent)
            {

                $sel .= $parent . "/";

            }

            $link_a = base_url() . $sel;

        }
        elseif ($type == "blogs")
        {

            $link_a = base_url() . getValuee("slug", "blogs", "id", $id);

        }
        elseif ($type == "products_categories")
        {

            $parents = getCategoryTreeIDs("products_categories", $id);

            $sel = '';

            foreach ($parents as $parent)
            {

                $sel .= $parent . "/";

            }

            $link_a = base_url() . "product-category/" . $sel;

        }
        elseif ($type == "products")
        {

            $link_a = base_url() . "product/" . getValuee("article", "products", "id", $id) . "/";

        }
        elseif ($type == "blogs_categories")
        {

            $link_a = base_url() . "topics/" . getValuee("slug", "blogs_categories", "id", $id) . "/";

        }

        return $link_a;

    }

}

if (!function_exists('getUsersdrop'))
{

    function getUsersdrop($id = "none")
    {

        $CI = & get_instance();

        $query = $CI
            ->db
            ->get("users");

        $results = $query->result();

        $rreturn = '';

        if (isset($results))
        {

            foreach ($results as $result)
            {

                if ($result->username == $id)
                {
                    $select = "selected";
                }
                else
                {
                    $select = "";
                }

                $rreturn .= '<option ' . $select . ' value="' . $result->username . '">' . $result->name . '</option>';

            }

        }

        return $rreturn;

    }

}

if (!function_exists('pagination_detail'))
{

    function pagination_detail($segment, $prpage, $totalcount, $slug = false)
    {

        if ($slug)
        {

            $current_page = (is_numeric($segment)) ? $segment : 0;

        }
        else
        {

            $current_page = ($segment) ? $segment : 0;

        }

        $sh_start = ($current_page - 1) * $prpage + 1;

        if ($sh_start <= 0)
        {
            $sh_start = 1;
        }

        $sh_end = $sh_start + $prpage - 1;

        if ($sh_end < $prpage)
        {
            $sh_end = $prpage;
        }
        elseif ($sh_end > $totalcount)
        {
            $sh_end = $totalcount;
        }

        return "Showing " . $sh_start . " to " . $sh_end . " of " . $totalcount . " Results.";

    }

}

if (!function_exists('getRelatedcms'))
{

    function getRelatedcms($parent, $limit, $id)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where("parent_id", $parent);

        if ($id)
        {

            $ignore = array(
                $id
            );

            $CI
                ->db
                ->where_not_in('id', $ignore);

        }

        if ($limit)
        {
            $query = $CI
                ->db
                ->get("cms", $limit);
        }
        else
        {
            $query = $CI
                ->db
                ->get("cms");
        }

        $results = $query->result();

        return $results;

    }

}

if (!function_exists('getRelatedprd'))
{

    function getRelatedprd($id, $limit = "")
    {

        $cat = getValue("productcategory_id", "products_sel_categories", "product_id", $id);

        $CI = & get_instance();

        $query = $CI
            ->db
            ->query("SELECT products.* FROM products_sel_categories JOIN products ON products_sel_categories.product_id = products.id WHERE products_sel_categories.productcategory_id = $cat->productcategory_id $limit");

        $results = $query->result();

        return $results;

    }

}

if (!function_exists('getRelatedprods'))
{
    function getRelatedprods($pid, $limit = "")
    {

        $CI = & get_instance();

        // $CI->db->select('products.id');
        $CI
            ->db
            ->from('products');
        $CI
            ->db
            ->join('related', 'related.r_prods_id = products.id', 'INNER');
        $CI
            ->db
            ->where('related.r_table_id', $pid);
        // $CI->db->where('products.id', $pid);
        if ($limit)
        {
            $CI
                ->db
                ->limit($limit, 0);
        }
        $CI
            ->db
            ->order_by('products.id', 'RANDOM');
        $query = $CI
            ->db
            ->get();

        // $CI->db->where("r_table", "product");
        // $CI->db->where("r_table_id", $pid);
        // if($limit){$query = $CI->db->get("related",$limit);}else{$query = $CI->db->get("related");}
        $results = $query->result();
        // $xxp = $CI->db->last_query();
        return $results;
    }
}

if (!function_exists('getFeaturedPrd'))
{

    function getFeaturedPrd($limit = null)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where("is_featured", '1');

        if ($limit)
        {
            $query = $CI
                ->db
                ->get("products", $limit);
        }
        else
        {
            $query = $CI
                ->db
                ->get("products");
        }

        $results = $query->result();

        return $results;

    }

}

if (!function_exists('getAllProds'))
{
    function getAllProds($limit = null)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where("is_active", '1');

        if ($limit)
        {
            $query = $CI
                ->db
                ->get("products", $limit);
        }
        else
        {
            $query = $CI
                ->db
                ->get("products");
        }

        $results = $query->result();

        return $results;

    }
}
if (!function_exists('getAllProd'))
{
    function getAllProd($cat = null)
    {

        $CI = & get_instance();

        $results = getValuesCategories("products", "products_sel_categories", "product_id", "productcategory_id", $cat, null, "sort", "asc", null, 0);;

        return $results;

    }
}
if (!function_exists('getSelRel'))
{
    function getSelRel($product = 0, $type = "product")
    {
        if ($product == 0)
        {
            $items = array();
            return $items;
        }
        $CI = & get_instance();

        $CI
            ->db
            ->select("r_prods_id");
        $CI
            ->db
            ->where("r_table", $type);
        $CI
            ->db
            ->where("r_table_id", $product);

        $query = $CI
            ->db
            ->get("related");

        $results = $query->result();

        $items = array();
        if (!empty($results))
        {
            foreach ($results as $relprodids)
            {
                $items[] = $relprodids->r_prods_id;
            }
        }
        return $items;

    }
}

if (!function_exists('getFeaturedcat'))
{

    function getFeaturedcat($limit = null)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where("is_featured", '1');

        if ($limit)
        {
            $query = $CI
                ->db
                ->get("products_categories", $limit);
        }
        else
        {
            $query = $CI
                ->db
                ->get("products_categories");
        }

        $results = $query->result();

        return $results;

    }

}

if (!function_exists('detectDevice'))
{

    function detectDevice()
    {

        $userAgent = $_SERVER["HTTP_USER_AGENT"];

        $devicesTypes = array(

            "computer" => array(
                "msie 10",
                "msie 9",
                "msie 8",
                "windows.*firefox",
                "windows.*chrome",
                "x11.*chrome",
                "x11.*firefox",
                "macintosh.*chrome",
                "macintosh.*firefox",
                "opera"
            ) ,

            "tablet" => array(
                "tablet",
                "android",
                "ipad",
                "tablet.*firefox"
            ) ,

            "mobile" => array(
                "mobile ",
                "android.*mobile",
                "iphone",
                "ipod",
                "opera mobi",
                "opera mini"
            ) ,

            "bot" => array(
                "googlebot",
                "mediapartners-google",
                "adsbot-google",
                "duckduckbot",
                "msnbot",
                "bingbot",
                "ask",
                "facebook",
                "yahoo",
                "addthis"
            )

        );

        foreach ($devicesTypes as $deviceType => $devices)
        {

            foreach ($devices as $device)
            {

                if (preg_match("/" . $device . "/i", $userAgent))
                {

                    $deviceName = $device;

                }

            }

        }

        return ucfirst($deviceName);

    }

}

if (!function_exists('is_parent'))
{

    function is_parent($table, $id)
    {

        $CI = & get_instance();

        $CI
            ->db
            ->where('parent_id', $id);

        $query = $CI
            ->db
            ->get($table);

        $pp = $query->row();

        if (isset($pp))
        {

            return 1;

        }
        else
        {

            return 0;

        }

    }

}

if (!function_exists('getStats'))
{

    function getStats()
    {

        $CI = & get_instance();

        $query = $CI
            ->db
            ->query("SELECT SUM(pageviews) as views, SUM(uniquevisitors) as uniques, AVG(pageviews) as average, AVG(uniquevisitors) as uaverage FROM stats GROUP BY YEAR(day)");

        $select = $query->result();

        return $select;

    }

}

if (!function_exists('getyearlystate'))
{

    function getyearlystate()
    {

        $CI = & get_instance();

        $range = 'year';

        $data = array();

        $data['hits'] = array();

        $data['xaxis'] = array();

        for ($i = 1;$i <= 12;$i++)

        {

            $query = $CI
                ->db
                ->query("SELECT SUM(pageviews) AS total, SUM(uniquevisitors) as visits FROM stats WHERE YEAR(day) = '" . date('Y') . "' AND MONTH(day) = '" . $i . "' GROUP BY MONTH(day)");

            $row = $query->result();

            if (!empty($row))
            {

                $data['hits']['data'][] = $row[0]->total;

                $data['visits']['data'][] = $row[0]->visits;

            }
            else
            {

                $data['hits']['data'][] = 0;

                $data['visits']['data'][] = 0;

            }

            $data['xaxis'][] = date('M', mktime(0, 0, 0, $i, 1, date('Y')));

        }

        return $data;

    }

}

if (!function_exists('getrangeystate'))
{
    function getrangeystate($start, $end)
    {

        $CI = & get_instance();

        $data = array();

        $data['pviews'] = array();

        $data['plabels'] = array();

        $data['pvisits'] = array();

        $start = new DateTime($start);

        $end = new DateTime($end);

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($start, $interval, $end);
        foreach ($period as $dt)
        {
            $query = $CI
                ->db
                ->query("SELECT SUM(pageviews) AS total, SUM(uniquevisitors) as visits FROM stats WHERE day = '" . $dt->format("Y-m-d") . "'");
            $row = $query->result();
            if (!empty($row))
            {
                $data['pviews'][] = $row[0]->total;
                $data['pvisits'][] = $row[0]->visits;
            }
            else
            {
                $data['pviews'][] = 0;
                $data['pvisits'][] = 0;
            }
            $data['plabels'][] = $dt->format("D m-d");
        }
        return $data;
    }
}
if (!function_exists('nDaysAgoDate'))
{
    function nDaysAgoDate($day)
    {
        return date("Y-m-d", strtotime("-" . $day . " day"));
    }
}

if (!function_exists('getmonthlystate'))
{

    function getmonthlystate()
    {

        $CI = & get_instance();

        $data = array();

        $query = $CI
            ->db
            ->query("SELECT SUM(`pageviews`) AS visits, SUM(`uniquevisitors`) AS uniq FROM stats WHERE MONTH(`day`)= MONTH( CURRENT_DATE )");

        $row = $query->result();

        return $row;

    }

}

if (!function_exists('getcountryState'))
{

    function getcountryState()
    {

        $CI = & get_instance();

        $query = $CI
            ->db
            ->get("cstats");

        $result = $query->result();

        if (!empty($result))
        {

            return $result;

        }
        else
        {

            return false;

        }

    }

}

if (!function_exists('getuserGroupByuid'))
{
    function getuserGroupByuid($uid)
    {
        $result = getuserData($uid);
        if ($result)
        {
            return $result->user_group;
        }
        else
        {
            return false;
        }
    }
}
if (!function_exists('getuserData'))
{
    function getuserData($uid)
    {
        $CI = & get_instance();
        $CI
            ->db
            ->where("id", $uid);
        $query = $CI
            ->db
            ->get("users");
        $result = $query->row();
        if (!empty($result))
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
}

if (!function_exists('getuserGroup'))
{
    function getuserGroup($id)
    {
        $CI = & get_instance();
        $CI
            ->db
            ->where("id", $id);
        $query = $CI
            ->db
            ->get("usersgroup");
        $result = $query->row();
        if (!empty($result))
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
}
if (!function_exists('getAlluserGroups'))
{
    function getAlluserGroups()
    {
        $CI = & get_instance();
        $query = $CI
            ->db
            ->get("usersgroup");
        $result = $query->result();
        if (!empty($result))
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
}
if (!function_exists('getprodsprice'))
{
    function getprodsprice($pid, $gid)
    {
        $CI = & get_instance();
        $CI
            ->db
            ->where("gid", $gid);
        $CI
            ->db
            ->where("pid", $pid);
        $query = $CI
            ->db
            ->get("groups_prices");
        $result = $query->row();
        if (!empty($result))
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
}
if (!function_exists('getprodscustomprice'))
{
    function getprodscustomprice($pid, $cid)
    {
        $CI = & get_instance();
        $CI
            ->db
            ->where("cid", $cid);
        $CI
            ->db
            ->where("pid", $pid);
        $query = $CI
            ->db
            ->get("custom_prices");
        $result = $query->row();
        if (!empty($result))
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
}

if (!function_exists('getuserprdprice'))
{
    function getuserprdprice($pid, $uid = 0)
    {
        $CI = & get_instance();
        if ($uid == 0)
        {
            $usergroup = $CI
                ->session
                ->userdata('user_group');
            $uid = $CI
                ->session
                ->userdata('uid');
            //$usergroup = 3;
            // $getpricefromtable = "groups_prices";
            // $getpricefromcolumn = "gid";
            // $getpricefromcolumnvalue = $usergroup;
            if ($usergroup == 0)
            {
                $getpricefromtable = "custom_prices";
                $getpricefromcolumn = "cid";
                $getpricefromcolumnvalue = $uid;
            }
            else
            {
                $getpricefromtable = "groups_prices";
                $getpricefromcolumn = "gid";
                $getpricefromcolumnvalue = $usergroup;
            }
        }
        else
        {
            $usergroup = getuserGroupByuid($uid);
            if ($usergroup == 0)
            {
                $getpricefromtable = "custom_prices";
                $getpricefromcolumn = "cid";
                $getpricefromcolumnvalue = $uid;
            }
            else
            {
                $getpricefromtable = "groups_prices";
                $getpricefromcolumn = "gid";
                $getpricefromcolumnvalue = $usergroup;
            }
        }
        $CI
            ->db
            ->where($getpricefromcolumn, $getpricefromcolumnvalue);
        $CI
            ->db
            ->where("pid", $pid);
        $query = $CI
            ->db
            ->get($getpricefromtable);
        $result = $query->row();
        if (!empty($result))
        {
            //return $result;
            if ($getpricefromcolumn == "cid")
            {
                if ($result->is_active == 0)
                {
                    return array(
                        'new_price' => 0,
                        'old_price' => 0,
                        'price' => $result->price,
                        'sale_price' => $result->sale_price,
                        'sale_start' => $result->sale_start,
                        'sale_end' => $result->sale_end
                    );
                }
            }
            if ($result->price != 0 || $result->price != "")
            {
                if ($result->sale_price != 0 && $result->sale_price != "")
                {
                    if ($result->sale_start == 0)
                    {
                        $prod_price = $result->sale_price;
                        $old_price = $result->price;
                    }
                    else
                    {
                        if (date("Y-m-d H:i:s") >= $result->sale_start && date("Y-m-d H:i:s") <= $result->sale_end)
                        {
                            $prod_price = $result->sale_price;
                            $old_price = $result->price;
                        }
                        else
                        {
                            $prod_price = $result->price;
                            $old_price = 0;
                        }
                    }
                }
                else
                {
                    $prod_price = $result->price;
                    $old_price = 0;
                }
            }
            else
            {
                $prod_price = 0;
                $old_price = 0;
            }

        }
        else
        {
            $prod_price = 0;
            $old_price = 0;
        }
        $returndata = array(
            'new_price' => $prod_price,
            'old_price' => $old_price,
            'price' => $result->price,
            'sale_price' => $result->sale_price,
            'sale_start' => $result->sale_start,
            'sale_end' => $result->sale_end
        );
        return $returndata;
    }
}

if (!function_exists('geteasyprodprice'))
{
    function geteasyprodprice($pid, $pricetag = "div", $oldpricetag = "del", $oldalign = "r")
    {
        $CI = & get_instance();
        // $userid = $CI->session->userdata('uid');
        // $prices = getuserprdprice($pid,$userid);
        // if($prices['new_price']==0){
        //     $returndata = false;
        // }else{
        //     $CI->load->library('Flexi_cart');
        //     if($prices['old_price']==0){
        //         $returndata = '<'.$pricetag.'>'.$CI->flexi_cart->get_currency_symbol().$prices['new_price'].'</'.$pricetag.'>';
        //     }else{
        //         if($oldalign=="r"){
        //             $returndata = '<'.$pricetag.'>'.$CI->flexi_cart->get_currency_symbol().$prices['new_price'].' <'.$oldpricetag.'>'.$CI->flexi_cart->get_currency_symbol().$prices['old_price'].'</'.$oldpricetag.'></'.$pricetag.'>';
        //         }else{
        //             $returndata = '<'.$pricetag.'><'.$oldpricetag.'>'.$CI->flexi_cart->get_currency_symbol().$prices['old_price'].'</'.$oldpricetag.'> '.$CI->flexi_cart->get_currency_symbol().$prices['new_price'].'</'.$pricetag.'>';
        //         }
        //     }
        // }
        $varprice = getVarmaxprice($pid);
        $prdprices = getuserprdprice($pid);
        $CI
            ->load
            ->library('Flexi_cart');
        $prodnewprice = $prdprices["new_price"];
        $uid = $CI
            ->session
            ->userdata('uid');
        $dicount_amunt = 0;
        if($uid == ''){
            $dicount_amunt = 0;
        }else{
            $scms = getSingleValuee("users", "id", $uid);
            $price = $scms->discount;
    
            $product = $price / 100 * $prodnewprice;
    
            $dicount_amunt = $product;
        }    


        $prodnewprice = $prodnewprice - $dicount_amunt;
        $prodnewprice = number_format($prodnewprice, 2);
        $prodoldprice = $prdprices["old_price"];
        if ($prodoldprice == 0)
        {
            if ($varprice == 0)
            {
                if ($prodnewprice == 0)
                {
                    $finalprice = "<" . $pricetag . ">Call for pricing: +61 (0)3 9239 2000</" . $pricetag . ">";
                }
                else
                {
                    $finalprice = '<' . $pricetag . '>' . $CI
                        ->flexi_cart
                        ->get_currency_symbol() . ($prodnewprice) . '</' . $pricetag . '>';
                }
            }
            else
            {
                $nn1pricee = $prodnewprice + $varprice;
                $mm1pricee = number_format($nn1pricee, 2);
                $finalprice = '<' . $pricetag . '>' . $CI
                    ->flexi_cart
                    ->get_currency_symbol() . ($prodnewprice) . ' - ' . $CI
                    ->flexi_cart
                    ->get_currency_symbol() . $mm1pricee . '</' . $pricetag . '>';
            }
        }
        else
        {
            if ($varprice == 0)
            {
                $nn2pricee = $prodnewprice + $varprice;
                $mm2pricee = number_format($nn2pricee, 2);
                $nn3pricee = $prodoldprice + $varprice;
                $mm3pricee = number_format($nn3pricee, 2);
                $finalprice = '<' . $pricetag . '>' . $CI
                    ->flexi_cart
                    ->get_currency_symbol() . $mm2pricee . '<' . $oldpricetag . '>' . $CI
                    ->flexi_cart
                    ->get_currency_symbol() . $mm3pricee . '</' . $oldpricetag . '></' . $pricetag . '>';
            }
            else
            {
                $nn4pricee = $prodnewprice + $varprice;
                $mm4pricee = number_format($nn4pricee, 2);
                $nn5pricee = $prodoldprice + $varprice;
                $mm5pricee = number_format($nn5pricee, 2);
                $finalprice = '<' . $pricetag . '>' . $CI
                    ->flexi_cart
                    ->get_currency_symbol() . $prodnewprice . ' - ' . $CI
                    ->flexi_cart
                    ->get_currency_symbol() . $mm4pricee . '<' . $oldpricetag . '>' . $CI
                    ->flexi_cart
                    ->get_currency_symbol() . ($prodoldprice) . ' - ' . $CI
                    ->flexi_cart
                    ->get_currency_symbol() . ($mm5pricee) . '</' . $oldpricetag . '></' . $pricetag . '>';
            }
        }
        //$gprice = $finalprice;
        return $finalprice;
    }
}
if (!function_exists('getpaymentTypeById'))
{
    function getpaymentTypeById($id)
    {
        if ($id == 0)
        {
            return "Credit";
        }
        else
        {
            $CI = & get_instance();
            $CI
                ->db
                ->where("id", $id);
            $query = $CI
                ->db
                ->get("payments");
            $result = $query->row();
            if (!empty($result))
            {
                return $result->title;
            }
            else
            {
                return false;
            }
        }
    }
}

/*********************************/

