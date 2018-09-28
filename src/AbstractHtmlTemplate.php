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
// Project:  HtmlTemplates
//
namespace CodeInc\HtmlTemplates;
use CodeInc\HtmlTemplates\HtmlHeaders\HtmlHeaders;
use CodeInc\HtmlTemplates\HtmlHeaders\HtmlHeadersException;


/**
 * Class AbstractHtmlTemplate
 *
 * @package CodeInc\HtmlTemplates
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
abstract class AbstractHtmlTemplate implements HtmlTemplateInterface
{
    public const DEFAULT_CHARSET = 'utf-8';

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
     * Page's title
     *
     * @var string|null
     */
    protected $title;

    /**
     * @var HtmlHeaders
     */
    protected $headers;

    /**
     * AbstractHtmlTemplate constructor.
     *
     * @param null|string $title
     * @param null|string $language
     * @param string $charset
     * @param HtmlHeaders|null $headers
     * @throws HtmlHeadersException
     */
	public function __construct(?string $title = null, ?string $language = null,
        string $charset = self::DEFAULT_CHARSET, ?HtmlHeaders $headers = null)
    {
        $this->title = $title;
        $this->charset = $charset;
        $this->language = $language;
        $this->headers = $headers ?? new HtmlHeaders();
    }

    /**
	 * Returns the HTML title
	 *
	 * @return null|string
	 */
	public function getTitle():?string
    {
		return $this->title;
	}

    /**
	 * @param string $title
	 */
	public function setTitle(string $title):void
    {
		$this->title = $title;
	}

    /**
	 * @return string
	 */
	public function getCharset():string
    {
		return $this->charset;
	}

    /**
	 * @param string $charset
	 */
	public function setCharset(string $charset):void
    {
		$this->charset = $charset;
	}

    /**
	 * @return string
	 */
	public function getLanguage():string
    {
		return $this->language;
	}

    /**
	 * @param string $language
	 */
	public function setLanguage(string $language):void
    {
		$this->language = $language;
	}

    /**
     * @inheritdoc
     * @return HtmlHeaders
     */
    public function getHeaders():HtmlHeaders
    {
        return $this->headers;
    }
}