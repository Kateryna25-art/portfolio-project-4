<?php

function jewerly_theme_setup()
{
  add_theme_support("post-thumbnails");
  add_theme_support("custom-logo");
  add_theme_support("woocommerce");
}
add_action("after_setup_theme", "jewerly_theme_setup");

function my_theme_assets()
{
  wp_enqueue_style("main-style", get_template_directory_uri() . "/assets/css/style.min.css", [], "1.0");

  wp_enqueue_script("main-script", get_template_directory_uri() . "/assets/js/main.min.js", [], "1.0", true);

  wp_localize_script("main-script", "cartData", [
    "ajax_url" => admin_url("admin-ajax.php"),
    "nonce" => wp_create_nonce("cart_quantity_nonce"),
    "coupon_nonce" => wp_create_nonce("apply_cart_coupon"),
  ]);
}
add_action("wp_enqueue_scripts", "my_theme_assets");

add_filter("woocommerce_add_to_cart_fragments", "jewerly_cart_fragment");

function jewerly_cart_fragment($fragments)
{
  ob_start();

  get_template_part("shopping-bag");

  $fragments["aside.shopping-bag"] = ob_get_clean();

  return $fragments;
}

add_action("wp_footer", function () {
  if (current_user_can("administrator")) {
    global $template;
    echo '<div style="
        position:fixed;
        bottom:0;
        left:0;
        z-index:99999;
        background:#000;
        color:#fff;
        padding:10px;
        font-size:14px;
        ">';
    echo "TEMPLATE: " . esc_html($template);
    echo "</div>";
  }
});

add_action("wp_footer", function () {
  echo '<pre style="background:white;color:black;padding:20px;">';
  echo get_template_directory();
  echo "</pre>";
});

add_filter(
  "woocommerce_login_redirect",
  function ($redirect, $user) {
    return home_url("/profile/");
  },
  10,
  2,
);

remove_action("woocommerce_account_navigation", "woocommerce_account_navigation");

add_action("template_redirect", "jewerly_save_profile_address");

function jewerly_save_profile_address()
{
  if (!isset($_POST["save_profile_address"])) {
    return;
  }

  if (!is_user_logged_in() || !class_exists("WC_Customer")) {
    return;
  }

  if (
    !isset($_POST["profile_address_nonce"]) ||
    !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["profile_address_nonce"])), "save_profile_address")
  ) {
    return;
  }

  $type = isset($_POST["address_type"]) ? sanitize_key(wp_unslash($_POST["address_type"])) : "";

  if (!in_array($type, ["billing", "shipping"], true)) {
    return;
  }

  $customer = new WC_Customer(get_current_user_id());

  $fields = ["first_name", "last_name", "company", "country", "address", "postcode", "city"];

  if ($type === "billing") {
    $fields[] = "phone";
    $fields[] = "email";
  }

  foreach ($fields as $field) {
    $value = isset($_POST[$field]) && is_string($_POST[$field]) ? sanitize_text_field(wp_unslash($_POST[$field])) : "";

    if ($field === "email") {
      $value = sanitize_email($value);
    }

    $method =
      "set_" . $type . "_" . ($field === "address" ? "address_1" : ($field === "postcode" ? "postcode" : $field));
    if (is_callable([$customer, $method])) {
      $customer->$method($value);
    }
  }

  $customer->save();

  wp_safe_redirect(add_query_arg("address_saved", "1", get_permalink()));
  exit();
}

add_action("template_redirect", "jewerly_save_account_details");

