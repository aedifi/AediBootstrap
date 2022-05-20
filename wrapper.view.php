<?php
/**
 * This file is part of the eso project, a derivative of esoTalk.
 * It has been modified by several contributors.  (contact@geteso.org)
 * Copyright (C) 2022 geteso.org.  <https://geteso.org>
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

/**
 * Wrapper: displays an HTML page with a header, bar, and footer.
 */

/**
 * TODO: Add thread, post, and member count to bottom of page.
 * Localize images and clean up HTML.
 */
if(!defined("IN_ESO"))exit;
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
<head>

<meta http-equiv='Content-Type' content='text/html; charset=<?php echo $language["charset"];?>'/>
<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'>

<title><?php echo ($this->controller->title?$this->controller->title." - ":"").$config["forumTitle"];?></title>
<meta name='title' content='<?php echo ($this->controller->title?$this->controller->title." - ":"").$config["forumTitle"];?>'>
<link rel='preload' href='<?php echo $config["baseURL"] . $this->skin->getForumLogo();?>' as='image'>

<!-- Open Graph -->
<meta property='og:site_name' content='<?php echo $config["forumTitle"];?>'>
<?php if (!empty($this->controller->title)): ?>
<meta property='og:title' content="<?php echo $this->controller->title;?>">
<?php else: ?>
<meta property='og:title' content="<?php echo $config["forumTitle"];?>">
<?php endif; ?>
<meta property='og:type' content='website'>
<meta property='og:image' content='<?php echo $config["baseURL"] . $this->skin->getForumIcon();?>'>
<meta property='og:url' content='<?php echo $config["baseURL"];?>'>
<!-- og:description added to head @ conversation.controller, search.controller -->

<!-- Twitter -->
<meta name='twitter:title' content='<?php echo ($this->controller->title?$this->controller->title." - ":"").$config["forumTitle"];?>'>
<meta name='twitter:card' content='summary'>
<meta name='twitter:image' content='<?php echo $config["baseURL"] . $this->skin->getForumIcon();?>'>
<!-- twitter:description added to head @ conversation.controller, search.controller -->

<!-- Progressive web app -->
<link rel='manifest' href='site.webmanifest'>
<meta name='format-detection' content='telephone=no'>
<meta name='apple-mobile-web-app-title' content='<?php echo $config["forumTitle"];?>'>
<?php if (!empty($config["manifestDisplay"]) and $config["manifestDisplay"] != "browser"): ?>
<meta name='mobile-web-app-capable' content='yes'>
<meta name='apple-mobile-web-app-capable' content='yes'>
<?php endif; ?>

<!-- Icons! -->
<link rel='icon' type='image/png' href='<?php echo $config["baseURL"] . $this->skin->getForumIcon();?>'>
<link rel='apple-touch-icon' href='<?php echo $config["baseURL"] . $this->skin->getForumIcon();?>'>
<meta name='msapplication-TileImage' content='<?php echo $config["baseURL"] . $this->skin->getForumIcon();?>'>
<?php if (!empty($config["themeColor"])): ?>
<meta name='theme-color' content='#<?php echo $config["themeColor"];?>'>
<meta name='msapplication-TileColor' content='#<?php echo $config["themeColor"];?>'>
<?php endif; ?>

<?php echo $this->head();?> 
</head>

<body>
<?php $this->callHook("pageStart");?>

<div id='loading' style='display:none'><?php echo $language["Loading"];?></div>

<?php echo $this->getMessages();?>

<div id='wrapper'<?php if($this->action!="search"):?> class='small'<?php endif;?>>

<div id='hdrbarpack'>

<div class='masthead'>
    <img src='https://aedi.app/assets/svg/jules.svg' onerror="this.src='https://aedi.app/assets/img/jules.png'" alt='Jules' style='float:left; height:45px'>
    <h3 class='joiner'>aedi.app</h3>
    <h3 class='muted'>Aedificium</h3>
    <div class='navbar'>
        <div class='navbar-inner'>
            <div class='container'>
                <ul class='nav'>
                    <li><a href='https://aedi.app/'>Index</a></li>
                    <li><a href='https://aedi.app/gallery'>Gallery</a></li>
                    <li><a href='https://aedi.app/support'>Support</a></li>
                    <li class='active'><a href='/'>Forum</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
	
<div id='bar'>
<?php if(count($this->bar["left"])):?><ul class='fl'><?php ksort($this->bar["left"]);foreach($this->bar["left"] as $v)echo "<li>$v</li>";?></ul><?php endif;?>
<?php if(count($this->bar["right"])):?><ul class='fr'><?php ksort($this->bar["right"]);foreach($this->bar["right"] as $v)echo "<li>$v</li>";?></ul><?php endif;?>
</div>

</div>

<div id='body'>
<?php $this->controller->render();?>
</div>

<?php $this->callHook("footer"); ?>
<div id='ftr'>
<?php if (count($this->footer)): ?><ul><?php
ksort($this->footer);
foreach ($this->footer as $v) echo "<li>$v</li>";
?></ul><?php endif; ?>

<div class='footer'>
    <div class='btn-group'>
        <a class="btn" href='https://aedi.app/tos'>Terms</a>
        <a class="btn" href='mailto:grntbg@gmail.com'>Contact</a>
        <a class="btn btn-info" href='https://github.com/aedifi/' target='_blank'>GitHub</a>
    </div>
    <p>Minecraft is property of <a href='https://www.mojang.com/about/'>Mojang Specifications</a>.</p>
	<p>Powered by <a href='https://geteso.org/'>eso</a> 1.0.0d1.</p>
</div>

</div>

</div>

<?php $this->callHook("pageEnd");?>
</body>
</html>
