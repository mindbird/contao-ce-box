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
use Contao\FilesModel;
use Contao\PageModel;
use Contao\StringUtil;
use Contao\Template;
use function is_array;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Box extends AbstractContentElementController
{
    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {
        $arrHeadline = StringUtil::deserialize($model->headline);
        $template->headline = is_array($arrHeadline) ? $arrHeadline['value'] : $arrHeadline;
        $template->hl = is_array($arrHeadline) ? $arrHeadline['unit'] : 'h1';
        $template->text = $model->box_text;
        $template->slogan = $model->slogan;

        $file = FilesModel::findByPk($model->singleSRC);
        if ($file !== null) {
            Template::addImageToTemplate(
                $template,
                [
                    'singleSRC' => $file->path,
                    'size' => $model->size,
                ],
                null,
                null,
                $file
            );
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
