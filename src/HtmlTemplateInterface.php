<?php
//
// +---------------------------------------------------------------------+
// | CODE INC. SOURCE CODE                                               |
// +---------------------------------------------------------------------+
// | Copyright (c) 2019 - Code Inc. SAS - All Rights Reserved.           |
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
// Date:     20/02/2018
// Time:     14:46
// Project:  HtmlTemplates
//
namespace CodeInc\HtmlTemplates;

/**
 * Interface HtmlTemplateInterface
 *
 * @package CodeInc\HtmlTemplates
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
interface HtmlTemplateInterface
{
    /**
     * Returns the full template including the header and the footer.
     *
     * @return string
     */
    public function getHtml():string;

    /**
     * Alias of get().
     *
     * @see HtmlTemplateInterface::getHtml()
     * @return string
     */
    public function __toString():string;
}