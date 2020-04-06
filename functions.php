<?

/***********************************************
URL Rewriting
***********************************************/
function url_rewrite($permalink, $post) {
    
    if ($post->post_type == 'your-post-type-name')
     {  
         return 'blog'.$permalink; 
         // this code will add blog in my post ulrs http://example.com/blog/post-title
     }
}
add_filter('pre_post_link', 'url_rewrite', 10, 2);

/***********************************************
Remove WP Version
***********************************************/
function remove_wp_version() {
  return ''; 
}
add_filter('the_generator', 'remove_wp_version');

/**********************************************
Automatically Send Invoice to Customer in Email
**********************************************/
function sendinvoice($orderid) {
  $email = new WC_Email_Customer_Invoice();
  $email->trigger($orderid);
}
add_action('woocommerce_order_status_completed_notification','sendinvoice');
