<?php

return array(

    'title'         => esc_html__( 'Custom Sidebar Settings', 'acuasafe' ),
    'id'            => 'sidebar_setting',
    'desc'          => '',
    'icon'          => 'el el-indent-left',
    'fields'        => array(
        array(
            'id' => 'custom_sidebar_name',
            'type' => 'multi_text',
            'title' => esc_html__('Dynamic Custom Sidebar', 'acuasafe'),
            'desc' => esc_html__('This section is used to create custom sidebar', 'acuasafe')
            ),
    ),
);

