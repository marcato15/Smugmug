<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
  'pi_name' => 'Smugmug',
  'pi_usage' => Smugmug::usage()
  );


class Smugmug {

	var $return_data = '';

	function Smugmug()
	{
		$this->EE =& get_instance();     
    
    $gallery_url = $this->EE->TMPL->fetch_param('url');  	
     $height = $this->EE->TMPL->fetch_param('height');    
     $width = $this->EE->TMPL->fetch_param('width');  	
 		$width = (!$width) ? $width = '500': $width;
 		$height = (!$height) ? $height = '500': $height;

  	if(!empty($gallery_url)) {
    
       $data = explode("_",substr(strrchr($gallery_url, "/"),1));
       $id= $data[0];
       $key= $data[1];
       $return  = '<object align="middle" height="'.$height.'" width="'.$width.'">
        <param name="movie" value="http://www.smugmug.com/ria/ShizamSlides-2007090601.swf">
        <param name="flashvars" value="AlbumID='.$id.'&amp;AlbumKey='.$key.'.&amp;transparent=true&amp;crossFadeSpeed=500&amp;clickUrl=http://www#46;smugmug#46;com&amp;clickToImage=true&amp;showThumbs=false&amp;showLogo=false">
        <param name="wmode" value="transparent">
        <param name="bgcolor" value="000000">
        <param name="allowNetworking" value="all">
        <param name="allowScriptAccess" value="always">

        <embed src="http://www.smugmug.com/ria/ShizamSlides-2007090601.swf" flashvars="AlbumID='.$id.'&amp;AlbumKey='.$key.'&amp;transparent=true&amp;crossFadeSpeed=500&amp;clickUrl=http://www#46;smugmug#46;com&amp;clickToImage=true&amp;showThumbs=false&amp;showLogo=false"
        wmode="transparent" type="application/x-shockwave-flash" allowScriptAccess="always" allowNetworking="all" height="'.$height.'" width="'.$width.'"></embed></object>';
			$this->return_data = $return;
	  }
	
  }

	  function usage()
	  {
	  ob_start(); 
	  ?>
		Description:

		Returns the number of entries for a given category.

		------------------------------------------------------
		
		Example:


		{exp:smugmug url="URL" width="500" height="500"}

		Returns
    SmugMug Embed Code found on http://wiki.smugmug.net/display/SmugMug/Flash+Slideshow

		------------------------------------------------------
		
		Parameters:

		url="http://your.smugmug.url"
    The public url of the Smugmug photo gallery
    width="500" 
    Defaults to 500
    height="500"
    Defaults to 500
     
	  <?php
	  $buffer = ob_get_contents();

	  ob_end_clean(); 

	  return $buffer;
	  }
	  // END

	}
	


/* End of file pi.category_count.php */ 
/* Location: ./system/expressionengine/third_party/plugin_name/pi.category_count.php */
