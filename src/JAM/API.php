<?php
/**
 * @author jambonbill
 * API Class
 * We are not logged in, therefore, _uid() return null
 */

namespace JAM;

use PDO;
use Exception;
use Djang;
use ReflectionClass;

class API
{
	private $_Base;
    private $_schema='jambonbill';
    private $_table='';

    public function __construct (Djang\Base $Base)
    {
        $this->_Base=$Base;
    }

    public function db()
    {
    	return $this->_Base->db();
    }

    
    private function log()
    {
        return $this->_Base->log()->withName((new ReflectionClass($this))->getShortName());
    }

}
