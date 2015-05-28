<?php

class Models_List
{
    const TABLE = 'musicians_list';

    public static function listList ( $where = '' )
    {
        
        $sql = 'select * from '.self::TABLE.' '. $wheres. ' order by id desc';;
        $result = Lib_PdoProxy::getIns()->getInfo($sql);
        return $result;
    }

    public static function listAll ( $where = '' )
    {
    
        $sql = 'select * from '.self::TABLE.' '. $where .' order by id desc';
        $result = Lib_PdoProxy::getIns()->getInfo($sql);
        return $result;
    }
    
    public static function addList ($data)
    {
        $data['create_time'] = time();
        $result = Lib_PdoProxy::getIns()->autoExecute(self::TABLE, $data);
        return $result;
    }
    
    public static function doList ( $id,$data )
    {
        $where = 'id='.$id;
        Lib_PdoProxy::getIns()->autoExecute(self::TABLE, $data,'update',$where);    
    }
    
    /*
     * getUserInfo
     */
    public static function getList ( $id = '',$type='' )
    {
        $where = '';
        if ( !empty($id) )
        {
            $where =  'where id="'.$id.'"';
        }
        $info =  Lib_PdoProxy::getIns()->select('select * from '.self::TABLE.' '.$where,$type);
    
        if ( empty($info) )
        {
            return false;
        }
        else
        {
            return $info[0];
        }
    }
    
}