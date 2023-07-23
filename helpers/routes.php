<?php
const routes = [
    [
        'path' => '/',
        'controller' => 'home',
        'action' => 'home',
    ],
    [
        'path' => 'admin/profile-type',
        'controller' => 'ProfileType',
        'action' => 'index',
        'middleware' => 'AdminAuth'
    ],
    [
        'path' => 'admin/profile-type/store',
        'controller' => 'ProfileType',
        'action' => 'storeProfileType',
        'middleware' => 'AdminAuth'
    ],
    [
        'path' => 'admin/profile-type/show',
        'controller' => 'ProfileType',
        'action' => 'showProfileType',
        'middleware' => 'AdminAuth'
    ],
    [
        'path' => 'admin/profile-type/update',
        'controller' => 'ProfileType',
        'action' => 'updateProfileType',
        'middleware' => 'AdminAuth'
    ],
    [
        'path' => 'admin/profile-type/delete',
        'controller' => 'ProfileType',
        'action' => 'deleteProfileType',
        'middleware' => 'AdminAuth',
    ],
    [
        'path' => 'admin',
        'controller' => 'Dashboard',
        'action' => 'home',
        'middleware' => 'AdminAuth',
    ],
    [
        'path' => 'admin/logout',
        'controller' => 'Logout',
        'action' => 'logoutAdmin',
        'middleware' => 'AdminAuth',

    ],
    [
        'path' => 'admin/login',
        'controller' => 'LoginAdmin',
        'action' => 'index',
        'middleware' => 'AdminGuest',
    ],
    [
        'path' => 'admin/handle-login',
        'controller' => 'LoginAdmin',
        'action' => 'authentication',
        'middleware' => 'AdminGuest',
    ],
    [
        'path' => 'nhap-thong-tin-ho-so',
        'controller' => 'home',
        'action' => 'store',
    ],
    [
        'path' => 'tra-cuu-thong-tin',
        'controller' => 'home',
        'action' => 'search',
    ],
];
