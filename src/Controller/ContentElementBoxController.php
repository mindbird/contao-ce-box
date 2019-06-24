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
        $template->picture = $model->picture;

        $file = FilesModel::findByPk($model->image);
        if ($file !== null) {
            Template::addImageToTemplate($template, [
                'singleSRC' => $file->path,
                'size' => StringUtil::deserialize($this->imgSize)
            ]);
        }
        return $template->getResponse();
    }
}
