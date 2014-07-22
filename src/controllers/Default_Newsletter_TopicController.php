<?php

class Default_Newsletter_TopicController extends Default_Newsletter_Abstract
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
        
        if (!empty($invokeParams['topic_id']) && $invokeParams['topic_id'] > 0)
        {
            $scheme = $this->getRequest()->getScheme();

            $host = $this->getRequest()->getHttpHost();

            $urlOptions = $invokeParams;

            $url = $this->_view->url($urlOptions, 'newsletter-topic-edit', true, true);

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
            
            $topic_id = $newsletterCms->addTopic($param);
            
            $param = array
            (
                'project_id'    => $invokeParams['project_id'],
                'topic_id'      => $topic_id,
            );
            
            $newsletterCms->addTopicToProjectExt($param);
            
            $scheme = $this->getRequest()->getScheme();
            
            $host = $this->getRequest()->getHttpHost();
            
            $urlOptions = array
            (
                'project_id'    => $invokeParams['project_id'],
                'topic_id'      => $topic_id,
            );
            
            $url = $this->_view->url($urlOptions, 'newsletter-topic-view', true, true);
            
            header('Location: ' . $url = $scheme . '://' . $host . $url);
            
            die();
        }
        
        $scheme = $this->getRequest()->getScheme();

        $host = $this->getRequest()->getHttpHost();

        $urlOptions = array
        (
            'project_id'    => $invokeParams['project_id'],
        );

        $url = $this->_view->url($urlOptions, 'newsletter-topic-list', true, true);

        header('Location: ' . $url = $scheme . '://' . $host . $url);

        die();
    }
    
    public function editAction()
    {
        $invokeParams = $this->getRequestInvokeParams();
        
        if (empty($invokeParams['topic_id']) || $invokeParams['topic_id'] < 0)
        {
            $scheme = $this->getRequest()->getScheme();

            $host = $this->getRequest()->getHttpHost();

            $urlOptions = $invokeParams;

            $url = $this->_view->url($urlOptions, 'newsletter-topic-add', true, true);

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
                'topic_id'      => $invokeParams['topic_id'],
            );
                
            $newsletterCms->editTopic($param);
        }

        $scheme = $this->getRequest()->getScheme();

        $host = $this->getRequest()->getHttpHost();

        $urlOptions = array
        (
            'project_id'    => $invokeParams['project_id'],
            'topic_id'      => $invokeParams['topic_id'],
        );

        $url = $this->_view->url($urlOptions, 'newsletter-topic-view', true, true);

        header('Location: ' . $url = $scheme . '://' . $host . $url);

        die();
    }
    
    public function listAction()
    {
        $invokeParams = $this->getRequestInvokeParams();
        
        $dbConnection = $this->getDbConnection();
        
        $newsletterCms = new EhrlichAndreas_NewsletterCms_ModuleExtended($dbConnection);
            
        $param = array
        (
            'project_id'    => $invokeParams['project_id'],
        );
        
        $topicToProjectRowset = $newsletterCms->getTopicToProjectList($param);
        
        if (empty($topicToProjectRowset))
        {
            $topicRowset = array();
        }
        else
        {
            $topic_id = array();
            
            foreach ($topicToProjectRowset as $topicToProject)
            {
                $topic_id[$topicToProject['topic_id']] = $topicToProject['topic_id'];
            }
            
            $param = array
            (
                'topic_id'  => $topic_id,
            );
        
            $topicRowset = $newsletterCms->getTopicList($param);
        }
        
        $this->_view->assign('topicRowset', $topicRowset);
        
        return $this->_view->render(__METHOD__);
    }
    
    public function viewAction()
    {
        $invokeParams = $this->getRequestInvokeParams();
        
        if (empty($invokeParams['topic_id']) || $invokeParams['topic_id'] < 0)
        {
            $scheme = $this->getRequest()->getScheme();

            $host = $this->getRequest()->getHttpHost();

            $urlOptions = $invokeParams;

            $url = $this->_view->url($urlOptions, 'newsletter-topic-list', true, true);

            header('Location: ' . $url = $scheme . '://' . $host . $url);

            die();
        }
        
        $param = array
        (
            'where' => array
            (
                'topic_id'  => $invokeParams['topic_id'],
            ),
        );
        
        $dbConnection = $this->getDbConnection();
        
        $newsletterCms = new EhrlichAndreas_NewsletterCms_ModuleExtended($dbConnection);
        
        $topicRowset = $newsletterCms->getTopic($param);
        
        if (count($topicRowset) == 0)
        {
            $scheme = $this->getRequest()->getScheme();
            
            $host = $this->getRequest()->getHttpHost();
            
            $urlOptions = array();
            
            $url = $this->_view->url($urlOptions, 'newsletter-topic-list', true, true);
            
            header('Location: ' . $url = $scheme . '://' . $host . $url);
            
            die();
        }
        
        $this->_view->assign('topic', $topicRowset[0]);
        
        return $this->_view->render(__METHOD__);
    }
    
}