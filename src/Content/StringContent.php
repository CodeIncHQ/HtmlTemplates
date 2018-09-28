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
// Date:     28/09/2018
// Project:  HtmlTemplates
//
declare(strict_types=1);
namespace CodeInc\HtmlTemplates\Content;


/**
 * Class StringContent
 *
 * @package CodeInc\HtmlTemplates\Content
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class StringContent extends AbstractContent
{
    /**
     * @var string
     */
    private $content;

    /**
     * Adds some content.
     *
     * @param string $content
     */
    public function add(string $content):void
    {
        $this->content .= $content;
    }

    /**
     * Sets or replaces the content.
     *
     * @param string $content
     */
    public function set(string $content):void
    {
        $this->content = $content;
    }

    /**
     * Verifies if the content is empty.
     *
     * @return bool
     */
    public function isEmpty():bool
    {
        return empty($this->content);
    }

    /**
     * Returns the content's length.
     *
     * @return int
     */
    public function length():int
    {
        return strlen($this->content);
    }

    /**
     * Returns the content as a string.
     *
     * @return string
     */
    public function toString():string
    {
        return $this->content;
    }
}