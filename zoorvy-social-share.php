<?php

/**
 *
 * @link              http://saivarun.me/
 * @since             1.0.0
 * @package           Zoorvy_Social_Share
 *
 * @wordpress-plugin
 * Plugin Name:       Zoorvy Social Share
 * Plugin URI:        http://www.zoorvy.com/
 * Description:       Simple Responsive Social Sharing buttons for WordPress that dosent effect the pageload speeds.
 * Version:           1.0.0
 * Author:            Sai Varun KN
 * Author URI:        http://saivarun.me/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       zoorvy-social-share
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-zoorvy-social-share-activator.php
 */
function activate_zoorvy_social_share() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-zoorvy-social-share-activator.php';
	Zoorvy_Social_Share_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-zoorvy-social-share-deactivator.php
 */
function deactivate_zoorvy_social_share() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-zoorvy-social-share-deactivator.php';
	Zoorvy_Social_Share_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_zoorvy_social_share' );
register_deactivation_hook( __FILE__, 'deactivate_zoorvy_social_share' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-zoorvy-social-share.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_zoorvy_social_share() {

	$plugin = new Zoorvy_Social_Share();
	$plugin->run();

}

//Initialize Settings Menu item 

function zoorvy_social_share_menu_item()
{
  add_submenu_page("options-general.php", "Zoorvy Social Share", "Zoorvy Social Share", "manage_options", "zoorvy-social-share", "zoorvy_social_share_page"); 
}

add_action("admin_menu", "zoorvy_social_share_menu_item");

function zoorvy_social_share_page()
{
   ?>
      <div class="wrap">
         <h1>Zoorvy Social Share Options</h1></br>
          
          <div class="support">
          <h2>Support Us</h2>
          <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1134106296620809";
      fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script></div>

      <div class="fb-like" data-href="https://www.facebook.com/zoorvy" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div></br></br>

          <a href="https://twitter.com/zoorvy" class="twitter-follow-button" data-show-count="false">Follow @zoorvy</a>
          <a href="https://twitter.com/saivarunk" class="twitter-follow-button" data-show-count="false">Follow @saivarunk</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

          
</br>
<h1>Configure Social Sharing Buttons</h1>
         <form method="post" action="options.php">
            <?php
               settings_fields("zoorvy_social_share_config_section");
 
               do_settings_sections("zoorvy-social-share");
                
               submit_button();
            ?>
         </form>
      </div>
   <?php
}

function zoorvy_social_share_settings()
{
    add_settings_section("zoorvy_social_share_config_section", "", null, "zoorvy-social-share");
 
    add_settings_field("zoorvy-social-share-facebook", "Do you want to display Facebook share button?", "zoorvy_social_share_facebook_checkbox", "zoorvy-social-share", "zoorvy_social_share_config_section");
    add_settings_field("zoorvy-social-share-twitter", "Do you want to display Twitter share button?", "zoorvy_social_share_twitter_checkbox", "zoorvy-social-share", "zoorvy_social_share_config_section");
    add_settings_field("zoorvy-social-share-linkedin", "Do you want to display LinkedIn share button?", "zoorvy_social_share_linkedin_checkbox", "zoorvy-social-share", "zoorvy_social_share_config_section");
    add_settings_field("zoorvy-social-share-reddit", "Do you want to display Reddit share button?", "zoorvy_social_share_reddit_checkbox", "zoorvy-social-share", "zoorvy_social_share_config_section");
    add_settings_field("zoorvy-social-share-gplus", "Do you want to display Google + share button?", "zoorvy_social_share_gplus_checkbox", "zoorvy-social-share", "zoorvy_social_share_config_section");
    add_settings_field("zoorvy-social-share-pocket", "Do you want to display Pocket share button?", "zoorvy_social_share_pocket_checkbox", "zoorvy-social-share", "zoorvy_social_share_config_section");
    add_settings_field("zoorvy-social-share-top", "Do you want to display Sharing buttons on top pf post?", "zoorvy_social_share_top_checkbox", "zoorvy-social-share", "zoorvy_social_share_config_section");
    add_settings_field("zoorvy-social-share-bottom", "Do you want to display Sharing buttons on bottom of post", "zoorvy_social_share_bottom_checkbox", "zoorvy-social-share", "zoorvy_social_share_config_section");
    add_settings_field("zoorvy-social-share-page", "Do you want to display Sharing buttons on pages", "zoorvy_social_share_page_checkbox", "zoorvy-social-share", "zoorvy_social_share_config_section");
  

    register_setting("zoorvy_social_share_config_section", "zoorvy-social-share-facebook");
    register_setting("zoorvy_social_share_config_section", "zoorvy-social-share-twitter");
    register_setting("zoorvy_social_share_config_section", "zoorvy-social-share-linkedin");
    register_setting("zoorvy_social_share_config_section", "zoorvy-social-share-reddit");
    register_setting("zoorvy_social_share_config_section", "zoorvy-social-share-gplus");
    register_setting("zoorvy_social_share_config_section", "zoorvy-social-share-pocket");
    register_setting("zoorvy_social_share_config_section", "zoorvy-social-share-top");
    register_setting("zoorvy_social_share_config_section", "zoorvy-social-share-bottom");
    register_setting("zoorvy_social_share_config_section", "zoorvy-social-share-page");
}

function zoorvy_social_share_facebook_checkbox()
{  
   ?>
        <input type="checkbox" name="zoorvy-social-share-facebook" value="1" <?php checked(1, get_option('zoorvy-social-share-facebook'), true); ?> /> Check for Yes
   <?php
}

function zoorvy_social_share_twitter_checkbox()
{  
   ?>
        <input type="checkbox" name="zoorvy-social-share-twitter" value="1" <?php checked(1, get_option('zoorvy-social-share-twitter'), true); ?> /> Check for Yes
   <?php
}

function zoorvy_social_share_linkedin_checkbox()
{  
   ?>
        <input type="checkbox" name="zoorvy-social-share-linkedin" value="1" <?php checked(1, get_option('zoorvy-social-share-linkedin'), true); ?> /> Check for Yes
   <?php
}

function zoorvy_social_share_reddit_checkbox()
{  
   ?>
        <input type="checkbox" name="zoorvy-social-share-reddit" value="1" <?php checked(1, get_option('zoorvy-social-share-reddit'), true); ?> /> Check for Yes
   <?php
}
function zoorvy_social_share_gplus_checkbox()
{  
   ?>
        <input type="checkbox" name="zoorvy-social-share-gplus" value="1" <?php checked(1, get_option('zoorvy-social-share-gplus'), true); ?> /> Check for Yes
   <?php
}
function zoorvy_social_share_pocket_checkbox()
{  
   ?>
        <input type="checkbox" name="zoorvy-social-share-pocket" value="1" <?php checked(1, get_option('zoorvy-social-share-pocket'), true); ?> /> Check for Yes
   <?php
}
function zoorvy_social_share_top_checkbox()
{  
   ?>
        <input type="checkbox" name="zoorvy-social-share-top" value="1" <?php checked(1, get_option('zoorvy-social-share-top'), true); ?> /> Check for Yes
   <?php
}

function zoorvy_social_share_bottom_checkbox()
{  
   ?>
        <input type="checkbox" name="zoorvy-social-share-bottom" value="1" <?php checked(1, get_option('zoorvy-social-share-bottom'), true); ?> /> Check for Yes
   <?php
}
function zoorvy_social_share_page_checkbox()
{  
   ?>
 <input type="checkbox" name="zoorvy-social-share-page" value="1" <?php checked(1, get_option('zoorvy-social-share-page'), true); ?> /> Check for Yes
   <?php
}


 
add_action("admin_init", "zoorvy_social_share_settings");

//Social Buttons filter

function add_zoorvy_social_share_icons($content)
{
     // If sinle post
     
    if (is_single())
    {
        global $post;

        $url = get_permalink($post->ID);
        $url = esc_url($url);

      if(get_option("zoorvy-social-share-facebook") == 1)
    {
        

        $zoorvy_share_buttons = '<ul class="rrssb-buttons clearfix">';


        $zoorvy_share_buttons = $zoorvy_share_buttons . '<li class="rrssb-facebook">   
    <a href="https://www.facebook.com/sharer/sharer.php?u=' . $url . '" class="popup">
      <span class="rrssb-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 29"><path d="M26.4 0H2.6C1.714 0 0 1.715 0 2.6v23.8c0 .884 1.715 2.6 2.6 2.6h12.393V17.988h-3.996v-3.98h3.997v-3.062c0-3.746 2.835-5.97 6.177-5.97 1.6 0 2.444.173 2.845.226v3.792H21.18c-1.817 0-2.156.9-2.156 2.168v2.847h5.045l-.66 3.978h-4.386V29H26.4c.884 0 2.6-1.716 2.6-2.6V2.6c0-.885-1.716-2.6-2.6-2.6z"/></svg></span>
      <span class="rrssb-text">facebook</span>
    </a>
  </li>';

    }

    if(get_option("zoorvy-social-share-twitter") == 1)
    {
        $zoorvy_share_buttons = $zoorvy_share_buttons . '<li class="rrssb-twitter">
    <a href="https://twitter.com/intent/tweet?text=' . $url . '"
    class="popup">
      <span class="rrssb-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28"><path d="M24.253 8.756C24.69 17.08 18.297 24.182 9.97 24.62a15.093 15.093 0 0 1-8.86-2.32c2.702.18 5.375-.648 7.507-2.32a5.417 5.417 0 0 1-4.49-3.64c.802.13 1.62.077 2.4-.154a5.416 5.416 0 0 1-4.412-5.11 5.43 5.43 0 0 0 2.168.387A5.416 5.416 0 0 1 2.89 4.498a15.09 15.09 0 0 0 10.913 5.573 5.185 5.185 0 0 1 3.434-6.48 5.18 5.18 0 0 1 5.546 1.682 9.076 9.076 0 0 0 3.33-1.317 5.038 5.038 0 0 1-2.4 2.942 9.068 9.068 0 0 0 3.02-.85 5.05 5.05 0 0 1-2.48 2.71z"/></svg></span>
      <span class="rrssb-text">twitter</span>
    </a>
  </li>';
    }

    if(get_option("zoorvy-social-share-gplus") == 1)
    {
        $zoorvy_share_buttons = $zoorvy_share_buttons . '<li class="rrssb-googleplus">
          <a href="https://plus.google.com/share?url=' . $url . '" class="popup"><span class="rrssb-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24">
                <path d="M21 8.29h-1.95v2.6h-2.6v1.82h2.6v2.6H21v-2.6h2.6v-1.885H21V8.29zM7.614 10.306v2.925h3.9c-.26 1.69-1.755 2.925-3.9 2.925-2.34 0-4.29-2.016-4.29-4.354s1.885-4.353 4.29-4.353c1.104 0 2.014.326 2.794 1.105l2.08-2.08c-1.3-1.17-2.924-1.883-4.874-1.883C3.65 4.586.4 7.835.4 11.8s3.25 7.212 7.214 7.212c4.224 0 6.953-2.988 6.953-7.082 0-.52-.065-1.104-.13-1.624H7.614z"></path>
              </svg></span><span class="rrssb-text">google+</span></a>
        </li>';
    }

    if(get_option("zoorvy-social-share-linkedin") == 1)
    {
        $zoorvy_share_buttons = $zoorvy_share_buttons . '<li class="rrssb-linkedin">
        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='. $url .'" class="popup"><span class="rrssb-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewbox="0 0 28 28">
                <path d="M25.424 15.887v8.447h-4.896v-7.882c0-1.98-.71-3.33-2.48-3.33-1.354 0-2.158.91-2.514 1.802-.13.315-.162.753-.162 1.194v8.216h-4.9s.067-13.35 0-14.73h4.9v2.087c-.01.017-.023.033-.033.05h.032v-.05c.65-1.002 1.812-2.435 4.414-2.435 3.222 0 5.638 2.106 5.638 6.632zM5.348 2.5c-1.676 0-2.772 1.093-2.772 2.54 0 1.42 1.066 2.538 2.717 2.546h.032c1.71 0 2.77-1.132 2.77-2.546C8.056 3.593 7.02 2.5 5.344 2.5h.005zm-2.48 21.834h4.896V9.604H2.867v14.73z"></path>
              </svg></span><span class="rrssb-text">linkedin</span></a></li>';
    }

    if(get_option("zoorvy-social-share-reddit") == 1)
    {
        $zoorvy_share_buttons = $zoorvy_share_buttons . '<li class="rrssb-reddit">
        <a href="http://www.reddit.com/submit?url='. $url .'"><span class="rrssb-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewbox="0 0 28 28">
                <path d="M11.794 15.316c0-1.03-.835-1.895-1.866-1.895-1.03 0-1.893.866-1.893 1.896s.863 1.9 1.9 1.9c1.023-.016 1.865-.916 1.865-1.9zM18.1 13.422c-1.03 0-1.895.864-1.895 1.895 0 1 .9 1.9 1.9 1.865 1.03 0 1.87-.836 1.87-1.865-.006-1.017-.875-1.917-1.875-1.895zM17.527 19.79c-.678.68-1.826 1.007-3.514 1.007h-.03c-1.686 0-2.834-.328-3.51-1.005-.264-.265-.693-.265-.958 0-.264.265-.264.7 0 1 .943.9 2.4 1.4 4.5 1.402.005 0 0 0 0 0 .005 0 0 0 0 0 2.066 0 3.527-.46 4.47-1.402.265-.264.265-.693.002-.958-.267-.334-.688-.334-.988-.043z"></path>
                <path d="M27.707 13.267c0-1.785-1.453-3.237-3.236-3.237-.792 0-1.517.287-2.08.76-2.04-1.294-4.647-2.068-7.44-2.218l1.484-4.69 4.062.955c.07 1.4 1.3 2.6 2.7 2.555 1.488 0 2.695-1.208 2.695-2.695C25.88 3.2 24.7 2 23.2 2c-1.06 0-1.98.616-2.42 1.508l-4.633-1.09c-.344-.082-.693.117-.803.454l-1.793 5.7C10.55 8.6 7.7 9.4 5.6 10.75c-.594-.45-1.3-.75-2.1-.72-1.785 0-3.237 1.45-3.237 3.2 0 1.1.6 2.1 1.4 2.69-.04.27-.06.55-.06.83 0 2.3 1.3 4.4 3.7 5.9 2.298 1.5 5.3 2.3 8.6 2.325 3.227 0 6.27-.825 8.57-2.325 2.387-1.56 3.7-3.66 3.7-5.917 0-.26-.016-.514-.05-.768.965-.465 1.577-1.565 1.577-2.698zm-4.52-9.912c.74 0 1.3.6 1.3 1.3 0 .738-.6 1.34-1.34 1.34s-1.343-.602-1.343-1.34c.04-.655.596-1.255 1.396-1.3zM1.646 13.3c0-1.038.845-1.882 1.883-1.882.31 0 .6.1.9.21-1.05.867-1.813 1.86-2.26 2.9-.338-.328-.57-.728-.57-1.26zm20.126 8.27c-2.082 1.357-4.863 2.105-7.83 2.105-2.968 0-5.748-.748-7.83-2.105-1.99-1.3-3.087-3-3.087-4.782 0-1.784 1.097-3.484 3.088-4.784 2.08-1.358 4.86-2.106 7.828-2.106 2.967 0 5.7.7 7.8 2.106 1.99 1.3 3.1 3 3.1 4.784C24.86 18.6 23.8 20.3 21.8 21.57zm4.014-6.97c-.432-1.084-1.19-2.095-2.244-2.977.273-.156.59-.245.928-.245 1.036 0 1.9.8 1.9 1.9-.016.522-.27 1.022-.57 1.327z"></path>
              </svg></span><span class="rrssb-text">reddit</span></a></li>';
    }

     if(get_option("zoorvy-social-share-pocket") == 1)
    {
        $zoorvy_share_buttons = $zoorvy_share_buttons . '<li class="rrssb-pocket">
        <a href="https://getpocket.com/save?url='. $url .'"><span class="rrssb-icon">
              <svg width="32" height="28" viewbox="0 0 32 28" xmlns="http://www.w3.org/2000/svg">
                <path d="M28.782.002c2.03.002 3.193 1.12 3.182 3.106-.022 3.57.17 7.16-.158 10.7-1.09 11.773-14.588 18.092-24.6 11.573C2.72 22.458.197 18.313.057 12.937c-.09-3.36-.05-6.72-.026-10.08C.04 1.113 1.212.016 3.02.008 7.347-.006 11.678.004 16.006.002c4.258 0 8.518-.004 12.776 0zM8.65 7.856c-1.262.135-1.99.57-2.357 1.476-.392.965-.115 1.81.606 2.496 2.453 2.334 4.91 4.664 7.398 6.966 1.086 1.003 2.237.99 3.314-.013 2.407-2.23 4.795-4.482 7.17-6.747 1.203-1.148 1.32-2.468.365-3.426-1.01-1.014-2.302-.933-3.558.245-1.596 1.497-3.222 2.965-4.75 4.526-.706.715-1.12.627-1.783-.034-1.597-1.596-3.25-3.138-4.93-4.644-.47-.42-1.123-.647-1.478-.844z"></path>
              </svg></span><span class="rrssb-text">pocket</span></a></li>';
    }

        $zoorvy_share_buttons = $zoorvy_share_buttons . "<div class='clear'></div></ul></br>";
        
     if(get_option("zoorvy-social-share-top") == 1 && get_option("zoorvy-social-share-bottom") == 1){
      
        return $zoorvy_share_buttons . $content . $zoorvy_share_buttons;
        return $content . $zoorvy_share_buttons;

      }

      if(get_option("zoorvy-social-share-top") == 1 && get_option("zoorvy-social-share-bottom") == 0){
      
        return $zoorvy_share_buttons . $content;

      }

      if(get_option("zoorvy-social-share-top") == 0 && get_option("zoorvy-social-share-bottom") == 1){
      
        return $content . $zoorvy_share_buttons;

      }

      else {
        return $content;
      }

    }

    // Page filter

    if(get_option("zoorvy-social-share-page") == 1){
     
    if (is_single() || is_page())
    {
        global $post;

        $url = get_permalink($post->ID);
        $url = esc_url($url);

      if(get_option("zoorvy-social-share-facebook") == 1)
    {
        

        $zoorvy_share_buttons = '<ul class="rrssb-buttons clearfix">';


        $zoorvy_share_buttons = $zoorvy_share_buttons . '<li class="rrssb-facebook">   
    <a href="https://www.facebook.com/sharer/sharer.php?u=' . $url . '" class="popup">
      <span class="rrssb-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 29"><path d="M26.4 0H2.6C1.714 0 0 1.715 0 2.6v23.8c0 .884 1.715 2.6 2.6 2.6h12.393V17.988h-3.996v-3.98h3.997v-3.062c0-3.746 2.835-5.97 6.177-5.97 1.6 0 2.444.173 2.845.226v3.792H21.18c-1.817 0-2.156.9-2.156 2.168v2.847h5.045l-.66 3.978h-4.386V29H26.4c.884 0 2.6-1.716 2.6-2.6V2.6c0-.885-1.716-2.6-2.6-2.6z"/></svg></span>
      <span class="rrssb-text">facebook</span>
    </a>
  </li>';

    }

    if(get_option("zoorvy-social-share-twitter") == 1)
    {
        $zoorvy_share_buttons = $zoorvy_share_buttons . '<li class="rrssb-twitter">
    <a href="https://twitter.com/intent/tweet?text=' . $url . '"
    class="popup">
      <span class="rrssb-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28"><path d="M24.253 8.756C24.69 17.08 18.297 24.182 9.97 24.62a15.093 15.093 0 0 1-8.86-2.32c2.702.18 5.375-.648 7.507-2.32a5.417 5.417 0 0 1-4.49-3.64c.802.13 1.62.077 2.4-.154a5.416 5.416 0 0 1-4.412-5.11 5.43 5.43 0 0 0 2.168.387A5.416 5.416 0 0 1 2.89 4.498a15.09 15.09 0 0 0 10.913 5.573 5.185 5.185 0 0 1 3.434-6.48 5.18 5.18 0 0 1 5.546 1.682 9.076 9.076 0 0 0 3.33-1.317 5.038 5.038 0 0 1-2.4 2.942 9.068 9.068 0 0 0 3.02-.85 5.05 5.05 0 0 1-2.48 2.71z"/></svg></span>
      <span class="rrssb-text">twitter</span>
    </a>
  </li>';
    }

    if(get_option("zoorvy-social-share-gplus") == 1)
    {
        $zoorvy_share_buttons = $zoorvy_share_buttons . '<li class="rrssb-googleplus">
          <a href="https://plus.google.com/share?url=' . $url . '" class="popup"><span class="rrssb-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24">
                <path d="M21 8.29h-1.95v2.6h-2.6v1.82h2.6v2.6H21v-2.6h2.6v-1.885H21V8.29zM7.614 10.306v2.925h3.9c-.26 1.69-1.755 2.925-3.9 2.925-2.34 0-4.29-2.016-4.29-4.354s1.885-4.353 4.29-4.353c1.104 0 2.014.326 2.794 1.105l2.08-2.08c-1.3-1.17-2.924-1.883-4.874-1.883C3.65 4.586.4 7.835.4 11.8s3.25 7.212 7.214 7.212c4.224 0 6.953-2.988 6.953-7.082 0-.52-.065-1.104-.13-1.624H7.614z"></path>
              </svg></span><span class="rrssb-text">google+</span></a>
        </li>';
    }

    if(get_option("zoorvy-social-share-linkedin") == 1)
    {
        $zoorvy_share_buttons = $zoorvy_share_buttons . '<li class="rrssb-linkedin">
        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='. $url .'" class="popup"><span class="rrssb-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewbox="0 0 28 28">
                <path d="M25.424 15.887v8.447h-4.896v-7.882c0-1.98-.71-3.33-2.48-3.33-1.354 0-2.158.91-2.514 1.802-.13.315-.162.753-.162 1.194v8.216h-4.9s.067-13.35 0-14.73h4.9v2.087c-.01.017-.023.033-.033.05h.032v-.05c.65-1.002 1.812-2.435 4.414-2.435 3.222 0 5.638 2.106 5.638 6.632zM5.348 2.5c-1.676 0-2.772 1.093-2.772 2.54 0 1.42 1.066 2.538 2.717 2.546h.032c1.71 0 2.77-1.132 2.77-2.546C8.056 3.593 7.02 2.5 5.344 2.5h.005zm-2.48 21.834h4.896V9.604H2.867v14.73z"></path>
              </svg></span><span class="rrssb-text">linkedin</span></a></li>';
    }

    if(get_option("zoorvy-social-share-reddit") == 1)
    {
        $zoorvy_share_buttons = $zoorvy_share_buttons . '<li class="rrssb-reddit">
        <a href="http://www.reddit.com/submit?url='. $url .'"><span class="rrssb-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewbox="0 0 28 28">
                <path d="M11.794 15.316c0-1.03-.835-1.895-1.866-1.895-1.03 0-1.893.866-1.893 1.896s.863 1.9 1.9 1.9c1.023-.016 1.865-.916 1.865-1.9zM18.1 13.422c-1.03 0-1.895.864-1.895 1.895 0 1 .9 1.9 1.9 1.865 1.03 0 1.87-.836 1.87-1.865-.006-1.017-.875-1.917-1.875-1.895zM17.527 19.79c-.678.68-1.826 1.007-3.514 1.007h-.03c-1.686 0-2.834-.328-3.51-1.005-.264-.265-.693-.265-.958 0-.264.265-.264.7 0 1 .943.9 2.4 1.4 4.5 1.402.005 0 0 0 0 0 .005 0 0 0 0 0 2.066 0 3.527-.46 4.47-1.402.265-.264.265-.693.002-.958-.267-.334-.688-.334-.988-.043z"></path>
                <path d="M27.707 13.267c0-1.785-1.453-3.237-3.236-3.237-.792 0-1.517.287-2.08.76-2.04-1.294-4.647-2.068-7.44-2.218l1.484-4.69 4.062.955c.07 1.4 1.3 2.6 2.7 2.555 1.488 0 2.695-1.208 2.695-2.695C25.88 3.2 24.7 2 23.2 2c-1.06 0-1.98.616-2.42 1.508l-4.633-1.09c-.344-.082-.693.117-.803.454l-1.793 5.7C10.55 8.6 7.7 9.4 5.6 10.75c-.594-.45-1.3-.75-2.1-.72-1.785 0-3.237 1.45-3.237 3.2 0 1.1.6 2.1 1.4 2.69-.04.27-.06.55-.06.83 0 2.3 1.3 4.4 3.7 5.9 2.298 1.5 5.3 2.3 8.6 2.325 3.227 0 6.27-.825 8.57-2.325 2.387-1.56 3.7-3.66 3.7-5.917 0-.26-.016-.514-.05-.768.965-.465 1.577-1.565 1.577-2.698zm-4.52-9.912c.74 0 1.3.6 1.3 1.3 0 .738-.6 1.34-1.34 1.34s-1.343-.602-1.343-1.34c.04-.655.596-1.255 1.396-1.3zM1.646 13.3c0-1.038.845-1.882 1.883-1.882.31 0 .6.1.9.21-1.05.867-1.813 1.86-2.26 2.9-.338-.328-.57-.728-.57-1.26zm20.126 8.27c-2.082 1.357-4.863 2.105-7.83 2.105-2.968 0-5.748-.748-7.83-2.105-1.99-1.3-3.087-3-3.087-4.782 0-1.784 1.097-3.484 3.088-4.784 2.08-1.358 4.86-2.106 7.828-2.106 2.967 0 5.7.7 7.8 2.106 1.99 1.3 3.1 3 3.1 4.784C24.86 18.6 23.8 20.3 21.8 21.57zm4.014-6.97c-.432-1.084-1.19-2.095-2.244-2.977.273-.156.59-.245.928-.245 1.036 0 1.9.8 1.9 1.9-.016.522-.27 1.022-.57 1.327z"></path>
              </svg></span><span class="rrssb-text">reddit</span></a></li>';
    }

     if(get_option("zoorvy-social-share-pocket") == 1)
    {
        $zoorvy_share_buttons = $zoorvy_share_buttons . '<li class="rrssb-pocket">
        <a href="https://getpocket.com/save?url='. $url .'"><span class="rrssb-icon">
              <svg width="32" height="28" viewbox="0 0 32 28" xmlns="http://www.w3.org/2000/svg">
                <path d="M28.782.002c2.03.002 3.193 1.12 3.182 3.106-.022 3.57.17 7.16-.158 10.7-1.09 11.773-14.588 18.092-24.6 11.573C2.72 22.458.197 18.313.057 12.937c-.09-3.36-.05-6.72-.026-10.08C.04 1.113 1.212.016 3.02.008 7.347-.006 11.678.004 16.006.002c4.258 0 8.518-.004 12.776 0zM8.65 7.856c-1.262.135-1.99.57-2.357 1.476-.392.965-.115 1.81.606 2.496 2.453 2.334 4.91 4.664 7.398 6.966 1.086 1.003 2.237.99 3.314-.013 2.407-2.23 4.795-4.482 7.17-6.747 1.203-1.148 1.32-2.468.365-3.426-1.01-1.014-2.302-.933-3.558.245-1.596 1.497-3.222 2.965-4.75 4.526-.706.715-1.12.627-1.783-.034-1.597-1.596-3.25-3.138-4.93-4.644-.47-.42-1.123-.647-1.478-.844z"></path>
              </svg></span><span class="rrssb-text">pocket</span></a></li>';
    }

        $zoorvy_share_buttons = $zoorvy_share_buttons . "<div class='clear'></div></ul></br>";
        
     if(get_option("zoorvy-social-share-top") == 1 && get_option("zoorvy-social-share-bottom") == 1){
      
        return $zoorvy_share_buttons . $content . $zoorvy_share_buttons;
        return $content . $zoorvy_share_buttons;

      }

      if(get_option("zoorvy-social-share-top") == 1 && get_option("zoorvy-social-share-bottom") == 0){
      
        return $zoorvy_share_buttons . $content;

      }

      if(get_option("zoorvy-social-share-top") == 0 && get_option("zoorvy-social-share-bottom") == 1){
      
        return $content . $zoorvy_share_buttons;

      }

      else {
        return $content;
      }

    }

    }

    else {
        return $content;
    }

}

add_filter("the_content", "add_zoorvy_social_share_icons");


run_zoorvy_social_share();
