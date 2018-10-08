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
 * Class FileComponent
 *
 * @package CodeInc\UI\Library\Component
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class FileComponent implements ComponentInterface
{
    /**
     * @var string
     */
    private $path;

    /**
     * FileContent constructor.
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * Returns the content
     *
     * @return string
     */
    public function get():string
    {
        if (($content = file_get_contents($this->path)) === false) {
            throw new \RuntimeException($this,
                sprintf("Unable to read the content of the file '%s'", $this->path));
        }
        return $content;
    }
}