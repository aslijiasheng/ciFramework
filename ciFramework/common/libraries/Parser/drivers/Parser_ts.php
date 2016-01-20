<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * @author Ivan Tcholakov <ivantcholakov@gmail.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

class CI_Parser_ts extends CI_Parser_driver {

    protected $config;
    protected $allowed_formatters;
    private $ci;

    public function initialize()
    {
        $this->ci = get_instance();

        // Default configuration options.

        $this->config = array(
            'options' => array(),
        );

        if ($this->ci->config->load('parser_ts', TRUE, TRUE))
        {
            $this->config = array_merge($this->config, $this->ci->config->item('parser_ts'));
        }

        // Injecting configuration options directly.

        if (isset($this->_parent) && !empty($this->_parent->params) && is_array($this->_parent->params))
        {
            $this->config = array_merge($this->config, $this->_parent->params);

            if (array_key_exists('parser_driver', $this->config))
            {
                unset($this->config['parser_driver']);
            }
        }

        log_message('info', 'CI_Parser_ts Class Initialized');
    }

    public function parse($template, $data = array(), $return = FALSE, $config = array())
    {
        if (!is_array($config))
        {
            $config = array();
        }

        $config = array_merge($this->config, $config);

        $ci = $this->ci;
        $is_mx = false;

        if (!$return || !$config['full_path'])
        {
            list($ci, $is_mx) = $this->detect_mx();
        }

        if (!$config['full_path'])
        {
            $template = $ci->load->path($template);
        }

        $error_info = array();
        $template = TSCompiler::compileToStr($template, $config['options'], $error_info);

        if (!empty($error_info['stderr']))
        {
            throw new Exception($error_info['stderr']);
        }

        return $this->output($template, $return, $ci, $is_mx);
    }

    public function parse_string($template, $data = array(), $return = FALSE, $config = array())
    {
        if (!is_array($config))
        {
            $config = array();
        }

        $config = array_merge($this->config, $config);

        $ci = $this->ci;
        $is_mx = false;

        if (!$return)
        {
            list($ci, $is_mx) = $this->detect_mx();
        }

        $error_info = array();
        $template = TSCompiler::compileStr($template, $config['options'], $error_info);

        if (!empty($error_info['stderr']))
        {
            throw new Exception($error_info['stderr']);
        }

        return $this->output($template, $return, $ci, $is_mx);
    }

}
