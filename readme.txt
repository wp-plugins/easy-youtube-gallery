=== Easy YouTube Gallery ===
Contributors: urkekg
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Q6Q762MQ97XJ6
Tags: youtube, channel, gallery, single, youtube player, iframe, html5, custom, video, thumbnail, embed, responsive
Requires at least: 3.6.0
Tested up to: 4.2.2
Stable tag: 1.0.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Quick and easy make gallery for custom set of YouTube videos provided in shortcode, and autoplay video on click in Magnific PopUp lightbox.

== Description ==

Use this plugin when you wish to quick insert gallery grid composed from custom selected YouTube videos.

For automated latest or random videos collected from YouTube channel, favourites, liked videos or playlist check out [YouTube Channel](https://wordpress.org/plugins/youtube-channel/)

= Features =

* Custom set of ID's provided as shortcode attribute `id` (single of multiple ID's separated by comma)
* Custom additional class for targeted styling (if you need to blend gallery in your theme)
* Custom number of columns to distribute thumbnails to (min 1, max 8)
* Responsive thumbnails
* Autoplay with [Magnific PopUp](http://dimsemenov.com/plugins/magnific-popup/) lightbox
* Well marked with classes

= Classes =

* Main container:
  * `.easy_youtube_gallery`
  * `.col-#` for number of columns (default is `1`, supported up to `8`)
  * `.ar-16_9` for 16:9, `.ar-4_3` for 4:3 or `.ar-square` for 1:1 aspect ratio
  * custom class provided by shortcode attribute `class`
* Anchor:
  * `.egty-item`
  * `.egty-item-#` for order number of item
  * `.egty-item-first` for first item in gallery block
  * `.egty-item-mid` for middle items in gallery block
  * `.egty-item-last` for last item in gallery block
* Thumbnail:
 * `.eytg-thumbnail` is class for span where we set video thumbnail as background image
* Play icon
 * `.eytg-thumbnail:before` is pseudoclass for play icon

= How To Use? =

`[easy_youtube_gallery id=uMK0prafzw0,8Uee_mcxvrw,HcXNPI-IPPM,JvMXVHVr72A,AIXUgtNC4Kc,K8nrF5aXPlQ,cegdR0GiJl4,L-wpS49KN00,KbW9JqM7vho ar=16_9 cols=3 thumbnail=hqdefault controls=0 class=mySuperClass]`

**Please note!** If you doing copy&paste from code above, before you paste content to page, post or text widget content, clear all formatting by paste&copy to/from Notepad or other plain text editor!

= Shortcode parameters =

* `id` (required) single YouTube video ID or multiple ID's separated with comma
* `ar` (optional) aspect ratio of thumbnails; default is `ar-16_9` for 16:9, but also supported `ar-4_3` for 4:3 and `ar-square` for 1:1
* `cols` (optional) for number of columns to distribute thumbnails in; devault is `1`, supported up to `8`
* `thumbnail` (optional) for YouTube size of thumbnail; default is `hqdefault` but we can use:
  * `0` have resolution 480x360px
  * `1`, `2` and `3` have resolution 120x90px (first, second or third frame)
  * `default` have resolution 120x90px (Default Quality)
  * `mqdefault` have resolution 320x180px (Medium Quality)
  * `hqdefault` have resolution 480x360px (High Quality)
  * `sddefault` have resolution 640x480px (Standard Definition) and does not exists for lowres videos
  * `maxresdefault` have resolution 1920x1080px (Full HD) and does not exists for lowres videos
* `controls` (optional) to optionally hide playback controls in lightbox player (default is `1` that means "display controls", but you can set it to `0` to hide controls)
* `class` (optional) to add custom style class if you wish to target specific styling for your own needs

[youtube http://www.youtube.com/watch?v=EbYfwzmCVJI]

== Installation ==

1. Login to your WordPress.
1. Go to **Plugins** -> **Add New**.
1. Type to **Search Plugins** field keyword *Easy YouTube Gallery* and press **Enter** on your keyboard.
1. Click **Install Now** button.
1. When plugin is successfully installed, clik link **Activate Plugin**
1. Insert shortcode `[easy_youtube_gallery id=YT_VIDEO_ID,YT_VIDEO_ID,YT_VIDEO_ID...,YT_VIDEO_ID]` (replace `YT_VIDEO_ID` with your set of YouTube video ID's)

== Frequently Asked Questions ==

= Do I need to wrap shortcode parameters to doublequotes or singlequotes? =

No. I even suggest to you avoid wrapping shortcode parameters to double/single quotes to prevent broken output when some plugins modify content with nasty filters.

Just avoid empty space between ID's.

== Upgrade Notice ==

= 1.0.0 =
Initial release

== ChangeLog ==

= 1.0.0 (2015-05-26) =
* Initial plugin release

== Screenshots ==

1. Easy YouTube Gallery full shortcode and 9 videos distributed to 3 column example

== TODO ==

* TinyMCE button with form to easy insert shortcode
* VisualComposer block
