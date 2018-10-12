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
use CodeInc\UI\Library\Component\HtmlHeaders;


/**
 * Class BlankHtml5Template
 *
 * @package CodeInc\UI\Library\Templates
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class BlankHtml5Template extends AbstractHtml5Template
{
    /**
     * @var string
     */
    private $content;

    /**
     * BlankHtml5Template constructor.
     *
     * @param string $title
     * @param string $content
     * @param string $language
     * @param string $charset
     * @param string $viewport
     * @param HtmlHeaders|null $htmlHeaders
     */
    public function __construct(string $title = '', string $content = '',
        string $language = self::DEFAULT_LANGUAGE, string $charset = self::DEFAULT_CHARSET,
        string $viewport = self::DEFAULT_VIEWPORT, ?HtmlHeaders $htmlHeaders = null)
    {
        parent::__construct($title, $language, $charset, $viewport, $htmlHeaders);
        $this->content = $content;
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
     * @inheritdoc
     * @return string
     */
    public function get():string
    {
        return $this->getHeader()
            .$this->content
            .$this->getFooter();
    }
}