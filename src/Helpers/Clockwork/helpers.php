<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


if (! function_exists('clock')) {
	// Log a message to Clockwork, returns Clockwork instance when called with no arguments, first argument otherwise
	function clock(...$arguments)
	{
		if (empty($arguments)) {
			return app('clockwork');
		}

		foreach ($arguments as $argument) {
			app('clockwork')->debug($argument);
		}

		return reset($arguments);
	}
}
