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
use CodeInc\UI\Library\Component\HtmlHeaders;
use CodeInc\UI\Library\Component\StringComponent;


/**
 * Class BlankHtml5Template
 *
 * @package CodeInc\UI\Library\Templates
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class BlankHtml5Template extends AbstractHtmlTemplate
{
    /**
     * Page's title
     *
     * @var string|null
     */
    protected $title;

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
     * @var StringComponent|null
     * @see BlankHtml5Template::getContent()
     */
    protected $content;

    /**
     * HTML headers.
     *
     * @var HtmlHeaders
     */
    protected $headers;

    /**
     * AbstractHtmlTemplate constructor.
     *
     * @param null|string $title
     * @param HtmlHeaders|null $headers
     * @param string $charset
     * @param null|string $language
     */
    public function __construct(?string $title = null, ?HtmlHeaders $headers = null,
        string $charset = 'utf-8', ?string $language = null)
    {
        parent::__construct($headers);
        $this->title = $title;
        $this->charset = $charset;
        $this->language = $language;
        $this->content = new StringComponent();
    }

    /**
     * Returns the page's content.
     *
     * @return StringComponent
     */
    public function getContent():StringComponent
    {
        return $this->content;
    }

    /**
     * Returns the page's title.
     *
     * @return null|string
     */
    public function getTitle():?string
    {
        return $this->title;
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
	protected function getTemplateHeader():string
	{
	    $lang = $this->getLanguage();
	    ob_start();
		?>
		<!DOCTYPE html>
		<html<?=$lang ? ' lang="'.htmlspecialchars($lang).'"' : ''?>>
			<head>
				<meta charset="<?=htmlspecialchars($this->getCharset())?>">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title><?=htmlspecialchars($this->getTitle())?></title>
				<?=$this->getHeaders()->get()?>
			</head>

			<body>
		<?
        return ob_get_clean();
	}

    /**
     * @inheritdoc
     * @return string
     */
	protected function getTemplateFooter():string
	{
	    return (string)new Html5PageFooter();
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