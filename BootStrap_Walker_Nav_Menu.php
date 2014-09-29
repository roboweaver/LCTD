<?php

/* * ****************************************************************************
 * Enable Bootstrap Active Class In Navigation Menu
 * *************************************************************************** */

class BootStrap_Walker_Nav_Menu extends Walker_Nav_Menu {

	
	/**
	 * Starts the list before the elements are added.
	 *
	 * @see Walker::start_lvl()
	 *
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<div class=\"sub-menu\">\n";
	}
	
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "\n</div>\n";
	}

	function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
		$element->hasChildren = isset( $children_elements[$element->ID] ) && !empty( $children_elements[$element->ID] );
	
		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		if ( $item->current || $item->current_item_ancestor || $item->current_item_parent ) {
			$class_names .= ' active';
		}
		$class_names .= ' btn btn-default';
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
		$output .= $indent . '<a' . $id . $class_names;
		$atts = array();
		$atts['title'] = !empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = !empty( $item->target ) ? $item->target : '';
		$atts['rel'] = !empty( $item->xfn ) ? $item->xfn : '';
		$atts['href'] = !empty( $item->url ) ? $item->url : '';
		$atts['class'] = ($item->hasChildren) ? 'dropdown-toggle' : '';
		$atts['data-toggle'] = ($item->hasChildren) ? 'dropdown' : '';
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( !empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		$item_output = $args->before;
		$item_output .= $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		if ( $item->hasChildren ) {
			$item_output .= ' <b class="caret"></b>';
		}
		
		$item_output .= $args->after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	
	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</a>";
	}

}

