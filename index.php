<?php // $Id$
// d'après ./report/question/
    require_once(dirname(__FILE__).'/../../config.php');
    require_once($CFG->libdir.'/adminlib.php');
    require_once($CFG->dirroot.'/report/benchmark/lib.php');

/// Get all required strings
    $baseUrl='/report/benchmark/';
    $reportCss=$baseUrl.'report_benchmark.css';
    $base_url=$CFG->wwwroot.$baseUrl;
    
    $strbenchmarks = get_string('modulenameplural', 'report_benchmark');
    $strbenchmark  = get_string('modulename', 'report_benchmark');

/***************************************
/// Get all the appropriate data
    $benchmark_benchmarks = benchmark_get_benchmark_benchmarks( NULL);


    $bgc0="#ffffee";
    $bgc1="#eeeedd";
    // Initialise the table.
    $table = new html_table();
    
    $table->head  = array (get_string('occurrences', 'report_benchmark'), get_string('instances', 'report_benchmark'));
    $table->align = array ("center", "left", "center");
    $table->width = "100%";
    $table->size = array('20%', '70%');
    $instance_head  = '<table cellspacing="1" cellpadding="2" bgcolor="#333300" width="100%">'.
'<tr valign="top" bgcolor="#cccccc"><th width="30%">'.get_string('instance', 'report_benchmark').'</th><th width="40%">'.get_string('description', 'report_benchmark').'</th><th width="10%">'.get_string('users_actifs','benchmark').'</th><th width="10%">'.get_string('activites_declarees','benchmark').'</th><th width="10%">'.get_string('course').'</th><th width="10%">'.get_string('archives', 'benchmark').'</th></tr>'."\n";

*****/

// Print the header & check permissions.
    $url = new moodle_url($base_url.'index.php');
    admin_externalpage_setup('reportbenchmark');
    $PAGE->set_url($url);
    $PAGE->requires->css("//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css");
    $PAGE->requires->css($reportCss);
    echo $OUTPUT->header();
    echo $OUTPUT->heading(get_string('adminreport', 'report_benchmark'));

    $msg = '';
    // Version du module
    $s_version='';
	if (!empty($module->release)) {
        $s_version.= $module->release;
   	}

	if (!empty($module->version)){
		// 2009042600;  // The current module version (Date: YYYYMMDDXX)
		$s_version.= ' ('.get_string('release','report_benchmark').' '.$module->version.')'."\n";
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
