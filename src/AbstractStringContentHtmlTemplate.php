<?php
//
// +---------------------------------------------------------------------+
// | CODE INC. SOURCE CODE                                               |
// +---------------------------------------------------------------------+
// | Copyright (c) 2018 - Code Inc. SAS - All Rights Reserved.           |
// | Visit https://www.codeinc.fr for more information about licensing.  |
// +---------------------------------------------------------------------+
// | NOTICE:  All information contained herein is, and remains the       |
// | property of Code Inc. SAS. The intellectual and technical concepts  |
// | contained herein are proprietary to Code Inc. SAS are protected by  |
// | trade secret or copyright law. Dissemination of this information or |
// | reproduction of this material is strictly forbidden unless prior    |
// | written permission is obtained from Code Inc. SAS.                  |
// +---------------------------------------------------------------------+
//
// Author:   Joan Fabrégat <joan@codeinc.fr>
// Date:     27/07/2018
// Project:  HtmlTemplates
//

namespace CodeInc\HtmlTemplates;


/**
 * Class AbstractStringContentHtmlTemplate
 *
 * @package CodeInc\HtmlTemplates
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
abstract class AbstractStringContentHtmlTemplate extends AbstractHtmlTemplate
{
    /**
     * Page's content.
     *
     * @var string|null
     */
    private $content;

    /**
     * Return's the header HTML coder
     *
     * @return string
     */
    abstract protected function getHeader():string;

    /**
     * Returns the footer HTML code.
     *
     * @return string
     */
    abstract protected function getFooter():string;

    /**
     * @inheritdoc
     * @param string $content
     */
    public function addContent(string $content):void
    {
        $this->content .= $content;
    }

    /**
     * @inheritdoc
     * @param string $content
     */
    public function setContent(string $content):void
    {
        $this->content = $content;
    }

    /**
     * @inheritdoc
     * @return null|string
     */
    public function getContent():?string
    {
        return $this->content;
    }

    /**
     * @inheritdoc
     * @return string
     */
    public function get():string
    {
        return $this->getHeader().$this->getContent().$this->getFooter();
    }
}