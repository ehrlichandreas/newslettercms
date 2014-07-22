<?php

class Default_Newsletter_Abstract extends EhrlichAndreas_Mvc_Controller
{
    
    public function preDispatch()
    {
        if (! isset($this->_view->invokeParams))
        {
            $invokeParams = $this->getRequestInvokeParams();

            $this->_view->assign('invokeParams', $invokeParams);
        }
    }
    
    /**
     * 
     * @return array
     */
    public function getRequestInvokeParams()
    {
        #$invokeParams = EhrlichAndreas_Mvc_FrontController::getInstance()->getRouter()->getParams();
        
        $invokeParams = $this->getRequest()->getParams();
        
        unset($invokeParams['bootstrap']);
        
        unset($invokeParams['_optionsDb']);

        unset($invokeParams['__NAMESPACE__']);

        unset($invokeParams['__CONTROLLER__']);

        unset($invokeParams['__ACTION__']);
        
		if (get_magic_quotes_gpc())
        {
			$invokeParams = json_decode(stripslashes(json_encode($invokeParams)), true);
		}
        
        return $invokeParams;
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

