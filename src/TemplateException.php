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
// Time:     15:31
// Project:  HtmlTemplates
//
namespace CodeInc\HtmlTemplates;
use CodeInc\HtmlTemplates\HtmlTemplateInterface;
use Exception;
use Throwable;


/**
 * Class TemplateException
 *
 * @package CodeInc\HtmlTemplates
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class TemplateException extends Exception
{
	/**
	 * @var HtmlTemplateInterface|null
	 */
	private $template;

	/**
	 * TemplateException constructor.
	 *
	 * @param string $message
	 * @param HtmlTemplateInterface|null $template
	 * @param null|Throwable $previous
	 */
	public function __construct(string $message,
        ?HtmlTemplateInterface $template = null,
        ?Throwable $previous = null)
    {
		$this->template = $template;
		parent::__construct($message, $previous);
	}

	/**
	 * @return HtmlTemplateInterface|null
	 */
	public function getTemplate():?HtmlTemplateInterface
    {
		return $this->template;
	}
}