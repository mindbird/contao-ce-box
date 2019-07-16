<?php

$GLOBALS['TL_DCA']['tl_content']['fields']['slogan'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['slogan'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => array('maxlength' => 255, 'tl_class' => 'clr'),
    'sql' => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['jumpTo'] = [
        'label' => &$GLOBALS['TL_LANG']['tl_content']['jumpTo'],
        'exclude' => true,
        'inputType' => 'pageTree',
        'foreignKey' => 'tl_page.title',
        'eval' => ['fieldType' => 'radio', 'tl_class' => 'clr'],
        'sql' => "int(10) unsigned NOT NULL default 0",
        'relation' => ['type' => 'hasOne', 'load' => 'lazy']
    ];

$GLOBALS['TL_DCA']['tl_content']['fields']['text']['eval']['mandatory'] = false;

$GLOBALS['TL_DCA']['tl_content']['palettes']['box'] = '{type_legend},type,headline;{text_legend},text,slogan,jumpTo;{image_legend},addImage;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
