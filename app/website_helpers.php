<?php

function get_theme_menu($menu) {

    $menuItems = [];
    $menu = \RyanChandler\FilamentNavigation\Facades\FilamentNavigation::get($menu);
    if (!empty($menu->items)) {
        foreach ($menu->items as $item) {
            $url = '';
            if (isset($item['type'])) {
                if ($item['type'] == 'page-link') {
                    $findPage = \App\Models\Website\Page::find($item['data']['page_id']);
                    if ($findPage) {
                        $url = route('website.page', ['slug' => $findPage->slug]);
                    }
                }
            }
            $menuItems[] = [
                'label' => $item['label'],
                'data'=>[
                    'url'=> $url
                ]
            ];
        }
    }

    return $menuItems;
}
