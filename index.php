<?php
/**
 Plugin Name: Web Screenshots
 Plugin URI: http://wordpress.org/extend/plugins/web-screenshots/
 Description: Displays Thumbnails of a given URL usings wordpress.com inofficial API. Use Shortcode [webscreenshot] with url and optional width param
 Version: 1.2.3
 Author: Jan Renz
 Author URI: http://bdisco.de
 License: GPLv2
 */

/*
 This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

class DGD_WebScreenshot {  
    // url to Dribbble api  
    protected $apiUrl = 'http://s.wordpress.com/mshots/v1/';  
    
    public function __construct()  
    {  
    	add_shortcode('webscreenshot', array($this, 'shortcode'));
    }  
    
    public function shortcode($atts, $content = NULL){
    	extract( shortcode_atts( array(
    			'width' => 250,
    			'url' => 'http://wordpress.org',
    			'newpage' => TRUE,
                'link'    => TRUE,
    			'refresh' => TRUE,
    			'title' => ''
    		
    			
    	), $atts ) );
    	$newpage = filter_var($newpage, FILTER_VALIDATE_BOOLEAN);
    	$link = filter_var($link, FILTER_VALIDATE_BOOLEAN);
    	$refresh = filter_var($refresh, FILTER_VALIDATE_BOOLEAN);
    	
    	if ($refresh && $width==400){
    		// we need adiffernet size here to be able to detect default img
    		$width=401; 
    	}
    	$cssclasses = array ( 'webscreenshot' );
    	//this is used for the js based refresh if thumbnail is not created yet
  
    	if ($refresh)  {
	    	$cssclasses[] = 'webscreenshot_refresh';
    		wp_register_script( 'webscreenshot_refresh', plugins_url( 'dgd_webscreenshot.js' , __FILE__ ) ); 
   			wp_enqueue_script( 'webscreenshot_refresh', array('jquery'), '1.0.0', TRUE );
    	}
    	//build url
    	$imgUrl = $this->apiUrl . urlencode($url) .'?w='. $width;
    	$output = '';
    	if ($title == ''){
    		//
    		$title = $url;
    	}
    	if ($link == true)
    	{
    		$output .= '<a href="'. $url .'" title="'. $title .'" class="webscreenshot_link" ';
    		if ($newpage == true)
    		{
    			$output .= ' target="_blank" ';
    		}
    		$output .= ' >';
    	}
    	$output .= '<img alt="'.$title.'" class="'.implode (' ', $cssclasses).'" data-refreshcounter="0" data-width="'.$width.'" data-src="'.$imgUrl.'" src="'.$imgUrl.'" width="'.$width.'"/>';
    	if ($link == true)
    	{
    		$output .= '</a>';
    	}
    	return $output;
    }  
} 
$_DGD_WebScreenshot = new DGD_WebScreenshot(); 
