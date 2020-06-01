<?php

/*
 * This file is part of [mindbird/contao-ce-box].
 *
 * (c) mindbird
 *
 * @license LGPL-3.0-or-later
 */

namespace Mindbird\Contao\CEBox\ContentElement;

use Contao\BackendTemplate;
use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BoxEnd extends AbstractContentElementController
{
    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {
        if (TL_MODE === 'BE') {
            $template = new BackendTemplate ('be_wildcard');
            $template->wildcard = '';
            $template->title = $model->headline;
            $template->id = $model->id;
            $template->link = $model->name;
            $template->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $model->id;
            return $template->getResponse();
        }

        return $template->getResponse();
    }
}
