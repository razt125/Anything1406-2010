<?php

class Models_Musicians
{
    const TABLE = 'musicians';

    public static function musiciansList ( $where = '' )
    {
        $wheres = ' where status=1 ';
        
        if ( !empty($_SESSION) && $_SESSION['level']  == 3 )
        {
            $wheres .= ' and uid='.$_SESSION['id'];
        }
        
        if ( !empty($where) )
        {
            $wheres .= ' and ' . $where;
        }
        
        
        $sql = 'select * from '.self::TABLE.' '. $wheres. ' order by id desc';
        $result = Lib_PdoProxy::getIns()->getInfo($sql);
        return $result;
    }

    public static function musiciansAll ( $where = '' )
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
    
    public static function addMusicians ($data)
    {
        $data['create_time'] = time();
        $result = Lib_PdoProxy::getIns()->autoExecute(self::TABLE, $data);
        return $result;
    }
    
    public static function doMusicians ( $id,$data )
    {
        $where = 'id='.$id;
        Lib_PdoProxy::getIns()->autoExecute(self::TABLE, $data,'update',$where);    
    }
    
    /*
     * getUserInfo
     */
    public static function getMusicians ( $id = '',$type='' )
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
    
    public static function search ( $word )
    {
        $sql = 'select * from '.self::TABLE.' where content like "%'.$word.'%" or title like "%' .$word.'%"';
        return Lib_PdoProxy::getIns()->select($sql);
    }

}