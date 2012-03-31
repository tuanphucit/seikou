<?php

/**
 * Dump a variable to output buffer
 * @param mixed $var a variable to dump
 * @return string HTML dump of parameter
 */
function dump($var) {
	return (CVarDumper::dumpAsString($var, 3, true));
}

/**
 * Shortcut to Yii::trace()
 * @param mixed $x the message to trace
 * @return mixed the argument passed in
 * @param bool $export to var_export the value of $x
 */
function trace($x, $export = false) {
	Yii::trace($export ? var_export($x, true) : $x);
	return $x;
}

/**
 * Shortcut to Yii::log()
 */
function logged($msg, $level ="debug", $category = "") {
	Yii::log($msg,$level,$category);
}

/**
 * DIRECTORY_SEPARATOR
 */
defined('DS') or define('DS',DIRECTORY_SEPARATOR);

/**
 * @return CApplication Yii::app()
 */
function app() {
    return Yii::app();
}

/**
 * @return CClientScript Yii::app()->clientScript
 */
function cs() {
    return Yii::app()->getClientScript();
}

/**
 * @return CAuthManager Yii::app()->authManager
 */
function am() {
    return Yii::app()->getAuthManager();
}

/**
 * @return CWebUser Yii::app()->user
 */
function user() {
    return Yii::app()->getUser();
}

/**
 * Sets or gets user state. getter if $val is null. setter otherwise
 * @param string $key state store key
 * @param null $val key for the stored data
 * @return mixed the stored data
 */
function state($key, $val = null) {
	if ($val === null)
		return Yii::app()->getUser()->getState($key);
	else
		return Yii::app()->getUser()->getState($key, $val);
}

/**
 * Shortcut to Yii::app()->createUrl()
 * @param string $route controller/action-type route
 * @param array $params
 * @param string $ampersand
 * @return string
 */
function url($route, $params=array(), $ampersand='&') {
    return Yii::app()->createUrl($route,$params,$ampersand);
}

/**
 * Shortcut to CHtml::encode
 * @param string $text raw text to encode
 * @return string
 */
function h($text) {
    return htmlspecialchars($text, ENT_QUOTES, Yii::app()->charset);
}

/**
 * Shortcut to CHtml::link()
 * @param string $text raw link text
 * @param string $url link URL or route
 * @param array $htmlOptions
 * @return string HTML link tag
 */
function l($text, $url = '#', $htmlOptions = array()) {
    return CHtml::link($text, $url, $htmlOptions);
}

/**
 * Shortcut to Yii::t() with default category = 'user'
 * @param string $category translation library
 * @param string $message soure language text
 * @param array $params string params
 * @param string $source source language
 * @param string $language target language
 * @return string translated text
 */
function t($message, $category = 'user',$params = array(), $source = null, $language = null) {
    return Yii::t($category, $message, $params, $source, $language);
}

/**
 * Quotes a string value for use in a query.
 * @param string $s string to be quoted
 * @return string the properly quoted string
 * @see 
 */
function q($s) {
	return Yii::app()->db->quoteValue($s);
}

/**
 * Shortcut to Yii::app()->request->getParam();
 * @param param of request
 * @return value of param
 * @see 
 */
function request($param) {
	return Yii::app()->request->getParam($param);
}

/**
 * Shortcut to Yii::app()->request->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 *  string $url a relative url to prefix with baseUrl
 *  string
 */
function bu($url=null) {
    static $baseUrl;
    if ($baseUrl===null)
        $baseUrl=Yii::app()->getRequest()->getBaseUrl();
    return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url,'/');
}

/**
 * Shortcut to Yii::app()->params[$name].
 *  $name
 *  mixed the named application parameter
 */
function param($name) {
    return Yii::app()->params[$name];
}

/**
 *  string $str subject of test for integerness
 *  bool true if argument is an integer string
 */
function intStr($str) {
	return !!preg_match('/^\d+$/', $str);
}

/**
 * Pulish assets : js or css
 * a shorten function by Yii
 * @param string $str
 */
function publish($str){
	return Yii::app()->assetManager->publish($str);
}