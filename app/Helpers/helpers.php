<?php

if (!function_exists('getMenuIcon')) {
    function getMenuIcon(string $vista, bool $isActive = false): string
    {
        $iconMap = config('menu_icons');
        $iconBase = $iconMap[$vista] ?? 'default-icon'; // ícono por defecto
        $style = $isActive ? 'solid' : 'light';
        return "/assets/svg/icons/menu/{$iconBase}_{$style}_icon.svg";
    }
}
