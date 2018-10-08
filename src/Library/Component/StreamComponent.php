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
use Psr\Http\Message\StreamInterface;


/**
 * Class StreamComponent
 *
 * @package CodeInc\UI\Library\Component
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class StreamComponent implements ComponentInterface
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
    public function get():string
    {
        return $this->stream->getContents();
    }
}