<?php // $Id$
// d'après ./report/question/
    require_once(dirname(__FILE__).'/../../config.php');
    require_once($CFG->libdir.'/adminlib.php');
    require_once($CFG->dirroot.'/report/benchmark/lib.php');
    require_once($CFG->dirroot.'/report/benchmark/version.php');

/// Get all required strings
    $baseUrl='/report/benchmark/';
    $reportCss=$baseUrl.'report_benchmark.css';
    $bootstrapCss=$baseUrl.'bootstrap.css';
    $base_url=$CFG->wwwroot.$baseUrl;
    
    $strbenchmarks = get_string('modulenameplural', 'report_benchmark');
    $strbenchmark  = get_string('modulename', 'report_benchmark');


// Print the header & check permissions.
    $url = new moodle_url($base_url.'index.php');
    admin_externalpage_setup('reportbenchmark');
    $PAGE->set_url($url);
    $PAGE->requires->css($bootstrapCss);
    $PAGE->requires->css($reportCss);
    echo $OUTPUT->header();
    echo $OUTPUT->heading(get_string('adminreport', 'report_benchmark'));

    $msg = '';

    // Version du module
    $s_version='';

	if (!empty($plugin->release)) {
        $s_version.= $plugin->release;
   	}

	if (!empty($plugin->version)){
		// 2009042600;  // The current module version (Date: YYYYMMDDXX)
		$s_version.= ' ('.get_string('release','report_benchmark').' '.$plugin->version.')'."\n";
	}

	if ($s_version!=''){
	   $msg.= get_string('version', 'report_benchmark').'<br /><i>'.$s_version.'</i>'."\n";
	}


    if ($msg) {
        echo $OUTPUT->box_start('generalbox boxwidthwide boxaligncenter centerpara');
        echo $msg;
		echo $OUTPUT->box_end();
    }
	/*******************
    // Print it.
    echo html_writer::table($table);
	************/

	$Bench = new BenchMark();


    // Footer.

    echo $OUTPUT->footer();

?>
