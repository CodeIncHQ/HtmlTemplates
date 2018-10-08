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

/**
 * Class BlankHtmlTemplate
 *
 * @package CodeInc\UI\Library\Templates
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class BlankHtmlTemplate extends AbstractHtmlTemplate
{
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
				<title><?=htmlspecialchars($this->getPageTitle())?></title>
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
	public function getTemplateFooter():string
	{
	    ob_start();
		?>
			</body>
		</html>
		<?
        return ob_get_clean();
	}
}