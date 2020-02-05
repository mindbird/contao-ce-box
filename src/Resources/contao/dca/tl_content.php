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

$GLOBALS['TL_DCA']['tl_content']['fields']['box_text'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['box_text'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'textarea',
    'eval' => array('mandatory' => true, 'rte' => 'tinyMCE', 'helpwizard' => true, 'tl_class' => 'clr'),
    'explanation' => 'insertTags',
    'sql' => "mediumtext NULL"
];

$GLOBALS['TL_DCA']['tl_content']['palettes']['box'] = '{type_legend},type;{text_legend},headline,box_text,slogan,jumpTo,url,addImage;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['box_headline_image'] = '{type_legend},type;{text_legend},headline,jumpTo,url,addImage;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['box_headline_text'] = '{type_legend},type;{text_legend},headline,box_text,jumpTo,url;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
