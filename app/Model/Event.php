<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 */
class Event extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


	function getUpcoming() {


		// this Morning
		$thisMorning = new Datetime();
		$thisMorning->setTime(0,0,0);

		// + 1 month from now
		$nextMonth = clone $thisMorning;
		$nextMonth->modify("+1 month");

		$events = $this->find("all", array(
			'conditions' => array(
				'start >' => $thisMorning->format('Y-m-d H:i:s'),
				'start <=' => $nextMonth->format('Y-m-d H:i:s'),
				'approved' => true,
			),
			'order' => array('start ASC')
		));

		return $events;
	}

}
