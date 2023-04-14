<?php
	$rdata = array_map('to_utf8', array_map('safe_html', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('safe_html', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'historico_vt';

		/* data for selected record, or defaults if none is selected */
		var data = {
			VcrIdSerP: <?php echo json_encode(['id' => $rdata['VcrIdSerP'], 'value' => $rdata['VcrIdSerP'], 'text' => $jdata['VcrIdSerP']]); ?>,
			VcrIdSol: <?php echo json_encode(['id' => $rdata['VcrIdSol'], 'value' => $rdata['VcrIdSol'], 'text' => $jdata['VcrIdSol']]); ?>,
			VcrIdRie: <?php echo json_encode(['id' => $rdata['VcrIdRie'], 'value' => $rdata['VcrIdRie'], 'text' => $jdata['VcrIdRie']]); ?>,
			VcrIdBarVe: <?php echo json_encode(['id' => $rdata['VcrIdBarVe'], 'value' => $rdata['VcrIdBarVe'], 'text' => $jdata['VcrIdBarVe']]); ?>,
			VcrIdCom: <?php echo json_encode(['id' => $rdata['VcrIdCom'], 'value' => $rdata['VcrIdCom'], 'text' => $jdata['VcrIdCom']]); ?>,
			VcrIdCorr: <?php echo json_encode(['id' => $rdata['VcrIdCorr'], 'value' => $rdata['VcrIdCorr'], 'text' => $jdata['VcrIdCorr']]); ?>,
			VcrIdMot: <?php echo json_encode(['id' => $rdata['VcrIdMot'], 'value' => $rdata['VcrIdMot'], 'text' => $jdata['VcrIdMot']]); ?>,
			VcrIdFen: <?php echo json_encode(['id' => $rdata['VcrIdFen'], 'value' => $rdata['VcrIdFen'], 'text' => $jdata['VcrIdFen']]); ?>,
			VcrIdCar: <?php echo json_encode(['id' => $rdata['VcrIdCar'], 'value' => $rdata['VcrIdCar'], 'text' => $jdata['VcrIdCar']]); ?>,
			VcrIdTra1: <?php echo json_encode(['id' => $rdata['VcrIdTra1'], 'value' => $rdata['VcrIdTra1'], 'text' => $jdata['VcrIdTra1']]); ?>,
			VcrIdTra2: <?php echo json_encode(['id' => $rdata['VcrIdTra2'], 'value' => $rdata['VcrIdTra2'], 'text' => $jdata['VcrIdTra2']]); ?>,
			VcrIdTra3: <?php echo json_encode(['id' => $rdata['VcrIdTra3'], 'value' => $rdata['VcrIdTra3'], 'text' => $jdata['VcrIdTra3']]); ?>,
			VcrIdTra4: <?php echo json_encode(['id' => $rdata['VcrIdTra4'], 'value' => $rdata['VcrIdTra4'], 'text' => $jdata['VcrIdTra4']]); ?>,
			VcrIdTra5: <?php echo json_encode(['id' => $rdata['VcrIdTra5'], 'value' => $rdata['VcrIdTra5'], 'text' => $jdata['VcrIdTra5']]); ?>,
			VcrIdTra6: <?php echo json_encode(['id' => $rdata['VcrIdTra6'], 'value' => $rdata['VcrIdTra6'], 'text' => $jdata['VcrIdTra6']]); ?>,
			VcrIdTra7: <?php echo json_encode(['id' => $rdata['VcrIdTra7'], 'value' => $rdata['VcrIdTra7'], 'text' => $jdata['VcrIdTra7']]); ?>,
			VcrIdTra8: <?php echo json_encode(['id' => $rdata['VcrIdTra8'], 'value' => $rdata['VcrIdTra8'], 'text' => $jdata['VcrIdTra8']]); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for VcrIdSerP */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'VcrIdSerP' && d.id == data.VcrIdSerP.id)
				return { results: [ data.VcrIdSerP ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for VcrIdSol */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'VcrIdSol' && d.id == data.VcrIdSol.id)
				return { results: [ data.VcrIdSol ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for VcrIdRie */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'VcrIdRie' && d.id == data.VcrIdRie.id)
				return { results: [ data.VcrIdRie ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for VcrIdBarVe */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'VcrIdBarVe' && d.id == data.VcrIdBarVe.id)
				return { results: [ data.VcrIdBarVe ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for VcrIdCom */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'VcrIdCom' && d.id == data.VcrIdCom.id)
				return { results: [ data.VcrIdCom ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for VcrIdCorr */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'VcrIdCorr' && d.id == data.VcrIdCorr.id)
				return { results: [ data.VcrIdCorr ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for VcrIdMot */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'VcrIdMot' && d.id == data.VcrIdMot.id)
				return { results: [ data.VcrIdMot ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for VcrIdFen */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'VcrIdFen' && d.id == data.VcrIdFen.id)
				return { results: [ data.VcrIdFen ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for VcrIdCar */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'VcrIdCar' && d.id == data.VcrIdCar.id)
				return { results: [ data.VcrIdCar ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for VcrIdTra1 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'VcrIdTra1' && d.id == data.VcrIdTra1.id)
				return { results: [ data.VcrIdTra1 ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for VcrIdTra2 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'VcrIdTra2' && d.id == data.VcrIdTra2.id)
				return { results: [ data.VcrIdTra2 ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for VcrIdTra3 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'VcrIdTra3' && d.id == data.VcrIdTra3.id)
				return { results: [ data.VcrIdTra3 ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for VcrIdTra4 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'VcrIdTra4' && d.id == data.VcrIdTra4.id)
				return { results: [ data.VcrIdTra4 ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for VcrIdTra5 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'VcrIdTra5' && d.id == data.VcrIdTra5.id)
				return { results: [ data.VcrIdTra5 ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for VcrIdTra6 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'VcrIdTra6' && d.id == data.VcrIdTra6.id)
				return { results: [ data.VcrIdTra6 ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for VcrIdTra7 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'VcrIdTra7' && d.id == data.VcrIdTra7.id)
				return { results: [ data.VcrIdTra7 ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for VcrIdTra8 */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'VcrIdTra8' && d.id == data.VcrIdTra8.id)
				return { results: [ data.VcrIdTra8 ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

