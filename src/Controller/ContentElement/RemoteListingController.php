<?php

declare(strict_types=1);

namespace Fiedsch\RemoteListingBundle\Controller\ContentElement;

use Contao\BackendTemplate;
use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\ServiceAnnotation\ContentElement;
use Contao\Template;
use Doctrine\DBAL\Connection;
use Patchwork\Utf8;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RemoteListingController extends AbstractContentElementController
{
    protected Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @throws \Doctrine\DBAL\Exception
     * @throws \Doctrine\DBAL\Driver\Exception
     */
    protected function getResponse(Template $template, ContentModel $model, Request $request): ?Response
    {
        if (TL_MODE === 'BE') {
            $objTemplate = new BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '### ' . Utf8::strtoupper($GLOBALS['TL_LANG']['CTE']['remotelisting'][0]) . ' ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_content&amp;act=edit&amp;id=' . $this->id;

            return new Response($objTemplate->parse());
        }

        $template->remote_calendar_reader_url = $model->remote_calendar_reader_url;
        $template->remote_url_suffix = $model->remote_url_suffix;

        $template->records = $this->getRecords($model);

        return $template->getResponse();
    }

    protected function getRecords(ContentModel $model): array
    {
        $query = sprintf("SELECT %s FROM %s",
        $model->list_fields,
        $model->list_table
        );
        if ($model->list_where) {
            $query .= sprintf(' WHERE %s',
                $model->list_where
            );
        }
        if ($model->list_sort) {
            $query .= sprintf(' ORDER BY %s',
                $model->list_sort
            );
        }
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement->fetchAllAssociative();
    }
}
