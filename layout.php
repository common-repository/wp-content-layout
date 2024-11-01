<?php
/*
Plugin Name: Wp Content Layout
Plugin URI: http://danstring.com
Description: Simple WordPress layout plugin, with the help of this plugin you can create a layout for your content and easily can display on your page or post by using the shortcode.
Version: 1.0
Author: Sujit
Author URI: http://danstring.com
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
wp_enqueue_style('bootstrap-css', plugins_url('css/style.css', __FILE__));
wp_enqueue_style('layout-css', plugins_url('css/gridcss.css', __FILE__));
wp_enqueue_script('box-js', plugins_url('js/box.js', __FILE__));
add_action('admin_menu', 'wcl_wpcontentlayout');
function wcl_wpcontentlayout(){
    global $wpdb;
    $table_name=$wpdb->prefix.wcl_wp_content_layout;
    add_menu_page('Layout', 'Layout', 'manage_options', 'layout', 'my_custom_menu_sub_page', plugins_url( 'wp-content-layout/img/menu_icon.png' ), 10 );
    add_submenu_page('layout', 'Setting', 'Setting', 'manage_options', 'layout' );
    add_submenu_page('layout', 'Add Layout', 'Add Layout', 'manage_options',__FILE__, 'wcl_wpcontentlayout_add_layout' );

mysql_query("CREATE TABLE IF NOT EXISTS $table_name (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `content1` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content2` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content3` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content4` longtext COLLATE utf8_unicode_ci NOT NULL,
  `column` int(10) NOT NULL,
  `ordering` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30" ) ;


}
function wcl_wpcontentlayout_add_layout(){
global $wpdb;
$table_name=$wpdb->prefix.wcl_wp_content_layout;
//echo '<pre>'; print_r ($_REQUEST); 
if (isset($_POST['edit']))
{
//echo "edit";
if(isset($_POST['submit1']))
{
$id=$_POST['id'];
$title=$_POST['title'];
$content1=$_POST['content1'];
$content2=$_POST['content2'];
$content3=$_POST['content3'];
$content4=$_POST['content4'];

$columns=$_POST['columns'];

mysql_query("UPDATE $table_name SET `title` = '$title',
`content1` = '$content1',
`content2` = '$content2',
`content3` = '$content3',
`content4` = '$content4' ,`column`='$columns' WHERE `id` =$id;");
}
if(isset($_POST['submit2']))
{
$id=$_POST['id'];
$title=$_POST['title'];
$content1=$_POST['content1'];
$content2=$_POST['content2'];
$content3=$_POST['content3'];
$content4=$_POST['content4'];

$columns=$_POST['columns'];

mysql_query("UPDATE $table_name SET `title` = '$title',
`content1` = '$content1',
`content2` = '$content2',
`content3` = '$content3',
`content4` = '$content4' ,`column`='$columns' WHERE `id` =$id;");

}

if(isset($_POST['submit3']))
{
$id=$_POST['id'];
$title=$_POST['title'];
$content1=$_POST['content1'];
$content2=$_POST['content2'];
$content3=$_POST['content3'];
$content4=$_POST['content4'];
$columns=$_POST['columns'];


mysql_query("UPDATE $table_name SET `title` = '$title',
`content1` = '$content1',
`content2` = '$content2',
`content3` = '$content3',
`content4` = '$content4' ,`column`='$columns' WHERE `id` =$id;");

}

if(isset($_POST['submit4']))
{
//echo '<pre>'; print_r ($_POST);
$id=$_POST['id'];
$title=$_POST['title'];
$content1=$_POST['content1'];
$content2=$_POST['content2'];
$content3=$_POST['content3'];
$content4=$_POST['content4'];
$columns=$_POST['columns'];
mysql_query("UPDATE $table_name SET `title` = '$title',
`content1` = '$content1',
`content2` = '$content2',
`content3` = '$content3',
`content4` = '$content4' ,`column`='$columns' WHERE `id` =$id;");

}
$id=$_POST['id'];
$res=mysql_fetch_object(mysql_query("select * from $table_name where id='$id'"));
//echo '<pre>'; print_r ($res);
?>
<div class="box_head">
<h2>Layout</h2>

</div>  

<div class="main_container_top">

   <div class="col3">
<h3>1 Column</h3>
<a  href="#" onclick="return getValue(1)"><img style="border:1px solid #fff;" class="sel_image" src="<?php echo plugins_url();?>/wp-content-layout/img/one1.png" width="230" height="140"/></a>
</div>

<div class="col3">
<h3>2 Column</h3>
<a  href="#" onclick="return getValue(2)"><img style="border:1px solid #fff;" class="sel_image" src="<?php echo plugins_url();?>/wp-content-layout/img/two1.png" width="230" height="140"/></a>
</div>

<div class="col3">
<h3>3 column</h3>
<a  href="#" onclick="return getValue(3)"><img style="border:1px solid #fff;" class="sel_image" src="<?php echo plugins_url();?>/wp-content-layout/img/three.png" width="230" height="140"/></a>
</div> 
<div class="col3 last">
<h3>4 Column</h3>
<a  href="#" onclick="return getValue(4)"><img  style="border:1px solid #fff;" class="sel_image" src="<?php echo plugins_url();?>/wp-content-layout/img/four1.png" width="230" height="140"/></a>
</div>
</div>
<!-- 1 column start --> 
<div class="main_container" id="mainbox1" style="<?php if ($_POST['columns']=='1' || $_POST['columns']=='1') { ?>display:block; <?php } else { ?> display:none;<?php } ?>">
<form action="" method="post">
<div class="col12"><input type="text" name="title" placeholder="Module Title" value="<?php echo $res->title;?>" class="title_box" required/></div>
<div class="col12"><textarea class="inner_text" name="content1"><?php echo $res->content1;?></textarea></div>
<div>
<input type="hidden" name="id" value="<?php echo $_POST['id'];?>"/>
<input type="hidden" name="columns" value="1"/>
<input type="hidden" name="edit" value="Edit"/>


<input type="submit"  value="Submit" name="submit1" class="layout_button"/></div>
</form>
</div>
<!-- 1 column end --> 
<!-- 2 column start --> 
<div class="main_container" id="mainbox2" style="<?php if ($_POST['columns']=='2') { ?>display:block; <?php } else { ?> display:none;<?php } ?>">
<form action="" method="post">
<div class="col12"><input type="text" name="title" placeholder="Module Title" value="<?php echo $res->title;?>" class="title_box" required/></div>
<div class="col6"><textarea class="inner_text" name="content1"><?php echo $res->content1;?></textarea></div>
<div class="col6 last"><textarea class="inner_text" name="content2"><?php echo $res->content2;?></textarea></div>
<div>
<input type="hidden" name="id" value="<?php echo  $_POST['id'];?>"/>
<input type="hidden" name="columns" value="2"/>
<input type="hidden" name="edit" value="Edit"/>

<input type="submit"  value="Submit" name="submit2" class="layout_button"/></div>
</form>
</div>  
<!-- 2 column end --> 
<!-- 3 column start -->
<div class="main_container" id="mainbox3" style="<?php if ($_POST['columns']=='3') { ?>display:block; <?php } else { ?> display:none;<?php } ?>;">
<form action="" method="post">
<div class="col12"><input type="text" name="title" placeholder="Module Title" value="<?php echo $res->title;?>" class="title_box" required/></div>
<div class="col4"><textarea class="inner_text" name="content1"><?php echo $res->content1;?></textarea></div>
<div class="col4"><textarea class="inner_text" name="content2"><?php echo $res->content2;?></textarea></div>
<div class="col4 last"><textarea class="inner_text" name="content3"><?php echo $res->content3;?></textarea></div>
<div style="width:100%; height:200px;">
<input type="hidden" name="id" value="<?php echo  $_POST['id'];?>"/>
<input type="hidden" name="columns" value="3"/>
<input type="hidden" name="edit" value="Edit"/>

<input type="submit"  value="Submit" name="submit3" class="layout_button"/></div>
</form>
</div>
<!-- 3 column end -->
<!-- 4 column start -->
<div class="main_container" id="mainbox4" style="<?php if ($_POST['columns']=='4') { ?>display:block; <?php } else { ?> display:none;<?php } ?>;">
<form action="" method="post">
<div class="col12"><input type="text" name="title" placeholder="Module Title" value="<?php echo $res->title;?>" class="title_box" required/></div>
<div class="col3"><textarea class="inner_text" name="content1"><?php echo $res->content1;?></textarea></div>
<div class="col3"><textarea class="inner_text" name="content2"><?php echo $res->content2;?></textarea></div>
<div class="col3"><textarea class="inner_text" name="content3"><?php echo $res->content3;?></textarea></div>
<div class="col3 last"><textarea class="inner_text" name="content4"><?php echo $res->content4;?></textarea></div>
<div>
<input type="hidden" name="id" value="<?php  echo  $_POST['id'];?>"/>
<input type="hidden" name="columns" value="4"/>
<input type="hidden" name="edit" value="Edit"/>

<input type="submit" value="Submit" name="submit4" class="layout_button"/></div>
</form>
</div>
<!-- 4 column end -->
<?php
}else {
//echo "add";

if(isset($_POST['submit1']))
{
$title1=$_POST['title1'];
$content1=$_POST['content1'];
$sa1=mysql_query("INSERT INTO $table_name (
`id` ,
`title` ,
`content1` ,
`content2` ,
`content3` ,
`content4` ,
`column` ,
`ordering`
)
VALUES (
NULL , '$title1', '$content1', '', '', '', '1', '0'
);");

}
if(isset($_POST['submit2']))
{
$title2=$_POST['title2'];
$content1=$_POST['content1'];
$content2=$_POST['content2'];
$sa2=mysql_query("INSERT INTO $table_name (
`id` ,
`title` ,
`content1` ,
`content2` ,
`content3` ,
`content4` ,
`column` ,
`ordering`
)
VALUES (
NULL , '$title2', '$content1', '$content2', '', '', '2', '0'
);");

}

if(isset($_POST['submit3']))
{
$title3=$_POST['title3'];
$content1=$_POST['content1'];
$content2=$_POST['content2'];
$content3=$_POST['content3'];
$sa3=mysql_query("INSERT INTO $table_name (
`id` ,
`title` ,
`content1` ,
`content2` ,
`content3` ,
`content4` ,
`column` ,
`ordering`
)
VALUES (
NULL , '$title3', '$content1', '$content2', '$content3', '', '3', '0'
);");

}

if(isset($_POST['submit4']))
{
//echo '<pre>'; print_r ($_POST);
$title4=$_POST['title4'];
$content1=$_POST['content1'];
$content2=$_POST['content2'];
$content3=$_POST['content3'];
$content4=$_POST['content4'];

$sa4=mysql_query("INSERT INTO $table_name (
`id` ,
`title` ,
`content1` ,
`content2` ,
`content3` ,
`content4` ,
`column` ,
`ordering`
)
VALUES (
NULL , '$title4', '$content1', '$content2', '$content3', '$content4', '4', '0'
);");

}


?>
<div class="box_head">
<h2>Layout</h2>

</div>  
<div class="main_container_top">

   <div class="col3"><?php 
if($sa1 || $sa2 || $sa3  || $sa4  )
{
echo "<br><b>Added Successfully!!!</b>";
}
?>
</div>

<div class="col3">&nbsp;
</div>

<div class="col3">
   Please help to make this plugin better.
</div> 
<div class="col3 last">

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="technologyttech@gmail.com" >
<input type="hidden" name="item_name" value="Layout plugin support">
<input type="hidden" name="amount" value="5">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="undefined_quantity" value="1">
<input type="image" src="<?php echo plugins_url();?>/wp-content-layout/img/btn_donate.png" border="0" name="submit" >
</form> </div>
</div>
<div class="main_container_top">

   <div class="col3">
<h3>1 Column</h3>
<a  href="#" onclick="return getValue(1)"><img style="border:1px solid #fff;" class="sel_image" src="<?php echo plugins_url();?>/wp-content-layout/img/one1.png" width="230" height="140"/></a>
</div>

<div class="col3">
<h3>2 Column</h3>
<a  href="#" onclick="return getValue(2)"><img style="border:1px solid #fff;" class="sel_image" src="<?php echo plugins_url();?>/wp-content-layout/img/two1.png" width="230" height="140"/></a>
</div>

<div class="col3">
<h3>3 column</h3>
<a  href="#" onclick="return getValue(3)"><img style="border:1px solid #fff;" class="sel_image" src="<?php echo plugins_url();?>/wp-content-layout/img/three.png" width="230" height="140"/></a>
</div> 
<div class="col3 last">
<h3>4 Column</h3>
<a  href="#" onclick="return getValue(4)"><img  style="border:1px solid #fff;" class="sel_image" src="<?php echo plugins_url();?>/wp-content-layout/img/four1.png" width="230" height="140"/></a>
</div>
</div>

<!-- 1 column start --> 
<div class="main_container" id="mainbox1" style="display:block;">
<form action="" method="post">
<div class="col12"><input type="text" name="title1" placeholder="Module Title" class="title_box" required/></div>
<div class="col12"><textarea class="inner_text" name="content1"></textarea></div>
<div><input type="submit"  value="Submit" name="submit1" class="layout_button"/></div>
</form>
</div>
<!-- 1 column end --> 
<!-- 2 column start --> 
<div class="main_container" id="mainbox2" style="display:none;">
<form action="" method="post">
<div class="col12"><input type="text" name="title2" placeholder="Module Title" class="title_box" required/></div>
<div class="col6"><textarea class="inner_text" name="content1"></textarea></div>
<div class="col6 last"><textarea class="inner_text" name="content2"></textarea></div>
<div><input type="submit"  value="Submit" name="submit2" class="layout_button"/></div>
</form>
</div>  
<!-- 2 column end --> 
<!-- 3 column start -->
<div class="main_container" id="mainbox3" style="display:none;">
<form action="" method="post">
<div class="col12"><input type="text" name="title3" placeholder="Module Title" class="title_box" required/></div>
<div class="col4"><textarea class="inner_text" name="content1"></textarea></div>
<div class="col4"><textarea class="inner_text" name="content2"></textarea></div>
<div class="col4 last"><textarea class="inner_text" name="content3"></textarea></div>
<div style="width:100%; height:200px;"><input type="submit"  value="Submit" name="submit3" class="layout_button"/></div>
</form>
</div>
<!-- 3 column end -->
<!-- 4 column start -->
<div class="main_container" id="mainbox4" style="display:none;">
<form action="" method="post">
<div class="col12"><input type="text" name="title4" placeholder="Module Title" class="title_box" required/></div>
<div class="col3"><textarea class="inner_text" name="content1"></textarea></div>
<div class="col3"><textarea class="inner_text" name="content2"></textarea></div>
<div class="col3"><textarea class="inner_text" name="content3"></textarea></div>
<div class="col3 last"><textarea class="inner_text" name="content4"></textarea></div>
<div><input type="submit" value="Submit" name="submit4" class="layout_button"/></div>
</form>
</div>
<!-- 4 column end -->
<?php
}

}

function my_custom_menu_sub_page()

{ 
  global $wpdb;
$table_name=$wpdb->prefix.wcl_wp_content_layout;
if (isset($_POST['update']))
{
//echo '<pre>'; print_r($_POST);
$id=$_POST['id'];
$order=$_POST['ordering'];
mysql_query("UPDATE $table_name SET `ordering` = '$order' WHERE `id` =$id;");
}

if (isset($_POST['delete']))
{
//echo '<pre>'; print_r($_POST);
$id=$_POST['id'];
//echo "delete * from wp_wcl_wp_content_layout WHERE `id` =$id;";
mysql_query("delete  from $table_name WHERE `id` =$id;");
}
 ?>

<div class="box_head">
<h2>Welcome to the Layout Setting</h2>

</div>  


<!-- 1 column start --> 
<div class="main_container" id="mainbox1" style="display:block;">
<div class="col12"><div class="col3"><h3>Title</h3></div><div class="col3">
<h3>Shortcode</h3>
</div><div class="col3">

<h3>Action</h3>


</div>
<?php $layouts=mysql_query("SELECT *
FROM $table_name"); 

$numrow=mysql_num_rows($layouts);
if ($numrow>='1')
{
while ($row=mysql_fetch_object($layouts))
{
?>

<div class="col12"><div class="col3"><?php echo $row->title; ?></div><div class="col3">

</div><div class="col3">

[wcl_wp_content_layout id="<?php echo $row->id ; ?>"]



</div><div class="col3 last">
<!--<form action="?page=wcl_wp_content_layout/layout.php" method="post">
<input type="hidden" name="columns" value="<?php echo $row->column; ?>"/>
<input type="hidden" name="id" value="<?php echo $row->id; ?>"/>

<input type="submit" name="edit" value="Edit module" class="layout_buttons"/>
</form>-->

<form action="" method="post">
<input type="hidden" name="columns" value="<?php echo $row->column; ?>"/>
<input type="hidden" name="id" value="<?php echo $row->id; ?>"/>

<input type="submit" name="delete" value="Delete" class="layout_buttons"/>
</form>

</div></div>

<?php } ?>


<div></div>
<?php } else {
?>
<div class="col12"><span style="margin-left:20px;">No any Module/Layout Found.</span></div>

<?php 


}?>
</div>
<!-- 1 column end --> 
<!-- 2 column start --> 
  
<!-- 2 column end --> 
<!-- 3 column start -->

<!-- 3 column end -->
<!-- 4 column start -->

<!-- 4 column end -->
<?php

}


function wcl_wp_content_layout_shortcode( $atts ) {
global $wpdb;
$table_name=$wpdb->prefix.wcl_wp_content_layout;
//echo '<pre>'; print_r ($atts); 
  

  $id=$atts['id']; 
    $res=mysql_fetch_object(mysql_query("select * from $table_name where id='$id'"));
  //echo '<pre>'; print_r($res); die;
if ($res->column=='1')
   {

$layout='<div class=main_container">
<div class="col12">
'.$res->content1.'
</div>';
   
   }
if ($res->column=='2')
   {
$layout='<div class=main_container">
<div class="col6">
'.$res->content1.'
</div>
<div class="col6 last">
'.$res->content2.'
</div> </div>

';
   }
if ($res->column=='3')
   {
$layout='<div class=main_container">
<div class="col4">
'.$res->content1.'
</div>
<div class="col4">
'.$res->content2.'
</div>
<div class="col4 last">
'.$res->content3.'
</div> </div>

';
   }
if ($res->column=='4')
   {
    $layout='<div class=main_container">
<div class="col3">
'.$res->content1.'
</div>
<div class="col3">
'.$res->content2.'
</div>
<div class="col3">
'.$res->content3.'
</div>
<div class="col3 last">
'.$res->content4.'
</div> </div>

';
   }


  return "$layout" ;
}
add_shortcode( 'wcl_wp_content_layout', 'wcl_wp_content_layout_shortcode' );

