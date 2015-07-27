<?php
if(!function_exists('common_valuepost')){
    function common_valuepost($value){
        return(isset($value) && !empty($value)?htmlspecialchars($value):"");
    }
}
if(!function_exists('common_showerror')){
    function common_showerror($error){
        $result = null;
        if(isset($error) && !empty($error)){
            $result = '<ul class="error">'.$error.'</ul>';
        }
        return $result;
    }
}

if(!function_exists('return_valuepost')){
    function return_valuepost($post){
        //return(isset($value) && !empty($value)?htmlspecialchars($value):"");
        foreach($post as $key => $value){
            return htmlspecialchars($value);
        }
    }
}
if(!function_exists('get_link_sort')){
    function get_link_sort($param){
        $str = '';
        $flag = 0;
        if(isset($param) && count($param)){
            if($param['field'] == $param['sort_field']){
                $param['sort_value'] = ($param['sort_value'] == 'asc')?'desc':'asc';
                $flag = 1;
            }
            else{
                $param['sort_field'] = $param['field'];
                $param['sort_value'] = 'asc';
            }
            foreach($param as $key => $val){
                if($key == 'base_url'){
                    $str = $val;
                }
                else if($key == 'page'){
                    $str = $str.(($val > 1)?('/'.$val):'').'?';
                }
                else if(in_array($key, array('field', 'title'))){
                    continue;
                }
                else{
                    $str = $str.$key.'='.$val.'&';
                }
            }
        }
        return '<a href="'.substr($str, 0, -1).'">'.$param['title'].(($flag == 1)?'<img src="public/template/backend/images/'.$param['sort_value'].'.png" title="'.$param['sort_field'].' '.$param['sort_value'].'"/>':'').'</a>';
    }
}
if(!function_exists('get_sort2')){
    function get_sort2($param){
        return $param = ($param == 'asc')?'desc':'asc';
    }
}
if(!function_exists('changeStatus')){
    function changeStatus($param){
        return $param = ($param == '1')?'0':'1';
    }
}
if(!function_exists('showOptionSize')){
    function showOptionSize($status){
        if($status == 1){return 'ngắn';}else{return 'dài';}
    }
}
if(!function_exists('showOptionColor')){
    function showOptionColor($status){
        if($status == 1){return 'kem';}else{return 'trắng';}
    }
}

