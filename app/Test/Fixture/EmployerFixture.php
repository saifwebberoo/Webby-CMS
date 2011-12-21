<?php
/* Employer Fixture generated on: 2011-09-11 09:53:50 : 1315715030 */

/**
 * EmployerFixture
 *
 */
class EmployerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'profile' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'short_profile' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'logo' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'website' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'email' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'key_contact_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'key_contact_mobile' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'key_contact_position' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'address_1' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'address_2' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'district_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5, 'collate' => NULL, 'comment' => ''),
		'state_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5, 'collate' => NULL, 'comment' => ''),
		'country_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5, 'collate' => NULL, 'comment' => ''),
		'postcode' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'latitude' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'longitude' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'client_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'client_id' => array('column' => 'client_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'profile' => 'Lorem ipsum dolor sit amet',
			'short_profile' => 'Lorem ipsum dolor sit amet',
			'logo' => 'Lorem ipsum dolor sit amet',
			'website' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'key_contact_name' => 'Lorem ipsum dolor sit amet',
			'key_contact_mobile' => 'Lorem ipsum dolor sit amet',
			'key_contact_position' => 'Lorem ipsum dolor sit amet',
			'address_1' => 'Lorem ipsum dolor sit amet',
			'address_2' => 'Lorem ipsum dolor sit amet',
			'district_id' => 1,
			'state_id' => 1,
			'country_id' => 1,
			'postcode' => 'Lorem ip',
			'created' => '2011-09-11 09:53:50',
			'modified' => '2011-09-11 09:53:50',
			'latitude' => 'Lorem ipsum dolor sit amet',
			'longitude' => 'Lorem ipsum dolor sit amet',
			'client_id' => 1
		),
	);
}
