<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;

Breadcrumbs::for(
    'admin.suggestions.index',
    fn (Trail $trail): Trail => $trail->push('Peserta')
);
