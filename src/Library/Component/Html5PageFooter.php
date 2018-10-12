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
// Date:     12/10/2018
// Project:  UI
//
declare(strict_types=1);
namespace CodeInc\UI\Library\Component;
use CodeInc\UI\PrintableComponentInterface;


/**
 * Class Html5PageFooter
 *
 * @package CodeInc\UI\Library\Component
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class Html5PageFooter implements PrintableComponentInterface
{
    /**
     * @inheritdoc
     * @return string
     */
    public function get():string
    {
        ob_start();
        ?>
            </body>
        </html>
        <?
        return ob_get_clean();
    }

    /**
     * @inheritdoc
     * @see http://php.net/manual/language.oop5.magic.php#object.tostring
     * @return string
     */
    public function __toString():string
    {
        return $this->get();
    }
}