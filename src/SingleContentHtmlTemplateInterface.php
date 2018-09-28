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
namespace CodeInc\HtmlTemplates;

/**
 * Interface SingleContentHtmlTemplateInterface
 *
 * @package CodeInc\HtmlTemplates
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
interface SingleContentHtmlTemplateInterface extends HtmlTemplateInterface
{
    /**
     * Adds come content to the HTML template.
     *
     * @param string $content
     */
    public function addContent(string $content):void;

    /**
     * Sets the content of the HTML templates (replaces all previously set or added content).
     *
     * @param string $content
     */
    public function setContent(string $content):void;

    /**
     * Returns the HTML content or NULL if no content is set.
     *
     * @return null|string
     */
    public function getContent():?string;
}