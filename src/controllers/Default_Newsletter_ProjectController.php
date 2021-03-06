<?php

class Default_Newsletter_ProjectController extends Default_Newsletter_Abstract
{
    
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
        $invokeParams = $this->getRequestInvokeParams();
        
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
        $invokeParams = $this->getRequestInvokeParams();
        
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
        
        $projectRowset = $newsletterCms->getProjectList();
        
        $this->_view->assign('projectRowset', $projectRowset);
        
        return $this->_view->render(__METHOD__);
    }
    
    public function viewAction()
    {
        $invokeParams = $this->getRequestInvokeParams();
        
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