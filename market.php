<?php
/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
$template = "market.xml";
$path="m.xml";

$dom_xml= new DomDocument();
$dom_xml->formatOutput = true;

/*$dom_xml->loadXML('<?xml version="1.0" encoding="UTF-8"?></');*/
$dl = $dom_xml->load($template);
if ( !$dl ) die('Error while parsing the document: ' . $template);

echo $dom_xml->save($path);

//echo $dom_xml->save($path);