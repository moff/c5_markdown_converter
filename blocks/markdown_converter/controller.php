<?php
namespace Concrete\Package\MarkdownConverter\Block\MarkdownConverter;

use Parsedown;
use Concrete\Core\Block\BlockController;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends BlockController
{

    protected $btTable = 'btMarkdownConverter';
    protected $btInterfaceWidth = "350";
    protected $btInterfaceHeight = "240";
    protected $btDefaultSet = 'basic';

    public function getBlockTypeName()
    {
        return t('Markdown Converter');
    }

    public function getBlockTypeDescription()
    {
        return t('This block converts markdown to html.');
    }

    public function save($data)
    {
        $parser = new Parsedown();
        $data['html'] = $parser->text($data['text']);

        parent::save($data);
    }

}
