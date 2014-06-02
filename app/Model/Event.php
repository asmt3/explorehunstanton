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

		// + 7 days from now
		$nextWeek = clone $thisMorning;
		$nextWeek->modify("+8 days");

		$events = $this->find("all", array(
			'conditions' => array(
				'start >' => $thisMorning->format('Y-m-d H:i:s'),
				'start <=' => $nextWeek->format('Y-m-d H:i:s'),
			),
			'order' => array('start ASC')
		));

		return $events;
	}

}
