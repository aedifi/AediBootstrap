<?php
// AediBootstrap/skin.php
// AediBootstrap skin file.

if (!defined("IN_ESO")) exit;

class AediBootstrap extends Skin {

var $name = "AediBootstrap";
var $version = "1.0";
var $author = "grntbg";
var $numberOfColors = 27;

// Add stylesheets and a favicon to the page header.
function init()
{
	global $config;

	// Register the custom wrapper.
	$this->registerView("wrapper.php", "skins/AediBootstrap/wrapper.view.php");

	$this->eso->addCSS("skins/base.css");
	$this->eso->addCSS("skins/{$config["skin"]}/styles.css");
	// Add the custom CSS file to an array.
	$this->eso->addCSS("skins/{$config["skin"]}/custom.css");
	$this->eso->addCSS("skins/ie6.css", "ie6");
	$this->eso->addCSS("skins/ie7.css", "ie7");
	$this->eso->addToHead("<link rel='shortcut icon' type='image/ico' href='skins/{$config["skin"]}/favicon.ico'/>");
}

// Generate button HTML.
function button($attributes)
{
	$class = $id = $style = ""; $attr = " type='submit'";
	foreach ($attributes as $k => $v) {
		if ($k == "class") $class = " $v";
		elseif ($k == "id") $id = " id='$v'";
		elseif ($k == "style") $style = " style='$v'";
		else $attr .= " $k='$v'";
	}
	return "<span class='button$class'$id$style><input$attr/></span>";
}

}

?>
