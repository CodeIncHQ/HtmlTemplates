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
namespace CodeInc\UI\Component\Exceptions;
use CodeInc\UI\Component\ComponentInterface;
use Throwable;


/**
 * Class ComponentRuntimeException
 *
 * @package CodeInc\UI\Component\Exceptions
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class ComponentRuntimeException extends \RuntimeException implements ComponentException
{
    /**
     * @var ComponentInterface
     */
    private $component;

    /**
     * ComponentRuntimeException constructor.
     *
     * @param ComponentInterface $component
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(ComponentInterface $component, string $message = "",
        int $code = 0, Throwable $previous = null)
    {
        $this->component = $component;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritdoc
     * @return ComponentInterface
     */
    public function getComponent():ComponentInterface
    {
        return $this->component;
    }
}