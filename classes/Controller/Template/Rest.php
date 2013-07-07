<?php defined('SYSPATH') or die('No direct script access.');

/**
 * RESTful web service library.
 *
 * @package    jerfowler/REST
 * @author     Jeremy Fowler
 * @copyright  (c) 2012 Jeremy Fowler
 * @license    http://www.opensource.org/licenses/BSD-3-Clause
 */

class Controller_Template_Rest extends Controller
    implements Rest_Content_Html,
        Rest_Content_Json,
        Rest_Content_Xml,
        Rest_Content_Csv {

    /**
     * Rest object
     * @var Rest
     */
    protected $_rest;

    public function before()
    {
        parent::before();

        $this->_rest = Rest::instance($this)
            ->method_override(TRUE)
            ->content_override(TRUE)
            ->execute();
    }

    public function action_html()
    {
        $values = $this->_rest->result();
        $view = View::factory('rest/html', array('values' => $values));
        $this->response->body($view);
    }

    public function action_json()
    {
        $json = $this->_rest->etag()->result_json();
        $this->response->body($json);
    }

    public function action_xml()
    {
        $xml = $this->_rest->etag()->result_xml();
        $this->response->body($xml->asXML());
    }

    public function action_csv()
    {
        $csv = $this->_rest->result_csv();
        $this->response->body($csv);
    }

}