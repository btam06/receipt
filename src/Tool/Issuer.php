<?php
namespace btam06\Receipt;

use btam06\Receipt\Receiptable;

/**
 * 
 */
class Issuer
{
	/**
	 * 
	 */
	static protected $state = NULL;

	/**
	 * List of objects to call logReceiptTransactionEvent
	 */
	static protected $registeredObjects = [];

	/**
	 * Register a receiptable object to bubble events to
	 */
	static public function register(Receiptable $object)
	{	
		self::$registeredObjects[] = $object;
	}

	/**
	 * Issue a state change event
	 */
	static public function issue($state)
	{
		self::$state = $state;
		foreach (self::$registeredObjects as $object) {
			$object->logReceiptTransactionEvent($state);
		}
	}

	/**
	 * Clear all receipts
	 */
	static public function clear()
	{
		self::$state = NULL;
		foreach (self::$registeredObjects as $object) {
			$object->clearReceiptTransaction();
		}
	}
}