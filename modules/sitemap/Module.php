<?php
/**
 * Sitemap module
 *
 * @author Serge Larin <serge.larin@gmail.com>
 * @link http://assayer.pro/
 * @copyright 2015 Assayer Pro Company
 * @license http://opensource.org/licenses/LGPL-3.0
 */



namespace app\modules\sitemap;
/**
 * Class Module for sitemap
 *
 * @author Serge Larin <serge.larin@gmail.com>
 * @package app\modules\webmaster
 */
class Module extends \yii\base\Module
{
    /**
     * The namespace that controller classes are in.
     *
     * @var string
     * @access public
     */
    public $controllerNamespace = 'app\modules\sitemap\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
