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
// Project:  UI
//
declare(strict_types=1);
namespace CodeInc\UI\Library\Component;
use CodeInc\UI\ComponentInterface;


/**
 * Class HtmlHeadersComponent
 *
 * @package CodeInc\UI\Library\Component
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class HtmlHeaders implements \IteratorAggregate, \Countable, ComponentInterface
{
    /**
     * @var array
     */
    protected $headers = [];

    /**
     * HtmlHeadersComponent constructor.
     *
     * @param string|string[]|iterable|null $headers
     */
    public function __construct($headers = null)
    {
        if ($headers !== null) {
            $this->add($headers);
        }
    }

    /**
     * Adds one or more headers.
     *
     * @param string|string[]|iterable $header
     */
    public function add($header):void
    {
        if (is_iterable($header)) {
            foreach ($header as $item) {
                $this->headers[] = (string)$item;
            }
        }
        else {
            $this->headers[] = (string)$header;
        }
    }

    /**
     * Adds a CSS link to the <head> tag.
     *
     * @param string $url
     * @param string $type
     * @param string $rel
     */
    public function addCss(string $url, string $type = 'text/css', string $rel = 'stylesheet'):void
    {
        $this->add(
            '<link rel="'.htmlspecialchars($rel)
            .'" type="'.htmlspecialchars($type)
            .'" href="'.htmlspecialchars($url).'">'
        );
    }

    /**
     * Adds inline CSS code to the <head> tag.
     *
     * @param string $css
     * @param string $type
     */
    public function addInlineCss(string $css, string $type = 'text/css'):void
    {
        $this->add(
            '<style type="'.htmlspecialchars($type).'">'.$css.'</style>'
        );
    }

    /**
     * Adds a JS link to the <head> tag.
     *
     * @param string $url
     * @param string|null $integrity
     * @param string|null $crossOrigin
     */
    public function addJs(string $url, ?string $integrity = null, ?string $crossOrigin = null):void
    {
        $header = '<script src="'.htmlspecialchars($url).'"';
        if ($integrity) {
            $header .= ' integrity="'.htmlspecialchars($integrity).'"';
        }
        if ($crossOrigin) {
            $header .= ' crossorigin="'.htmlspecialchars($crossOrigin).'"';
        }
        $header .= '></script>';
        $this->add($header);
    }

    /**
     * Adds inline JS code to the <head> tag.
     *
     * @param string $js
     */
    public function addInlineJs(string $js):void
    {
        $this->add('<script>'.$js.'</script>');
    }

    /**
     * Returns all the headers in an array.
     *
     * @return array
     */
    public function getAsArray():array
    {
        return $this->headers;
    }

    /**
     * Returns all the headers as a string.
     *
     * @inheritdoc
     * @return string
     */
    public function get(string $glue = "\n"):string
    {
        return implode($glue, $this->getAsArray());
    }

    /**
     * @inheritdoc
     * @return \ArrayIterator
     */
    public function getIterator():\ArrayIterator
    {
        return new \ArrayIterator($this->getAsArray());
    }

    /**
     * @inheritdoc
     * @return int
     */
    public function count():int
    {
        return count($this->headers);
    }
}