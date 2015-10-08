<?php
namespace Concrete\Package\MarkdownConverter;

use Package;
use BlockType;

include(__DIR__ . '/vendor/autoload.php');

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package
{
    protected $pkgHandle = 'markdown_converter';
    protected $appVersionRequired = '5.7.3.1';
    protected $pkgVersion = '0.0.1';

    public function getPackageName()
    {
        return t("Markdown Converter");
    }

    public function getPackageDescription()
    {
        return t("This package adds a new block type which can be used on any page and filled with markdown text that will be converted to HTML.");
    }

    public function install()
    {
        $pkg = parent::install();

        $bt = BlockType::getByHandle('markdown_converter');
        if (!is_object($bt)) {
            BlockType::installBlockType('markdown_converter', $pkg);
        }
    }
}
