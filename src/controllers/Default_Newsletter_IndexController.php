<?php

class Default_Newsletter_IndexController extends Default_Newsletter_Abstract
{
    public function indexAction()
    {
        return $this->_view->render(__METHOD__);
    }
    
    public function init()
    {
    }
    
    public function navigationAction()
    {
        return $this->_view->render(__METHOD__);
    }
}

