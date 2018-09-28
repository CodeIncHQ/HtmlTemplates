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
use CodeInc\HtmlTemplates\Content\ContentInterface;
use CodeInc\HtmlTemplates\Content\StringContent;
use CodeInc\HtmlTemplates\HtmlHeaders\HtmlHeaders;
use CodeInc\HtmlTemplates\HtmlHeaders\HtmlHeadersException;


/**
 * Class AbstractSingleContentHtmlTemplate
 *
 * @package CodeInc\HtmlTemplates
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
abstract class AbstractContentHtmlTemplate extends AbstractHtmlTemplate
{
    /**
     * @var ContentInterface|StringContent
     */
    protected $content;

    /**
     * AbstractSingleContentHtmlTemplate constructor.
     *
     * @param ContentInterface|null $content
     * @param HtmlHeaders|null $headers
     * @throws HtmlHeadersException
     */
    public function __construct(?ContentInterface $content = null, ?HtmlHeaders $headers = null)
    {
        parent::__construct($headers);
        $this->content = $content ?? new StringContent();
    }

    /**
     * Returns the page's content.
     *
     * @return ContentInterface|StringContent
     */
    public function getContent():ContentInterface
    {
        return $this->content;
    }

    /**
     * Return's the header HTML coder
     *
     * @return string
     */
    abstract protected function getHtmlHeader():string;

    /**
     * Returns the footer HTML code.
     *
     * @return string
     */
    abstract protected function getHtmlFooter():string;

    /**
     * @inheritdoc
     * @return string
     */
    public function getHtml():string
    {
        return $this->getHtmlHeader()
            .$this->getContent()->toString()
            .$this->getHtmlFooter();
    }
}