<?php

namespace App\Http\Controllers\Admin;
use App\Base\Controllers\AdminController;
use App\Models\Regina;
use Illuminate\Http\Request;

class ReginaController extends AdminController {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}