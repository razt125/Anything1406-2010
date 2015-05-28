<?php

class Models_Bulletin
{
    const TABLE = 'bulletin';

    public static function bulletinList ( $where = '' )
    {
        $wheres = ' where status=1 ';
        
        if ( !empty($where) )
        {
            $wheres .= ' and ' . $where;
        }
        
        
        $sql = 'select * from '.self::TABLE.' '. $wheres. ' order by id desc';
        $result = Lib_PdoProxy::getIns()->getInfo($sql);
        return $result;
    }

    public static function addBulletin ($data)
    {
        $data['create_time'] = time();
        $result = Lib_PdoProxy::getIns()->autoExecute(self::TABLE, $data);
        return $result;
    }
    
    public static function doBulletin ( $id,$data )
    {
        $where = 'id='.$id;
        Lib_PdoProxy::getIns()->autoExecute(self::TABLE, $data,'update',$where);    
    }
    
    /*
     * getUserInfo
     */
    public static function getBulletin ( $id = '',$type='' )
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