# WVRFWP-WebVR-for-WordPress
WebVR for WordPress in a plugin

## Description
Embed a panorama image or a 360° video without hassle in your WordPress website using the last MozVR (a-frame) technologies. This plugin will help you to easily recreate the famous 360 image or video that usually see in facebook or around the web.

This plugin gives to you the possibility to join the image in a cardboard, headset or in an oculus rift device just by clicking the "glasses" button on top of it. It also works in order to go in fullscreen mode if you are browsing from desktop/laptop screen.

**IMPORTANT**
**No more than 1 element per page allowed!**
The library works only on 1 element per page due the heavy load of the work it has to do and we have to take care of it. At the momenti it's not possibile to use more than one image or video on the same page. Sorry, I'm working on a different solution. This is why I've disabled the rendering of image on archive pages, they will popup only on single pages and posts.

## Installation
Put the whole WVRFWP-WebVR-for-WordPress folder in your wp-content/plugins/ and go to activate it in your dashboard. That's it!

## Usage
At the moment you can choose to embed an image or a video using two different shortcodes:

- vr-image
- vr-video

The parameters for both are the same:


- **width** – the preview width in pixel (default *300*)
- **height** – the preview height in pixel (default *300*)
- **url** – the image/video address (***necessario***)
- **margin** – the margin around the preview in pixel (default *10*)
- **align** – the preview alignment: left, right, center or none (default *left*)
- **border** – border style, you can choose between: solid, dashed and dotted (default *none*)
- **border_width** – border thikness in pixel (default *4*)
- **border_color** – border color (default *#333333*)

### Examples

`[vr-image url="http://yoursite.co/image-url.jpg" width="400" height="400" align="right" margin="20" border="solid" border_color="#FF0000"]`

`[vr-video url="http://yoursite.co/image-url.jpg" width="400" height="400" align="right" margin="20" border="solid" border_color="#FF0000"]`

## Screenshot

### Panorama image preview
![vr-image shortcode in action](/assets/screenshot_1.jpg)
### 360° video preview
![vr-video shortcode in action](/assets/screenshot_2.jpg)
### Video fullscreen
![vr-video fullscreen in action](/assets/screenshot_3.jpg)
### Cardboard mode Panorama image
![vr-image cardboard in action](/assets/cardboard.jpg)