<?php

class BaseModel
{

    public $handle = null;

    function __construct(){
        $dns = 'mysql:host='. DB_HOST .';port='. DB_PORT .';dbname=' . DB_NAME;
        try {
            if ($this->handle == null) {
                $dbh = new PDO($dns, DB_USER, DB_PWD);
                $this->handle = $dbh;
                return $this->handle;
            }
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function select($table, $fields='*', $cond = '', $pars = array(), $orderBy = ''){
        $r = array();
        try{
            unset($pars['files']);
            if($cond){ $cond = ' where ' . $cond; }
            if($orderBy){ $orderBy = ' order by ' . $orderBy; }
            if(is_array($table)){ $table = implode(',', $table); }
            if(is_array($fields)){ $fields = implode(',', $fields); }
            $query = 'select ' . $fields . ' from ' . $table . ' ' . $cond . ' ' . $orderBy;
            $q = $this->handle->prepare($query);
            $q->execute($pars);
            $r = $q->fetchAll(PDO::FETCH_CLASS);
            return $r;
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    public function delete($table, $cond = '', $pars = array()){
        try{
            if($cond){ $cond = ' where ' . $cond; }
            if(is_array($table)){ $table = implode(',', $table); }
            $query = 'delete from ' . $table . ' ' . $cond;
            $q = $this->handle->prepare($query);
            $q->execute($pars);
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    public function query($query, $pars){
        try{
            unset($pars['files']);
            $q = $this->handle->prepare($query);
            $q->execute($pars);
            $r = $q->fetchAll(PDO::FETCH_ASSOC);

            if( intval($this->handle->lastInsertId())){
                return $this->handle->lastInsertId();
            }else{
                return true;
            }

        }catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    //aqui criamos um objeto de fechamento da conexão
    function __destruct(){
        $this->handle = NULL;
    }
} 