function jewerly_save_account_details()
{
  if (!isset($_POST["save_account_details"])) {
    return;
  }

  if (!is_user_logged_in()) {
    return;
  }

  if (
    !isset($_POST["account_details_nonce"]) ||
    !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["account_details_nonce"])), "save_account_details")
  ) {
    return;
  }

  $user_id = get_current_user_id();

  $current_password = isset($_POST["current_password"]) ? wp_unslash($_POST["current_password"]) : "";

  $new_password = isset($_POST["new_password"]) ? wp_unslash($_POST["new_password"]) : "";

  $confirm_password = isset($_POST["confirm_password"]) ? wp_unslash($_POST["confirm_password"]) : "";

  if ($new_password !== "") {
    $user = get_userdata($user_id);

    if (!$user || !wp_check_password($current_password, $user->user_pass, $user_id)) {
      return;
    }
  }
  if ($new_password !== "") {
    if ($new_password !== $confirm_password) {
      return;
    }
  }
  $first_name = isset($_POST["first_name"]) ? sanitize_text_field(wp_unslash($_POST["first_name"])) : "";

  $last_name = isset($_POST["last_name"]) ? sanitize_text_field(wp_unslash($_POST["last_name"])) : "";

  $display_name = isset($_POST["display_name"]) ? sanitize_text_field(wp_unslash($_POST["display_name"])) : "";

  $email = isset($_POST["email"]) ? sanitize_email(wp_unslash($_POST["email"])) : "";

  if (empty($display_name) || !is_email($email) || (email_exists($email) && email_exists($email) != $user_id)) {
    return;
  }

  $result = wp_update_user([
    "ID" => $user_id,
    "display_name" => $display_name,
    "user_email" => $email,
  ]);

  if (is_wp_error($result)) {
    return;
  }

  update_user_meta($user_id, "first_name", $first_name);
  update_user_meta($user_id, "last_name", $last_name);

  if ($new_password !== "") {
    wp_set_password($new_password, $user_id);
  }

  wp_safe_redirect(add_query_arg("details_saved", "1", get_permalink()));
  exit();
}

add_filter("woocommerce_lost_password_confirmation_message", function ($message) {
  return $message;
});

add_action("template_redirect", function () {
  if (is_wc_endpoint_url("lost-password") && isset($_GET["reset-link-sent"]) && $_GET["reset-link-sent"] === "true") {
    wp_safe_redirect(home_url("/resetpassword/?reset-link-sent=true"));
    exit();
  }
});

add_action("wp_ajax_update_cart_quantity", "my_update_cart_quantity");

add_action("wp_ajax_nopriv_update_cart_quantity", "my_update_cart_quantity");

function my_update_cart_quantity()
{
  check_ajax_referer("cart_quantity_nonce", "nonce");

  $cart_key = sanitize_text_field(wp_unslash($_POST["cart_key"] ?? ""));

  $quantity = max(1, absint($_POST["quantity"] ?? 1));

  if (!WC()->cart || !WC()->cart->get_cart_item($cart_key)) {
    wp_send_json_error();
  }

  WC()->cart->set_quantity($cart_key, $quantity);

  WC()->cart->calculate_totals();

  wp_send_json_success();
}
add_action("wp_ajax_remove_cart_item", "my_remove_cart_item");

add_action("wp_ajax_nopriv_remove_cart_item", "my_remove_cart_item");

function my_remove_cart_item()
{
  check_ajax_referer("cart_quantity_nonce", "nonce");

  $cart_key = sanitize_text_field(wp_unslash($_POST["cart_key"] ?? ""));

  if (!WC()->cart || !$cart_key) {
    wp_send_json_error();
  }

  $removed = WC()->cart->remove_cart_item($cart_key);

  if ($removed) {
    WC()->cart->calculate_totals();

    wp_send_json_success();
  }

  wp_send_json_error();
}

add_action("wp_ajax_apply_cart_coupon", "my_apply_cart_coupon");
add_action("wp_ajax_nopriv_apply_cart_coupon", "my_apply_cart_coupon");

function my_apply_cart_coupon()
{
  check_ajax_referer("apply_cart_coupon", "nonce");

  $coupon = sanitize_text_field(wp_unslash($_POST["coupon_code"] ?? ""));

  if (empty($coupon)) {
    wp_send_json_error("Введите код купона");
  }

  if (WC()->cart->apply_coupon($coupon)) {
    WC()->cart->calculate_totals();
    wp_send_json_success();
  }

  wp_send_json_error("Не удалось применить купон");
}

?>
