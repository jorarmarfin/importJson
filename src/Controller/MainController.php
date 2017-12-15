<?php
namespace Drupal\importjson\Controller;
use Drupal\Core\Controller\ControllerBase;
/**
 * Importa JSON
 */

class MainController extends ControllerBase {

	public function test() {
		return array(
			'#markup' => t('hola'),
		);
	}
}



