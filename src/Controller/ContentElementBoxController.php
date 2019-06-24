<?php

namespace Mindbird\Contao\CEBox\Controller;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\FilesModel;
use Contao\StringUtil;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentElementBoxController extends AbstractContentElementController
{
    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {
        $template->headline = $model->headline;
        $template->text = $model->text;
        $template->slogan = $model->slogan;

        $file = FilesModel::findByPk($model->image);
        if ($file !== null) {
            Template::addImageToTemplate($template, [
                'singleSRC' => $file->path,
                'size' => StringUtil::deserialize($model->imgSize)
            ]);
        }
        return $template->getResponse();
    }
}
