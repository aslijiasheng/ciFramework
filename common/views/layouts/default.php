<?php defined('BASEPATH') OR exit('No direct script access allowed');

echo html_tag('lang="'.$this->lang->code().'" dir="'.$this->lang->direction().'"');
echo head_tag();

echo meta_charset();
echo base_href();
echo ie_edge();

template_title();
template_metadata();

echo viewport();
echo favicon();
echo apple_touch_icon_precomposed();
echo cleartype_ie();

echo css_normalize();
file_partial('css');
template_partial('css');

echo js_platform();
echo js_selectivizr();
echo js_modernizr();
echo js_respond();
echo js_jquery();

template_partial('head');

echo head_close_tag();
echo body_tag('id="page-top"');

echo noscript();
echo unsupported_browser();

template_body();

echo js_jquery_extra_selectors();
echo js_bp_plugins();
echo js_mbp_helper();
echo js_scale_fix_ios();
echo js_imgsizer();

file_partial('scripts');
template_partial('scripts');

echo div_debug();

echo body_close_tag();
echo html_close_tag();
