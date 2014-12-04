<?php

/************************************************************
 * Customize search form input box text
 ************************************************************/
add_filter( 'genesis_search_text', 'sp_search_text' );
function sp_search_text( $text ) {
    return esc_attr( 'Search...' );
}

add_filter( 'get_search_form', 'lcm_search_form' );
function lcm_search_form() {
    $search_text = get_search_query() ? apply_filters( 'the_search_query', get_search_query() ) : apply_filters( 'genesis_search_text', __( 'Search this website', 'genesis' ) . '&#x02026;' );

    $button_text = apply_filters( 'genesis_search_button_text', esc_attr__( 'Search', 'genesis' ) );

    $onfocus = "if ('" . esc_js( $search_text ) . "' === this.value) {this.value = '';}";
    $onblur  = "if ('' === this.value) {this.value = '" . esc_js( $search_text ) . "';}";

    //* Empty label, by default. Filterable.
    $label = apply_filters( 'genesis_search_form_label', '' );

    $value_or_placeholder = ( get_search_query() == '' ) ? 'placeholder' : 'value';

    if ( genesis_html5() )
        $form = sprintf( '<form method="get" class="search-form" action="%s" role="search">%s<input type="search" name="s" %s="%s" /><input type="submit" value="%s" /></form>', home_url( '/' ), esc_html( $label ), $value_or_placeholder, esc_attr( $search_text ), esc_attr( $button_text ) );
    else
        $form = sprintf( '<form method="get" class="searchform search-form" action="%s" role="search" >%s<input type="text" value="%s" name="s" class="s search-input" onfocus="%s" onblur="%s" /><input type="submit" class="searchsubmit search-submit" value="%s" /></form>', home_url( '/' ), esc_html( $label ), esc_attr( $search_text ), esc_attr( $onfocus ), esc_attr( $onblur ), esc_attr( $button_text ) );

    return apply_filters( 'genesis_search_form', $form, $search_text, $button_text, $label );

}