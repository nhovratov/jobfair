<?php

declare(strict_types=1);

namespace Dan\Jobfair\PageTitle;

use TYPO3\CMS\Core\PageTitle\AbstractPageTitleProvider;

final class JobPageTitleProvider extends AbstractPageTitleProvider
{
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
