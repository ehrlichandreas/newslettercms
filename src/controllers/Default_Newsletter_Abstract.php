<?php

class Default_Newsletter_Abstract extends EhrlichAndreas_Mvc_Controller
{
    public function init()
    {
    }
    
    /**
     * 
     * @param string $key
     * @return EhrlichAndreas_Db_Adapter_Abstract
     */
    public function getDbConnection($key = 'default')
    {
        $index = 'dbconnection' . $key;
        
        if (! EhrlichAndreas_Mvc_Registry::isRegistered($index))
        {
            $config = EhrlichAndreas_Mvc_Registry::get('config');
            
            if (isset($config['db'][$key]))
            {
                $dbConfig = $config['db']['default'];

                $dbConnection = EhrlichAndreas_Db_Db::factory($dbConfig);
                
                EhrlichAndreas_Mvc_Registry::set($index, $dbConnection);
                
                return $dbConnection;
            }
        }
        
        return EhrlichAndreas_Mvc_Registry::get($index);
    }
}

