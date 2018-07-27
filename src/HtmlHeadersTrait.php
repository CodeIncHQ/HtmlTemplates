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
// Date:     19/02/2018
// Time:     20:55
// Project:  HtmlTemplates
//
namespace CodeInc\HtmlTemplates;


/**
 * Trait HtmlHeadersTrait
 *
 * @package CodeInc\HtmlTemplates
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
trait HtmlHeadersTrait
{
	/**
	 * Global headers
	 *
	 * @var array
	 */
	protected $htmlHeaders = [];

	/**
	 * Adds an header to the <head> tag.
	 *
	 * @param string $header
	 */
	public function addHtmlHeader(string $header):void
	{
		$this->htmlHeaders[] = $header;
	}

	/**
	 * Adds a CSS link to the <head> tag.
	 *
	 * @param string $url
	 */
	public function addHtmlCssHeader(string $url):void
	{
		$this->addHtmlHeader(
		    '<link rel="stylesheet" type="text/css" href="'.htmlspecialchars($url).'">'
        );
	}

	/**
	 * Adds inline CSS code to the <head> tag.
	 *
	 * @param string $css
	 */
	public function addHtmlInlineCssHeader(string $css):void
	{
		$this->addHtmlHeader('<style type="text/css">'.$css.'</style>');
	}

	/**
	 * Adds a JS link to the <head> tag.
	 *
	 * @param string $url
	 * @param string|null $integrity
	 * @param string|null $crossorigin
	 */
	public function addHtmlJsHeader(string $url, ?string $integrity = null,
        ?string $crossorigin = null):void
    {
		$tag = '<script src="'.htmlspecialchars($url).'"';
		if ($integrity) {
			$tag .= ' integrity="'.htmlspecialchars($integrity).'"';
		}
		if ($crossorigin) {
			$tag .= ' crossorigin="'.htmlspecialchars($crossorigin).'"';
		}
		$tag .= '></script>';
		$this->addHtmlHeader($tag);
	}

	/**
	 * Adds inline JS code to the <head> tag.
	 *
	 * @param string $js
	 */
	public function addHtmlInlineJsHeader(string $js):void
	{
		$this->addHtmlHeader('<script>'.$js.'</script>');
	}

	/**
	 * Returns the HTML headers.
	 *
	 * @return array
	 */
	public function getHtmlHeaders():array
	{
		return $this->htmlHeaders;
	}

	/**
	 * Returns the HTML headers as a string or null if no header is set.
	 *
	 * @param string|null $glue
	 * @return null|string
	 */
	public function getHtmlHeadersAsString(string $glue = "\n"):?string
	{
		return $this->htmlHeaders
            ? implode($glue, $this->htmlHeaders)
            : null;
	}
}