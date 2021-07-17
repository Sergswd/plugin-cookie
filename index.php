<?php
/*
  Plugin Name:       My Cookie Notify
  Description:       Выводит уведомления для пользователей сайта о том, что сайт использует cookie.
  License:           GPL2

  "My Cookie Notify" is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 2 of the License, or
  any later version.
  
  "My Cookie Notify" is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.
  
  You should have received a copy of the GNU General Public License
  along with "My Cookie Notify". If not, see https://fitness-medic.com.
 */

  register_activation_hook(__FILE__, 'cnl_activation');
  register_deactivation_hook(__FILE__, 'cnl_deactivation');

  function cnl_options() {
    return [
      'cnl_bg'       => '#000',
      'cnl_color'    => '#fff',
      'cnl_text'     => 'Мы используем cookie',
      'cnl_position' => 'bottom'
    ];
  }

  function cnl_activation() {
    $options = cnl_options();
    foreach($options as $key => $value) {
      update_option($key, $value);
    }
  }

  function cnl_deactivation() {
    $options = cnl_options();
    foreach($options as $key => $value) {
      delete_option($key);
    }
  }

  // add_action('wp_footer', function() {
  //   $options = cnl_options();
  //   foreach($options as $key => $value) {
  //     echo $key . ' => ' . get_option($key) . '<br>';
  //   }
  // })

  add_action('admin_menu', 'cnl_register_menu');

  function cnl_register_menu() {
    add_menu_page(
      'Cookie уведомление',
      'Cookie уведомление',
      'manage_options',
      'cnl-settings',
      'cnl_admin_page_view',
      'dashicons-buddicons-pm'
    );
  }

  function cnl_admin_page_view() {
    echo '<h1>Hello cookie!</h1>';
  }

?>