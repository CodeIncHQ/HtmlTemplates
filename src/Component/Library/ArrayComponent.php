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
// Date:     08/10/2018
// Project:  UI
//
declare(strict_types=1);
namespace CodeInc\UI\Component\Library;
use CodeInc\UI\Component\ComponentInterface;


/**
 * Class ArrayComponent
 *
 * @package CodeInc\UI\Component\Library
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class ArrayComponent implements ComponentInterface, \IteratorAggregate
{
    /**
     * @var array
     */
    private $array;

    /**
     * @var string
     */
    private $glue;

    /**
     * ArrayComponent constructor.
     *
     * @param string $glue
     * @param array|null $array
     */
    public function __construct(string $glue, ?array $array = [])
    {
        $this->array = $array;
        $this->glue = $glue;
    }

    /**
     * @param string $glue
     */
    public function setGlue(string $glue):void
    {
        $this->glue = $glue;
    }

    /**
     * @return string
     */
    public function getGlue():string
    {
        return $this->glue;
    }

    /**
     * @return array|null
     */
    public function getArray():?array
    {
        return $this->array;
    }

    /**
     * @param array|null $array
     */
    public function setArray(?array $array):void
    {
        $this->array = $array;
    }

    /**
     * @param string $item
     */
    public function addEntry(string $item):void
    {
        $this->array[] = $item;
    }

    /**
     * @inheritdoc
     * @return string
     */
    public function get():string
    {
        return implode($this->glue, $this->array);
    }

    /**
     * @inheritdoc
     * @return \ArrayIterator
     */
    public function getIterator():\ArrayIterator
    {
        return new \ArrayIterator($this->array);
    }
}