<?php
namespace Drupal\importjson\Controller;
use Drupal\Core\Controller\ControllerBase;
use \Drupal\node\Entity\Node;
/**
 * Importa JSON
 */

class MainController extends ControllerBase {

	public function test() {
		$uri = "http://167.249.9.43:1880/RADA/ServicioExternoSIDARH.asmx/Normativa";
		try {
		    $response = \Drupal::httpClient()->get($uri, array('headers' => array('Accept' => 'text/plain')));
		    $data = (string) $response->getBody();

		  }
		  catch (RequestException $e) {
		    echo "error";
		  }

		  $datos = json_decode($data, true);

		  foreach ($datos as $key => $item) {
			// Create node object with attached file.
			$node = Node::create([
				'type' => 'article',
				'title' => $item['Tit'],
				'description' => $item['Mat'],
			]);
			$node->save();
		  }


		return [
	      '#type' => 'markup',
	      '#markup' =>'datos importados :'.count($datos)
	    ];
	}
}





