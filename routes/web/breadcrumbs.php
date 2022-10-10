<?php

use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;

Breadcrumbs::for(
    'admin.setting.index',
    fn (Trail $trail): Trail => $trail->push('Pengaturan')
);

Breadcrumbs::for(
    'admin.suggestions.index',
    fn (Trail $trail): Trail => $trail->push('Masukan')
);
