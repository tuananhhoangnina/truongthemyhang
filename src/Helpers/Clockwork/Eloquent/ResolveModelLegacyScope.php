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

use Clockwork\DataSource\EloquentDataSource;

use Illuminate\Database\Eloquent\{Builder, Model, ScopeInterface};

class ResolveModelLegacyScope implements ScopeInterface
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

	public function remove(Builder $builder, Model $model)
	{
		// nothing to do here
	}
}
