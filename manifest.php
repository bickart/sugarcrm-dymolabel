<?php
/**
 * Copyright 2013 NEPO Systems, LLC
 *
 * User   : Jeff Bickart
 * Email  : jeff@neposystems.com
 * Twitter: @bickart
 * Date   : February 04, 2013
 *
 */

$manifest = array(
    'acceptable_sugar_versions' =>
    array(
        'exact_matches' =>
        array(),
        'regex_matches' =>
        array(
            2 => '6.5.[01]?',
            3 => '6.6.[01]?',
            4 => '6.7.[01]?',
            5 => '6.8.[01]?',
            6 => '6.9.[01]?',
            7 => '7.0.[01]?',
        ),
    ),
    'acceptable_sugar_flavors' =>
    array(
        'CE', 'PRO', 'ENT', 'CORP', 'ULT'
    ),
    'readme' => '',
    'key' => '',
    'author' => 'NEPO Systems LLC',
    'description' => 'DYMO label printing added to Contacts',
    'icon' => '',
    'name' => 'DYMO Label Printing',
    'published_date' => 'Feb 05, 2013 6:00:00 PM EST',
    'type' => 'module',
    'version' => '1.0.0',
    'remove_tables' => 'false',
    'is_uninstallable' => 'true',
);
$installdefs = array(
    'id' => 'DYMO',
    'language' =>
    array(
        array(
            'from' => '<basepath>/SugarModules/modules/Contacts/Ext/Language/en_us.lang.php',
            'to_module' => 'Contacts',
            'language' => 'en_us',
        ),
        array(
            'from' => '<basepath>/SugarModules/modules/Leads/Ext/Language/en_us.lang.php',
            'to_module' => 'Leads',
            'language' => 'en_us',
        ),
        array(
            'from' => '<basepath>/SugarModules/modules/Schedulers/Ext/Language/en_us.lang.php',
            'to_module' => 'Schedulers',
            'language' => 'en_us',
        ),
        array(
            'from' => '<basepath>/SugarModules/application/Ext/Language/en_us.modules.php',
            'to_module' => 'application',
            'language' => 'en_us',
        ),
        array(
            'from' => '<basepath>/SugarModules/modules/Administration/Ext/Language/en_us.lang.php',
            'to_module' => 'Administration',
            'language' => 'en_us'
        ),
        array(
            'from' => '<basepath>/SugarModules/modules/Opportunities/Ext/Language/en_us.lang.php',
            'to_module' => 'Opportunities',
            'language' => 'en_us',
        ),
        array(
            'from' => '<basepath>/SugarModules/modules/WorkFlowActionShells/Ext/Language/en_us.lang.php',
            'to_module' => 'WorkFlowActionShells',
            'language' => 'en_us',
        ),
    ),
    'custom_fields' => array(),
    'copy' => array(),
    'connectors' => array(),
    'logic_hooks' => array(),
    'relationships' => array(),
    'beans' => array(),
    'image_dir' => '<basepath>/images'
);