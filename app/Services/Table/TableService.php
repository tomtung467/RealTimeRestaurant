<?php
namespace App\Services\Table;

use App\Services\BaseService;
use App\Repositories\Table\ITableRepository;
class TableService extends BaseService implements ITableService
{
    //
    protected $tableRepository;
    public function __construct(ITableRepository $tableRepository)
    {
        parent::__construct($tableRepository);
        $this->tableRepository = $tableRepository;
    }
}
