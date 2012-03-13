<?php

/**
 * PostCalendar
 * 
 * @license MIT
 * @copyright   Copyright (c) 2012, Craig Heydenburg, Sound Web Development
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */
abstract class PostCalendar_CalendarView_AbstractCalendarViewBase extends Zikula_AbstractHelper
{

    const SUNDAY_IS_FIRST = 0;
    const MONDAY_IS_FIRST = 1;
    const SATURDAY_IS_FIRST = 6;

    /**
     * Zikula_View instance
     * @var object 
     */
    private $view;
    protected $template;
    protected $cacheTag;
    protected $cacheId;
    protected $viewtype;

    /**
     * Reqested date
     * @var DateTime object 
     */
    protected $requestedDate;
    protected $daysInMonth;
    protected $userFilter;
    protected $categoryFilter;
    protected $currentUser;

    /**
     * Date_Calc instance
     * @var object 
     */
    protected $calc;

    /**
     * Array of navigation links
     * @var array 
     */
    protected $navigation = array(
        'previous' => '',
        'next' => '');

    /**
     * Array of Information to build Calendar Graph
     * @var array 
     */
    protected $calendarGraph = array(
        'first' => null,
        'last' => null,
        'graph' => null);

    /**
     * collection of calendar events
     * @var collection of objects 
     */
    protected $events;

    public function __construct(Zikula_View $view, $requestedDate, $userFilter, $categoryFilter)
    {
        $this->domain = ZLanguage::getModuleDomain('PostCalendar');
        $this->view = $view;
        $this->calc = new Date_Calc();
        $this->currentUser = UserUtil::getVar('uid');

        $this->requestedDate = DateTime::createFromFormat('Ymd', $requestedDate);
        // daysInMonth probably not needed to keep as it is easly calculated
        $this->daysInMonth = $this->requestedDate->format('t');

        $this->userFilter = $userFilter;
        $this->categoryFilter = $categoryFilter;

        $this->setCacheTag();
        $this->cacheId = $this->cacheTag . '|' . $this->currentUser;
        $this->view->setCacheId($this->cacheId);

        $this->setup();
        
        $this->setTemplate();

        return $this;
    }

    abstract protected function setup();

    abstract protected function setTemplate();

    abstract protected function setCacheTag();

    abstract public function render();

    protected function isCached()
    {
        return (isset($this->template) && $this->view->is_cached($this->template));
    }

}