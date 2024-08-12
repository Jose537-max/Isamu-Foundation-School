<?php
$copyright = bantec_option('footer_copyright');

$bantec_htmls = array(
	'a'      => array(
		'href'   => array(),
		'target' => array()
	),
	'strong' => array(),
	'small'  => array(),
	'span'   => array(),
	'p'      => array(),
);
?>

<div class="copyright__area t-center">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<?php echo wp_kses($copyright, $bantec_htmls); ?>
			</div>
		</div>
	</div>
</div>