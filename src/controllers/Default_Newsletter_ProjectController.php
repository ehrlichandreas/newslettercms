<?php

class Default_Newsletter_ProjectController extends Default_Newsletter_Abstract
{
    public function init()
    {
    }
    
    public function indexAction()
    {
        $scheme = $this->getRequest()->getScheme();

        $host = $this->getRequest()->getHttpHost();

        $urlOptions = array();

        $url = $this->_view->url($urlOptions, 'newsletter-project-list', true, true);

        header('Location: ' . $url = $scheme . '://' . $host . $url);

        die();
    }
    
    public function addAction()
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
        
        if (!empty($invokeParams['project_id']) && $invokeParams['project_id'] > 0)
        {
            $scheme = $this->getRequest()->getScheme();

            $host = $this->getRequest()->getHttpHost();

            $urlOptions = $invokeParams;

            $url = $this->_view->url($urlOptions, 'newsletter-project-edit', true, true);

            header('Location: ' . $url = $scheme . '://' . $host . $url);

            die();
        }
        
        if ($this->getRequest()->isPost())
        {
            $dbConnection = $this->getDbConnection();

            $newsletterCms = new EhrlichAndreas_NewsletterCms_ModuleExtended($dbConnection);
            
            $param = array
            (
                'name'          => $invokeParams['name'],
                'title'         => $invokeParams['title'],
                'description'   => $invokeParams['description'],
            );
            
            $project_id = $newsletterCms->addProject($param);
            
            $scheme = $this->getRequest()->getScheme();
            
            $host = $this->getRequest()->getHttpHost();
            
            $urlOptions = array
            (
                'project_id'    => $project_id,
            );
            
            $url = $this->_view->url($urlOptions, 'newsletter-project-view', true, true);
            
            header('Location: ' . $url = $scheme . '://' . $host . $url);
            
            die();
        }
        
        $scheme = $this->getRequest()->getScheme();

        $host = $this->getRequest()->getHttpHost();

        $urlOptions = array();

        $url = $this->_view->url($urlOptions, 'newsletter-project-list', true, true);

        header('Location: ' . $url = $scheme . '://' . $host . $url);

        die();
    }
    
    public function editAction()
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
        
        if (empty($invokeParams['project_id']) || $invokeParams['project_id'] < 0)
        {
            $scheme = $this->getRequest()->getScheme();

            $host = $this->getRequest()->getHttpHost();

            $urlOptions = $invokeParams;

            $url = $this->_view->url($urlOptions, 'newsletter-project-add', true, true);

            header('Location: ' . $url = $scheme . '://' . $host . $url);

            die();
        }
        
        if ($this->getRequest()->isPost())
        {
            $dbConnection = $this->getDbConnection();
            
            $newsletterCms = new EhrlichAndreas_NewsletterCms_ModuleExtended($dbConnection);
            
            $param = array
            (
                'name'          => $invokeParams['name'],
                'title'         => $invokeParams['title'],
                'description'   => $invokeParams['description'],
                'project_id'    => $invokeParams['project_id'],
            );
                
            $newsletterCms->editProject($param);
        }

        $project_id = $invokeParams['project_id'];

        $scheme = $this->getRequest()->getScheme();

        $host = $this->getRequest()->getHttpHost();

        $urlOptions = array
        (
            'project_id'    => $project_id,
        );

        $url = $this->_view->url($urlOptions, 'newsletter-project-view', true, true);

        header('Location: ' . $url = $scheme . '://' . $host . $url);

        die();
    }
    
    public function listAction()
    {
        $dbConnection = $this->getDbConnection();
        
        $newsletterCms = new EhrlichAndreas_NewsletterCms_ModuleExtended($dbConnection);
        
        $projectList = $newsletterCms->getProjectList();
        
        $this->_view->assign('projectList', $projectList);
        
        return $this->_view->render(__METHOD__);
    }
    
    public function viewAction()
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
        
        if (empty($invokeParams['project_id']) || $invokeParams['project_id'] < 0)
        {
            $scheme = $this->getRequest()->getScheme();

            $host = $this->getRequest()->getHttpHost();

            $urlOptions = $invokeParams;

            $url = $this->_view->url($urlOptions, 'newsletter-project-list', true, true);

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
        
        $dbConnection = $this->getDbConnection();
        
        $newsletterCms = new EhrlichAndreas_NewsletterCms_ModuleExtended($dbConnection);
        
        $projectRowset = $newsletterCms->getProject($param);
        
        if (count($projectRowset) == 0)
        {
            $scheme = $this->getRequest()->getScheme();
            
            $host = $this->getRequest()->getHttpHost();
            
            $urlOptions = array();
            
            $url = $this->_view->url($urlOptions, 'newsletter-project-list', true, true);
            
            header('Location: ' . $url = $scheme . '://' . $host . $url);
            
            die();
        }
        
        $this->_view->assign('project', $projectRowset[0]);
        
        return $this->_view->render(__METHOD__);
    }
    
}