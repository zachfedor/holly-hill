<?php
/*
Plugin Name: Column Classes 
Plugin URI: http://towermarketing.net
Description: This plugin adds column classes shortcodes and css 
Author: Tower Marketing
Version: 1.0
Author URI: http://towermarketing.net
*/


$ColumnClasses = new ColumnClasses;

Class ColumnClasses{

	public function __construct(){

		wp_enqueue_style('column-classes-css', site_url('wp-content/plugins/column-classes/assets/css/column-classes-css.css'));

		add_shortcode('one-third', array($this, 'mc_one_third'));
		add_shortcode('one-third-first', array($this, 'mc_one_thirds_first'));
		add_shortcode('two-thirds', array($this, 'mc_two_third'));
		add_shortcode('two-thirds-first', array($this, 'mc_two_thirds_first'));
		add_shortcode('one-half', array($this, 'mc_one_half'));
		add_shortcode('one-half-first', array($this, 'mc_one_half_first'));
		add_shortcode('one-fourth', array($this, 'mc_one_fourth'));
		add_shortcode('one-fourth-first', array($this, 'mc_one_fourth_first'));
		add_shortcode('three-fourths', array($this, 'mc_three_fourths'));
		add_shortcode('three-fourths-first', array($this, 'mc_three_fourths_first'));
		add_shortcode('one-fifth', array($this, 'mc_one_fifth'));
		add_shortcode('one-fifth-first', array($this, 'mc_one_fifth_first'));
		add_shortcode('two-fifths', array($this, 'mc_two_fifths'));
		add_shortcode('two-fifths-first', array($this, 'mc_two_fifths_first'));
		add_shortcode('three-fifths', array($this, 'mc_three_fifths'));
		add_shortcode('three-fifths-first', array($this, 'mc_three_fifths_first'));
		add_shortcode('four-fifth', array($this, 'mc_four_fifths'));
		add_shortcode('four-fifths-first', array($this, 'mc_four_fifths_first'));
		add_shortcode('one-sixth', array($this, 'mc_one_sixth'));
		add_shortcode('one-sixth-first', array($this, 'mc_one_sixths_first'));
		add_shortcode('five-sixths', array($this, 'mc_five_sixths'));
		add_shortcode('five-sixths-first', array($this, 'mc_five_sixths_first'));

	}

	public function mc_one_third( $atts, $content = null ) {
	   return '<div class="one-third">' . do_shortcode($content) . '</div>';
	}

	public function mc_one_thirds_first( $atts, $content = null ) {
	   return '<div class="one-third first">' . do_shortcode($content) . '</div>';
	}

	public function mc_two_third( $atts, $content = null ) {
	   return '<div class="two-thirds">' . do_shortcode($content) . '</div>';
	}

	public function mc_two_thirds_first( $atts, $content = null ) {
	   return '<div class="two-thirds first">' . do_shortcode($content) . '</div>';
	}

	public function mc_one_half( $atts, $content = null ) {
	   return '<div class="one-half">' . do_shortcode($content) . '</div>';
	}

	public function mc_one_half_first( $atts, $content = null ) {
	   return '<div class="one-half first">' . do_shortcode($content) . '</div>';
	}

	public function mc_one_fourth( $atts, $content = null ) {
	   return '<div class="one-fourth">' . do_shortcode($content) . '</div>';
	}

	public function mc_one_fourth_first( $atts, $content = null ) {
	   return '<div class="one-fourth first">' . do_shortcode($content) . '</div>';
	}

	public function mc_three_fourths( $atts, $content = null ) {
	   return '<div class="three-fourths">' . do_shortcode($content) . '</div>';
	}

	public function mc_three_fourths_first( $atts, $content = null ) {
	   return '<div class="three-fourths first">' . do_shortcode($content) . '</div>';
	}

	public function mc_one_fifth( $atts, $content = null ) {
	   return '<div class="one-fifth">' . do_shortcode($content) . '</div>';
	}

	public function mc_one_fifths_first( $atts, $content = null ) {
	   return '<div class="one-fifth first">' . do_shortcode($content) . '</div>';
	}

	public function mc_two_fifth( $atts, $content = null ) {
	   return '<div class="two-fifths">' . do_shortcode($content) . '</div>';
	}

	public function mc_two_fifths_first( $atts, $content = null ) {
	   return '<div class="two-fifths first">' . do_shortcode($content) . '</div>';
	}

	public function mc_three_fifth( $atts, $content = null ) {
	   return '<div class="three-fifths">' . do_shortcode($content) . '</div>';
	}

	public function mc_three_fifths_first( $atts, $content = null ) {
	   return '<div class="three-fifths first">' . do_shortcode($content) . '</div>';
	}

	public function mc_four_fifth( $atts, $content = null ) {
	   return '<div class="four-fifths">' . do_shortcode($content) . '</div>';
	}

	public function mc_four_fifths_first( $atts, $content = null ) {
	   return '<div class="four-fifths first">' . do_shortcode($content) . '</div>';
	}

	public function mc_one_sixth( $atts, $content = null ) {
	   return '<div class="one-sixth">' . do_shortcode($content) . '</div>';
	}

	public function mc_one_sixths_first( $atts, $content = null ) {
	   return '<div class="one-sixth first">' . do_shortcode($content) . '</div>';
	}

	public function mc_five_sixth( $atts, $content = null ) {
	   return '<div class="five-sixths">' . do_shortcode($content) . '</div>';
	}

	public function mc_five_sixths_first( $atts, $content = null ) {
	   return '<div class="five-sixths first">' . do_shortcode($content) . '</div>';
	}
}

?>
