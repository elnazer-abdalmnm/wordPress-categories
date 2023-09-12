<?php
function show_categories_list() {
    $categories = get_categories();

    if ($categories) {
        $output = '<div class="category-grid">';
        foreach ($categories as $category) {
            $category_image = z_taxonomy_image_url($category->term_id);

            $output .= '<div class="category-wrapper">';
            $output .= '<div class="category-image" style="background-image: url(' . esc_url($category_image) . ');"></div>';
            $output .= '<div class="category-name"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
            $output .= '</div>';
        }
        $output .= '</div>';
        return $output;
    } else {
        return 'No categories found.';
    }
}
add_shortcode('categories', 'show_categories_list');
