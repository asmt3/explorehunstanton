<?php
App::uses('AppModel', 'Model');
/**
 * Sponsorhit Model
 *
 * @property Sponsor $Sponsor
 */
class Sponsorhit extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'sponsorhit';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Sponsor' => array(
			'className' => 'Sponsor',
			'foreignKey' => 'sponsor_id',
		)
	);

	function recordHit($sponsor_id) {
		$data = compact('sponsor_id');
		$this->create($data);
		return $this->save();
	}

	function getLastSponsorId() {
		$sponsorhit = $this->find(
			'first', 
			array(
				'order' => 'Sponsorhit.created DESC'
			)
		);

		return $sponsorhit['Sponsorhit']['sponsor_id'];
	}
}
