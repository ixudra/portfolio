<?php


/**
 * HTML macros
 */

HTML::macro('imageRoute', function($route = '', $img = 'img/', $alt = '', $imageAttributes = array(), $routeParameters = array(), $routeAttributes = array())
{
    $img = HTML::image($img, $alt, $imageAttributes);
    $link = HTML::linkRoute($route, '#', $routeParameters, $routeAttributes);

    return str_replace('#', $img, $link);
});

HTML::macro('iconRoute', function($route = '', $data, $iconType, $parameters = array(), $attributes = array())
{
    $icon = '<span class="glyphicon glyphicon-'. $iconType .'" aria-hidden="true"></span>';
    $link = HTML::linkRoute($route, '#'. $data, $parameters, $attributes);

    return str_replace('#', $icon, $link);
});



