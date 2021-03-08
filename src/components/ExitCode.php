<?php
/**
 * Created by PhpStorm.
 * User: chana
 * Date: 1/13/2021
 * Time: 10:41 PM
 */

namespace app\components;


class ExitCode {

	const Success = 0;
	const INVALID_REQUEST = 1000;
	const INVALID_CREDENTIALS = 1001;

	const DATA_SAVE_FAILED = 2000;

	const HTTP_BAD_REQUEST = 400;

}