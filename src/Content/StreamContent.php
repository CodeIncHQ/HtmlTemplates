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
use Psr\Http\Message\StreamInterface;


/**
 * Class StreamContent
 *
 * @package CodeInc\HtmlTemplates\Content
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class StreamContent extends AbstractContent
{
    /**
     * @var StreamInterface
     */
    private $stream;

    /**
     * StreamContent constructor.
     *
     * @param StreamInterface $stream
     */
    public function __construct(StreamInterface $stream)
    {
        $this->stream = $stream;
    }

    /**
     * @inheritdoc
     * @return string
     */
    public function toString():string
    {
        return $this->stream->getContents();
    }
}