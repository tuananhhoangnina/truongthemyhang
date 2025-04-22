<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */
 namespace NINACORE\Helpers\Clockwork\Eloquent;

use NINACORE\DatabaseCore\Eloquent\Builder;
use NINACORE\DatabaseCore\Eloquent\Model;
use NINACORE\DatabaseCore\Eloquent\Scope;
use NINACORE\Helpers\Clockwork\Datasource\EloquentDataSource;

class ResolveModelScope implements Scope
{
	protected $dataSource;

	public function __construct(EloquentDataSource $dataSource)
	{
		$this->dataSource = $dataSource;
	}

	public function apply(Builder $builder, Model $model)
	{
		$this->dataSource->nextQueryModel = get_class($model);
	}
}
