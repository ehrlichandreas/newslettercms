<?php

class Default_Newsletter_IndexController extends Default_Newsletter_Abstract
{
    public function indexAction()
    {
        return $this->_view->render(__METHOD__);
    }
    
    public function init()
    {
        //$dbConnection = $this->getDbConnection();
        
        //$newsletterCms = new EhrlichAndreas_NewsletterCms_ModuleExtended($dbConnection);
        
        //$newsletterCms->install();
        
        //$newsletterDbAdapter = $newsletterCms->getConnection();
    }
    
    public function navigationAction()
    {
        return $this->_view->render(__METHOD__);
    }
    
    public function projectAction()
    {
        $invokeParams = $this->getRequest()->getParams();
        
        unset($invokeParams['bootstrap']);

        unset($invokeParams['__NAMESPACE__']);

        unset($invokeParams['__CONTROLLER__']);

        unset($invokeParams['__ACTION__']);
        
		if (get_magic_quotes_gpc())
        {
			$invokeParams = json_decode(stripslashes(json_encode($invokeParams)), true);
		}
        
        $dbConnection = $this->getDbConnection();
        
        $newsletterCms = new EhrlichAndreas_NewsletterCms_ModuleExtended($dbConnection);
        
        if ($this->getRequest()->isPost())
        {
            $param = array
            (
                'name'          => $invokeParams['name'],
                'title'         => $invokeParams['title'],
                'description'   => $invokeParams['description'],
            );
            
            if (empty($invokeParams['project_id']) || $invokeParams['project_id'] < 0)
            {
                $project_id = $newsletterCms->addProject($param);
            }
            else
            {
                $param['where'] = array
                (
                    'project_id'    => $invokeParams['project_id'],
                );
                
                $newsletterCms->editProject($param);
                
                $project_id = $invokeParams['project_id'];
            }
            
            $scheme = $this->getRequest()->getScheme();
            
            $host = $this->getRequest()->getHttpHost();
            
            $urlOptions = array
            (
                'project_id'    => $project_id,
            );
            
            $url = $this->_view->url($urlOptions, 'newsletter-project', true, true);
            
            header('Location: ' . $url = $scheme . '://' . $host . $url);
            
            die();
        }
        
        $param = array
        (
            'where' => array
            (
                'project_id'    => $invokeParams['project_id'],
            ),
        );
        
        $projectRowset = $newsletterCms->getProject($param);
        
        if (count($projectRowset) == 0)
        {
            $scheme = $this->getRequest()->getScheme();
            
            $host = $this->getRequest()->getHttpHost();
            
            $urlOptions = array();
            
            $url = $this->_view->url($urlOptions, 'newsletter-projectlist', true, true);
            
            header('Location: ' . $url = $scheme . '://' . $host . $url);
            
            die();
        }
        
        $this->_view->assign('project', $projectRowset[0]);
        
        return $this->_view->render(__METHOD__);
    }
    
    public function projectlistAction()
    {
        $dbConnection = $this->getDbConnection();
        
        $newsletterCms = new EhrlichAndreas_NewsletterCms_ModuleExtended($dbConnection);
        
        $newsletterDbAdapter = $newsletterCms->getConnection();
        
        $projectList = $newsletterCms->getProjectList();
        
        $this->_view->assign('projectList', $projectList);
        
        return $this->_view->render(__METHOD__);
    }
}

