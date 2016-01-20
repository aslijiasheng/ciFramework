<?php
//common config
return array(
    'version'                       => 2,
    'import'                        => array(
        'application.config.code.*',
        'application.config.env.dev.*',
        'application.bo.*',
        'application.bo.impl.*',
        'application.beans.*',
        'application.interceptor.*',
    ),
    'filter'                        => array(
        //URL正则与过滤器 *                   => application.filter.filteriterator
        'all'                           => 'RequestInterceptor',
    ),
);
