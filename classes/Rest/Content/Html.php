<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * RESTful web service library.
 *
 * @package    jerfowler/REST
 * @author     Jeremy Fowler
 * @copyright  (c) 2012 Jeremy Fowler
 * @license    http://www.opensource.org/licenses/BSD-3-Clause
 */
interface Rest_Content_Html extends Rest_Controller
{
    public function action_html();
}