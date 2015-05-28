<?php

class Models_User
{
    
    /**
     * reg
     * @param unknown $username
     * @param unknown $password
     * @param unknown $mobile
     * @param unknown $instrument
     * @param unknown $img
     * @return boolean
     */
    public static function reg ( $username,$password,$instrument,$homephone,$mobilephone,$first,$last,$address )
    {
        $insertArr = array(
            'email' =>$username,      
            'password' => md5($password),
            'instrument' => '',
            'status' => 1,
            'level' => 1,
            'homephone' =>$homephone,
            'mobilephone' =>$mobilephone,
            'first'=>$first,
                'last' =>$last,
                'address'=>$address,
            'registr_time' => time(),
        );
        return Lib_PdoProxy::getIns()->autoExecute('user', $insertArr);
    }
   
    /*
     * getUserInfo
     */
    public static function getUser ( $username = '',$type='' )
    {
        $where = '';
        if ( !empty($username) )
        {
            $where =  'where email="'.$username.'"';
        }
        $userinfo =  Lib_PdoProxy::getIns()->select('select * from user '.$where,$type);
        
        if ( empty($userinfo) )
        {
            return false;
        }
        else 
        {
            return $userinfo[0];
        }
    }
    
    public static function getUserAll ( )
    {
        $userinfo =  Lib_PdoProxy::getIns()->select('select * from user');
        
        if ( empty($userinfo) )
        {
            return false;
        }
        else
        {
            return $userinfo;
        }
    }
    
    
    /**
     * 更新用户信息
     * @param unknown $id
     * @param array $update
     * @return boolean
     */
    public static function doUserInfo ( $id,array $update )
    {
        $where = ' id='.$id;
        if ( !$update )
        {
            return false;
        }
        return Lib_PdoProxy::getIns()->autoExecute('user',$update,'update',$where );
    }
    
    /**
     * user login 
     * @param unknown $username
     */
    public static function userLogin ( $username,$id,$homephone,$mobilephone,$address,$level = 1 )
    {
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $id;
        $_SESSION['level'] = $level;
        $_SESSION['homephone'] = $homephone;
        $_SESSION['mobilephone'] = $mobilephone;
        $_SESSION['address'] = $address;
    }
    
    /**
     * user logout
     */
    public static function userLogout ( )
    {
        session_destroy();
    }
}