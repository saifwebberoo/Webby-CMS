<!--<style type="text/css">
	<?php
		//echo file_get_contents(APP.'webroot/themes/11nov11/css/inline-style.css');
	?>
</style>
<link rel="stylesheet" href="/themes/11nov11/css/style.css" type="text/css" media="screen, projection" />-->
<?php
	//echo $this->Html->script('jquery-1.6.3.min'); // Include jQuery library
	//echo $this->Html->script('custom-script'); // Include jQuery library
	//echo $scripts_for_layout;
?>


<?php
$minfy_css = array();
$minfy_css[0] = 'app/webroot/themes/11nov11/css/style';
$this->Minify->css($minfy_css);

$minfy_javascripts = array();
$minfy_javascripts[0] = 'app/webroot/js/jquery-1.6.3.min';
$minfy_javascripts[1] = 'app/webroot/js/custom-script';
$this->Minify->js($minfy_javascripts);
?>

<!--[if lt IE 10]>
<style type="text/css">
/**TEXT-SHADOW RULES FOR IE PRE-IE 10**/
ul#main-nav li a {
line-height: 26px;
/*filter: shadow(color=#333333,direction=235,strength=5);
-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(color=#333333,direction=235,strength=5)";*/
/**OPTIONAL IE CLEARTYPE FIX**/
 filter: glow(color=#333333,strength=3);
position:relative;
}
ul#main-nav li a:hover {
/*line-height: 26px;
filter: shadow(color=#333333,direction=200,strength=5);
-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(color=#333333,direction=200,strength=5)";*/
/**OPTIONAL IE CLEARTYPE FIX**/
position:relative;
 filter: glow(color=#0000ff,strength=5);

}
</style>
<![endif]-->