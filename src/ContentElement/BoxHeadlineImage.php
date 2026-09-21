<?php

/*
 * This file is part of [mindbird/contao-ce-box].
 *
 * (c) mindbird
 *
 * @license LGPL-3.0-or-later
 */

namespace Mindbird\Contao\CEBox\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Image\Studio\Studio;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\PageModel;
use Contao\StringUtil;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(type: BoxHeadlineImage::TYPE, category: 'boxes')]
class BoxHeadlineImage extends AbstractContentElementController
{
    public const string TYPE = 'box_headline_image';

    public function __construct(private readonly Studio $studio)
    {
    }

    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {
        $arrHeadline = StringUtil::deserialize($model->headline);
        $template->headline = \is_array($arrHeadline) ? $arrHeadline['value'] : $arrHeadline;
        $template->hl = \is_array($arrHeadline) ? $arrHeadline['unit'] : 'h1';
        $template->text = $model->box_text;
        $template->slogan = $model->slogan;

        $figure = $this->studio
            ->createFigureBuilder()
            ->fromUuid($model->singleSRC ?: '')
            ->setSize($model->size)
            ->setOverwriteMetadata($model->getOverwriteMetadata())
            ->buildIfResourceExists()
        ;

        if ($figure !== null) {
            $figure->applyLegacyTemplateData($template);
        }

        $page = PageModel::findByPk($model->jumpTo);
        if ($page !== null) {
            $template->link = $page->getFrontendUrl();
        } elseif ($model->url !== '') {
            $template->link = $model->url;
        } else {
            $template->link = '';
        }

        $template->linkText = $model->link_text;

        return $template->getResponse();
    }
}
