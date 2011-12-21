<?php 
Class MinifyHelper extends AppHelper{
        
        var $helpers = array('Javascript','Html'); //used for seamless degradation when MinifyAsset is set to false;
        
        function js($assets){
            if(Configure::read('MinifyAsset')){
               e(sprintf("<script type='text/javascript' src='%s'></script>",str_replace('b=js&','',$this->_path($assets, 'js'))));
            }
            else{
                e($this->Javascript->link($assets));
            }
        }
        
        
        function css($assets){
            if(Configure::read('MinifyAsset')){
                e(sprintf("<link type='text/css' rel='stylesheet' href='%s' />",str_replace('b=css&','',$this->_path($assets, 'css'))));
            }
            else{
                e($this->Html->css($assets));
            }
        }
        
        function _path($assets, $ext){
            $path = $this->webroot . "min/b=$ext&f=";
            foreach($assets as $asset){
                $path .= ($asset . ".$ext,");
            }
            return substr($path, 0, count($path)-2);
        }
    }
?>