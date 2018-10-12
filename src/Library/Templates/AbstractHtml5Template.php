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
use CodeInc\UI\TemplateInterface;


/**
 * Class BlankHtml5Template
 *
 * @package CodeInc\UI\Library\Templates
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
abstract class AbstractHtml5Template implements TemplateInterface
{
    public const DEFAULT_CHARSET = 'utf-8';
    public const DEFAULT_LANGUAGE = 'en';
    public const DEFAULT_VIEWPORT = 'width=device-width, initial-scale=1, shrink-to-fit=no';

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $charset;

    /**
     * @var string
     */
    private $language;

    /**
     * @var HtmlHeaders
     */
    private $htmlHeaders;

    /**
     * @var string
     */
    private $viewport;

    /**
     * AbstractHtmlTemplate constructor.
     *
     * @param string $title
     * @param string $language
     * @param string $charset
     * @param string $viewport
     * @param HtmlHeaders|null $htmlHeaders
     */
    public function __construct(string $title = '', string $language = self::DEFAULT_LANGUAGE,
        string $charset = self::DEFAULT_CHARSET, string $viewport = self::DEFAULT_VIEWPORT,
        ?HtmlHeaders $htmlHeaders = null)
    {
        $this->title = $title;
        $this->language = $language;
        $this->charset = $charset;
        $this->viewport = $viewport;
        $this->htmlHeaders = $htmlHeaders ?? new HtmlHeaders();
    }

    /**
     * @return HtmlHeaders
     */
    public function getHtmlHeaders():HtmlHeaders
    {
        return $this->htmlHeaders;
    }

    /**
     * @param HtmlHeaders $htmlHeaders
     */
    public function setHtmlHeaders(HtmlHeaders $htmlHeaders):void
    {
        $this->htmlHeaders = $htmlHeaders;
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
    public function getTitle():string
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
     * @return string
     */
    public function getViewport():string
    {
        return $this->viewport;
    }

    /**
     * @param string $viewport
     */
    public function setViewport(string $viewport):void
    {
        $this->viewport = $viewport;
    }

    /**
     * Returns the HTML of the page's header.
     *
     * @return string
     */
    protected function getHeader():string
    {
        ob_start();
        ?>
        <!DOCTYPE html>
        <html lang="<?=htmlspecialchars($this->language)?>">
            <head>
                <meta charset="<?=htmlspecialchars($this->charset)?>">
                <meta name="viewport" content="<?=$this->viewport?>">
                <title><?=htmlspecialchars($this->title)?></title>
                <?=$this->htmlHeaders->get()?>
            </head>

            <body>
        <?
        return ob_get_clean();
    }

    /**
     * Returns the HTML of the page's footer.
     *
     * @return string
     */
    protected function getFooter():string
    {
        ob_start();
        ?>
            </body>
        </html>
        <?
        return ob_get_clean();
    }


}