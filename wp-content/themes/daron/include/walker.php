<?php
class Daron_Walker_Nav_Primary extends Walker_Nav_Menu {
	
	function start_lvl(&$output, $depth = 0, $args = array()) { //ul
		$indent = str_repeat("\t", $depth);
		$submenu = ($depth) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"dropdown-menu s-header-v2__dropdown-menu$submenu depth_$depth\">\n";
	}
	
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )      {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		
		$classes[] = ($args->walker->has_children) ? 's-header-v2__dropdown-on-hover' : '';

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
		
        $output .= $indent . '<li' . $id . $value . $class_names . '>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? esc_attr($item->attr_title) : '';
		$atts['target'] = ! empty( $item->target )     ? esc_attr($item->target)     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? esc_attr($item->xfn)        : '';
		$atts['href']   = ! empty( $item->url )        ? esc_attr($item->url)        : '';
		
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		
		$item_output = $args->before;
		
		if ( $args->walker->has_children ) {
			$item_output .= '<a data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"'. $attributes . $class_names .'>';
		} else {
			$item_output .= '<a '. $attributes . $class_names .'>';
		}
       
	   $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

		if ( $args->walker->has_children && !$depth) {
           // $submenus = 0 == $depth || 1 == $depth ? get_posts( array( 'post_type' => 'nav_menu_itesm', 'numberposts' => 1, 'meta_query' => array( array( 'key' => '_menu_item_menu_item_parent', 'value' => $item->ID, 'fields' => 'ids' ) ) ) ) : false;
            $item_output .= '<span class="g-font-size-15--xs g-margin-l-5--xs fa fa-angle-down"></span>';
        }
		if ( $args->walker->has_children && $depth ) {
           // $submenus = 0 == $depth || 1 == $depth ? get_posts( array( 'post_type' => 'nav_menu_itesm', 'numberposts' => 1, 'meta_query' => array( array( 'key' => '_menu_item_menu_item_parent', 'value' => $item->ID, 'fields' => 'ids' ) ) ) ) : false;
            $item_output .= '<span class="g-font-size-15--xs g-margin-l-5--xs fa fa-angle-right"></span>';
        } 
        $item_output .= '</a>';
        $item_output .= $args->after;
		
		/* $item_output = $args->before;
		$item_output .= '<a'. $attributes .$class_names.'><span class="">';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</span></a>';
		$item_output .= $args->after; */

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class ($classes, $item) {
    if (in_array('current-menu-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $classes[] = '-is-active ';
    }
    return $classes;
}
?>