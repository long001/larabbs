<?php

if(!function_exists('route_class')){
    function route_class()
    {
        return str_replace('.', '-', Route::currentRouteName());
    }
}

if(!function_exists('make_excerpt')){
    function make_excerpt($value, $length = 200)
    {
        $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
        return str_limit($excerpt, $length);
    }
}

if (!function_exists('manage_contents')) {
    function manage_contents()
    {
        return Auth::check() && Auth::user()->can('manage_contents');
    }
}

if (!function_exists('manage_users')) {
    function manage_users()
    {
        return Auth::check() && Auth::user()->can('manage_users');
    }
}

if (!function_exists('administrator_users_avatar')) {
    function administrator_users_avatar($avatar, $model)
    {
        return empty($avatar) ? 'N/A' : '<img src="'.$avatar.'" width="40">';
    }
}

if (!function_exists('administrator_users_name')) {
    function administrator_users_name($name, $model)
    {
        return '<a href="/users/'.$model->id.'" target=_blank>'.$name.'</a>';
    }
}

if (!function_exists('role_permissions_output')) {
    function role_permissions_output($value, $model) {
        $model->load('permissions');
        $result = [];
        foreach ($model->permissions as $permission) {
            $result[] = $permission->name;
        }

        return empty($result) ? 'N/A' : implode($result, ' | ');
    }
}

if (!function_exists('role_operation_output')) {
    function role_operation_output($value, $model) {
        return $value;
    }
}



