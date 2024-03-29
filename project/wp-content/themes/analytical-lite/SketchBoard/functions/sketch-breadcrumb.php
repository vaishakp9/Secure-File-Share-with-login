<?php
class ana_breadcrumb_class {
    var $opts;
    function custom_breadcrumb() {
        $this->opts = array(
            'before' => '&nbsp;',
            'after' => '&nbsp; ',
            'delimiter' => '&raquo;'
        );
        $markup = $this->opts['before'] . $this->opts['delimiter'] . $this->opts['after'];
        global $post, $options;
        #require('var.php');
        echo '<section class="cont_nav"><div class="cont_nav_inner"><p><a href="' . esc_url(home_url('/')) . '">' . __('Home', 'analytical') . '</a>';
        if (!is_front_page()) {
            echo $markup;
        }
		if (is_front_page() && !is_home()) {
            echo $markup;
        }
        $output = $this->simple_breadcrumb_case($post);
        if (is_page() || is_single()) {
            the_title('<span>', '</span>');
        } else {
            echo $output;
        }
        echo "</p></div></section>";
    }
    function simple_breadcrumb_case($der_post) {
        $markup = $this->opts['before'] . $this->opts['delimiter'] . $this->opts['after'];
        if (is_page()) {
            if ($der_post->post_parent) {
                $my_query = get_post($der_post->post_parent);
                $this->simple_breadcrumb_case($my_query);
                $link = '<a href="';
                $link .= get_permalink($my_query->ID);
                $link .= '">';
                $link .= '' . get_the_title($my_query->ID) . '</a>' . $markup;
                echo $link;
            }
            return;
        }
        if (is_single() && !is_attachment()) {
            $category = get_the_category();
            if (is_attachment()) {
                $my_query = get_post($der_post->post_parent);
                $category = get_the_category($my_query->ID);
                $ID = $category[0]->cat_ID;
                echo get_category_parents($ID, true, $markup, false);
                previous_post_link("%link $markup");
            } else {
                if (isset($category[0]->cat_ID)) {
                    $ID = $category[0]->cat_ID;
                    echo get_category_parents($ID, true, $markup, false);
                }
            }
            return;
        }
        if (is_category()) {
            $category = get_the_category();
            $i = $category[0]->cat_ID;
            $parent = $category[0]->category_parent;
            if ($parent > 0 && $category[0]->cat_name == single_cat_title('', false)) {
                echo get_category_parents($parent, true, $markup, false);
            }
            return single_cat_title('', false);
        }
        if (is_author()) {
           global $wp_query;
            $curauth = $wp_query->get_queried_object();	
            return __('Author', 'analytical') . ': ' . $curauth->display_name;
        }
        if (is_tag()) {
            return __('Tag', 'analytical') . ': ' . single_tag_title('', false);
        }
        if (is_search()) {
            return __('Search', 'analytical');
        }
        if (is_year()) {
            return get_the_time('Y');
        }
        if (is_month()) {
            $k_year = get_the_time('Y');
            echo "<a href='" . get_year_link($k_year) . "'>" . $k_year . "</a>" . $markup;
            return get_the_time('F');
        }
        if (is_day() || is_time()) {
            $k_year = get_the_time('Y');
            $k_month = get_the_time('m');
            $k_month_display = get_the_time('F');
            echo "<a href='" . get_year_link($k_year) . "'>" . $k_year . "</a>" . $markup;
            echo "<a href='" . get_month_link($k_year, $k_month) . "'>" . $k_month_display . "</a>" . $markup;
            return get_the_time('jS (l)');
        }
    }
}
$ana_breadcumb = new ana_breadcrumb_class();
?>