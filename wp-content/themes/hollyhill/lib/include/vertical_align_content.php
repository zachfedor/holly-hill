<?php

function valignContent($content){
	$html = '';
	$html .= '<div class="valign-outer"> <div class="valign-middle"> <div class="valign-inner">';
	$html .= $content;
	$html .= '</div> </div> </div>';
	return $html;
}
