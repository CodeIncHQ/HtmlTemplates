<?php
//
// +---------------------------------------------------------------------+
// | CODE INC. SOURCE CODE                                               |
// +---------------------------------------------------------------------+
// | Copyright (c) 2017 - Code Inc. SAS - All Rights Reserved.           |
// | Visit https://www.codeinc.fr for more information about licensing.  |
// +---------------------------------------------------------------------+
// | NOTICE:  All information contained herein is, and remains the       |
// | property of Code Inc. SAS. The intellectual and technical concepts  |
// | contained herein are proprietary to Code Inc. SAS are protected by  |
// | trade secret or copyright law. Dissemination of this information or |
// | reproduction of this material  is strictly forbidden unless prior   |
// | written permission is obtained from Code Inc. SAS.                  |
// +---------------------------------------------------------------------+
//
// Author:   Joan Fabrégat <joan@codeinc.fr>
// Date:     20/02/2018
// Time:     15:21
// Project:  UI
//
namespace CodeInc\UI\Library\Templates;
use CodeInc\UI\Library\Component\Html5PageFooter;
use CodeInc\UI\Library\Component\Html5PageHeader;
use CodeInc\UI\TemplateInterface;


/**
 * Class BlankHtml5Template
 *
 * @package CodeInc\UI\Library\Templates
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class BlankHtml5Template implements TemplateInterface
{
    /**
     * @var Html5PageHeader
     */
    protected $pageHeader;

    /**
     * @var Html5PageFooter
     */
    protected $pageFooter;

    /**
     * @var string
     */
    protected $content;

    /**
     * AbstractHtmlTemplate constructor.
     *
     * @param string $content
     * @param Html5PageHeader|null $pageHeader
     * @param Html5PageFooter|null $pageFooter
     */
    public function __construct(string $content = '', ?Html5PageHeader $pageHeader = null,
        ?Html5PageFooter $pageFooter = null)
    {
        $this->content = $content;
        $this->pageHeader = $pageHeader ?? new Html5PageHeader();
        $this->pageFooter = $pageFooter ?? new Html5PageFooter();
    }


    /**
     * @return string
     */
    public function getContent():string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content):void
    {
        $this->content = $content;
    }

    /**
     * @param string $extraContent
     */
    public function addContent(string $extraContent):void
    {
        $this->content .= $extraContent;
    }

    /**
     * @return Html5PageHeader
     */
    public function getPageHeader():Html5PageHeader
    {
        return $this->pageHeader;
    }

    /**
     * @return Html5PageFooter
     */
    public function getPageFooter():Html5PageFooter
    {
        return $this->pageFooter;
    }

    /**
     * @inheritdoc
     * @return string
     */
    public function get():string
    {
        return (string)$this->pageHeader.$this->content.(string)$this->pageFooter;
    }
}