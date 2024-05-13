<?php

// Action qui permet de charger des scripts dans notre thème
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles(){
    // Chargement du style.css du thème parent Oceanwp
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    // Chargement du css/theme.css pour nos personnalisations
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));

}

// Insertion lien Admin dans le menu de navigation
function add_admin_link_to_nav_menu($menu_nav) {
    // Vérifier si l'utilisateur est connecté
    if (is_user_logged_in()) {
        // Créer le lien "Admin"
        $admin_link = '<li><a href="' . admin_url() . '">Admin</a></li>';
        
        // Remplacer toutes les occurrences de "Nous rencontrer" par "Nous rencontrer" suivi du lien "Admin"
        $menu_nav = str_replace('Nous rencontrer', 'Nous rencontrer' . $admin_link, $menu_nav);
    }
    
    return $menu_nav;
}
add_filter('wp_nav_menu_items', 'add_admin_link_to_nav_menu');

