<?php
App::uses('AppModel', 'Model');
/**
 * Sponsor Model
 *
 */
class Sponsor extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	public $hasMany = array('Sponsorhit');


	function getSponsorOnRotation() {


		$sponsor_id = $this->Sponsorhit->getLastSponsorId();

		$sponsor = $this->find('first', array(
			'conditions' => array(
				'id >' => $sponsor_id
			),
			'order' => 'Sponsor.id ASC'
			
		));

		if (!$sponsor) {
			// get first
			$sponsor = $this->find('first', array(
				'order' => 'Sponsor.id ASC'
			));
		}


		$this->Sponsorhit->recordHit($sponsor['Sponsor']['id']);

		return $sponsor;
	}

}
