=== Web Screenshots ===
Contributors: janrenz
Tags: screenshot
Requires at least: 3.0
Tested up to: 3.4.2
Stable tag: 1.2.3
License: GPLv2 or later

Displays Thumbnails of a given URL usings wordpress.com inofficial API. Use Shortcode [webscreenshot] with url and some  optional params.

== Description ==

With Usage of the wordpress.com inofficial webpage to screenshot function this plugins generates screenshots of websites. For more information check http://bdisco.de/wordpress-plugins/ 
There are a few options you can use in your shortcode [webscreenshot]:

url: full Url of the webpage which you want to have screenshoted (mandantory)

width: Pixel width of the screenshot (optional, default: 250)

refresh: If you want to reload the screenshot if it wasn't generated on the first call (optional, default: true)

link: link image to given url (optional, default: true) 

newpage: open link in new page (optional, default: true) 

title: set link title tag (will be used as img alt tag also) (optional, default:'')

All img-tags generated will have a class called "webscreenshot", the link will have a class called "webscreenshot-link" which you can you to perform additional style stuff

Feel free to make pull requests at https://github.com/jprberlin/web-screenshots

== Installation ==

Install like any other plugin

== Changelog ==
= 1.2 =
* added attribute to set link title tag (will be used as alt tag for the img as well)

= 1.1 =
* Improved handling of boolean attributes. For example you now can use link=0, link="false", link="off", link="no"
* Add link to image (request by Shawn). Use newpage and link param to change link behaviour.

= 1.0.0 =
* First Release