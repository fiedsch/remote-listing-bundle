<?php

$GLOBALS['TL_DCA']['tl_content']['palettes']['remotelisting'] = '{type_legend},type;{config_legend},list_table,list_fields,list_where,list_sort;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{remote_server_legend},remote_calendar_reader_url,remote_url_suffix';

$GLOBALS['TL_DCA']['tl_content']['fields']['list_table'] = [
    'exclude'                 => true,
    'inputType'               => 'text', // 'select'
    //'options_callback'        => array('tl_content_listing', 'getAllTables'),
    'eval'                    => array('chosen'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(64) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['list_fields'] = [
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>true, 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['list_where'] = [
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('preserveTags'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['list_sort'] = [
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
];
