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
// Date:     20/02/2018
// Time:     15:30
// Project:  UI
//
namespace CodeInc\UI\Library\Templates;
use CodeInc\UI\ComponentInterface;
use CodeInc\UI\Library\Component\HtmlHeadersComponent;
use CodeInc\UI\Library\Component\StringComponent;


/**
 * Class AbstractHtmlTemplate
 *
 * @package CodeInc\UI\Library\Templates
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
abstract class AbstractHtmlTemplate implements HtmlTemplateInterface
{
    /**
     * Page's title
     *
     * @var string|null
     */
    protected $pageTitle;

    /**
     * HTML headers.
     *
     * @var HtmlHeadersComponent
     */
    protected $headers;

    /**
	 * Page's charset
	 *
	 * @var string
	 */
	protected $charset;

    /**
	 * <html> tag language
	 *
	 * @var string|null
	 */
	protected $language;

    /**
     * Page's content.
     *
     * @var ComponentInterface
     */
	protected $content;

    /**
     * AbstractHtmlTemplate constructor.
     *
     * @param null|string $pageTitle
     * @param HtmlHeadersComponent|null $headers
     * @param ComponentInterface $content
     * @param string $charset
     * @param null|string $language
     */
	public function __construct(?string $pageTitle = null, ?HtmlHeadersComponent $headers = null,
        ?ComponentInterface $content = null, string $charset = 'utf-8', ?string $language = null)
    {
        $this->pageTitle = $pageTitle;
        $this->headers = $headers ?? new HtmlHeadersComponent();
        $this->content = $content ?? new StringComponent();
        $this->charset = $charset;
        $this->language = $language;
    }

    /**
     * Returns the HTML template's header.
     *
     * @return string
     */
    abstract protected function getTemplateHeader():string;

    /**
     * Returns the HTML template's footer.
     *
     * @return string
     */
	abstract protected function getTemplateFooter():string;

    /**
	 * Returns the page's title.
	 *
	 * @return null|string
	 */
	public function getPageTitle():?string
    {
		return $this->pageTitle;
	}

    /**
     * @inheritdoc
     * @return HtmlHeadersComponent
     */
    public function getHeaders():HtmlHeadersComponent
    {
        return $this->headers;
    }

    /**
     * Returns the page's content.
     *
     * @return ComponentInterface
     */
    public function getContent():ComponentInterface
    {
        return $this->content;
    }

    /**
     * Returns the page's charset.
     *
     * @return string
     */
    public function getCharset():string
    {
        return $this->charset;
    }

    /**
     * Returns the page's language or NULL if not set.
     *
     * @return null|string
     */
    public function getLanguage():?string
    {
        return $this->language;
    }

    /**
     * @inheritdoc
     * @return string
     */
    public function get():string
    {
        return $this->getTemplateHeader()
            .$this->getContent()->get()
            .$this->getTemplateFooter();
    }
}