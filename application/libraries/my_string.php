<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My_string{

    private $CI;

    public function __construct(){
        $this->CI =& get_instance();
    }

    public function random($leng = 10, $char = FALSE){
        if($char == FALSE) $s = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()';
        else $s = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        mt_srand((double)microtime() * 1000000);
        $salt = '';
        for ($i=0; $i<$leng; $i++){
            $salt = $salt . substr($s, (mt_rand()%(strlen($s))), 1);
        }
        return $salt;
    }
    public function encode_password($username, $password = '', $salt = ''){
        return md5($salt.$username.md5($username.$salt.md5($password).$username.$salt).$salt);
    }
    public function allow_post($param, $allow){
        $_temp = NULL;
        if(isset($param) && count($param) && isset($allow) && count($allow)){
            foreach($param as $key => $val){
                if(in_array($key, $allow) == TRUE){
                    if(is_array($val)){
                        $_temp[$key] = $val;
                    }
                    else{
                        $_temp[$key] = trim($val);
                    }
                }
            }
            return $_temp;
        }
        return $param;
    }

    public function php_redirect($url='backend/auth/login'){
        header('location:'.ITQ_BASE_URL."$url");
    }

    public function js_redirect($alert, $url){
        die('<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script type="text/javascript">alert(\''.$alert.'\'); location.href = \''.$url.'\';</script>');
    }
    public function js_reload($alert){
        die('<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script type="text/javascript">alert(\''.$alert.'\'); location.reload();</script>');
    }

    public function encode_cookie($cookie){
        return $this->random(10).base64_encode($cookie);
    }
    public function decode_cookie($cookie){
        return base64_decode(substr($cookie, 10));
    }

    public function removeutf8($str = NULL){
        $chars = array(
            'a'	=>	array('ấ','ầ','ẩ','ẫ','ậ','Ấ','Ầ','Ẩ','Ẫ','Ậ','ắ','ằ','ẳ','ẵ','ặ','Ắ','Ằ','Ẳ','Ẵ','Ặ','á','à','ả','ã','ạ','â','ă','Á','À','Ả','Ã','Ạ','Â','Ă'),
            'e' =>	array('ế','ề','ể','ễ','ệ','Ế','Ề','Ể','Ễ','Ệ','é','è','ẻ','ẽ','ẹ','ê','É','È','Ẻ','Ẽ','Ẹ','Ê'),
            'i'	=>	array('í','ì','ỉ','ĩ','ị','Í','Ì','Ỉ','Ĩ','Ị'),
            'o'	=>	array('ố','ồ','ổ','ỗ','ộ','Ố','Ồ','Ổ','Ô','Ộ','ớ','ờ','ở','ỡ','ợ','Ớ','Ờ','Ở','Ỡ','Ợ','ó','ò','ỏ','õ','ọ','ô','ơ','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ơ'),
            'u'	=>	array('ứ','ừ','ử','ữ','ự','Ứ','Ừ','Ử','Ữ','Ự','ú','ù','ủ','ũ','ụ','ư','Ú','Ù','Ủ','Ũ','Ụ','Ư'),
            'y'	=>	array('ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
            'd'	=>	array('đ','Đ'),
            '-'	=>	array(' '),
        );
        foreach ($chars as $key => $arr){
            foreach ($arr as $val){
                $str = str_replace($val, $key, $str);
            }
        }
        return $str;
    }

    public function alias($str = NULL){
        $str = $this->removeutf8($str);
        $str = preg_replace('/[^a-zA-Z0-9-]/i', '', $str);
        $str = str_replace(array(
                '------------------',
                '-----------------',
                '----------------',
                '---------------',
                '--------------',
                '-------------',
                '------------',
                '-----------',
                '----------',
                '---------',
                '--------',
                '-------',
                '------',
                '-----',
                '----',
                '---',
                '--',
            ),
            '-',
            $str
        );
        $str = str_replace(array(
                '------------------',
                '-----------------',
                '----------------',
                '---------------',
                '--------------',
                '-------------',
                '------------',
                '-----------',
                '----------',
                '---------',
                '--------',
                '-------',
                '------',
                '-----',
                '----',
                '---',
                '--',
            ),
            '-',
            $str
        );
        if(!empty($str)){
            if($str[strlen($str)-1] == '-'){
                $str = substr($str, 0, -1);
            }
            if($str[0] == '-'){
                $str = substr($str, 1);
            }
        }
        return strtolower($str);
    }
    public function encode_folder($cookie){
        return $this->random(10).base64_encode($cookie);
    }

    public function decode_folder($cookie){
        return base64_decode(substr($cookie, 10));
    }
    public function PrintLevel($myarr){
        foreach($myarr as $key => $value){
            $myarr[$key]['title']= str_repeat('|------',$value['level']).$value['title'];
        }
        return $myarr;
    }
    public function CreatLink($bannerNote,$type){
        foreach($bannerNote as $key=>$value){
            $bannerNote[$key]['link'] = $type.'/'.$value['alias'].'/'.$value['id'].'.html';
            $bannerNote[$key]['cart'] = 'them-vao-gio-hang'.'/'.$value['alias'].'/'.$value['id'].'.html';
        }
        return $bannerNote;
    }
    public function CreateLinkCat($listproduct){
        foreach ($listproduct as $key => $value) {
            $listproduct[$key]['link'] = $value['alias'].'-'.$value['type_category'].'-'.$value['id'].'.html';
        }
        return $listproduct;
    }
    public function getTitle($info){
        foreach($info as $key =>$value){
            $info[$key]['title'] = $this->model_frontend->findTitle($value['id']);
        }
        return $info;
    }
    public function CreateLinkProduct($listproduct){
        foreach ($listproduct as $key => $value) {
            $listproduct[$key]['link'] = 'san-pham/'.$value['alias'].'/'.$value['id'].'.html';
        }
        return $listproduct;
    }
    static function getIconAjax($status){
        if($status == 0){
            return '<i class="glyphicon glyphicon-remove" style="color: red;"></i>';
        }else{
            return '<i class="glyphicon glyphicon-ok"  style="color: rgb(45, 255, 0);"></i>';
        }
    }
    static function getIcon($status){
        if($status == 0){
            echo '<i class="glyphicon glyphicon-remove" style="color: red;"></i>';
        }else{
            echo '<i class="glyphicon glyphicon-ok"  style="color: rgb(45, 255, 0);"></i>';
        }
    }

}