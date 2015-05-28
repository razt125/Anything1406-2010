<?php

class Models_Events
{
    const TABLE = 'events';

    public static function eventsList ( $where = '' )
    {
        $wheres = ' where status=1 ';
        
        if ( !empty($where) )
        {
            $wheres .= ' and ' . $where;
        }
        
        
        $sql = 'select * from '.self::TABLE.' '. $wheres. ' order by id desc';;
        $result = Lib_PdoProxy::getIns()->getInfo($sql);
        return $result;
    }

    public static function addEvents ($data)
    {
        $data['create_time'] = time();
        $result = Lib_PdoProxy::getIns()->autoExecute(self::TABLE, $data);
        return $result;
    }
    
    public static function doEvents ( $id,$data )
    {
        $where = 'id='.$id;
        Lib_PdoProxy::getIns()->autoExecute(self::TABLE, $data,'update',$where);    
    }
    
    /*
     * getUserInfo
     */
    public static function getEvents ( $id = '',$type='' )
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