<?php
namespace btam06\Receipt;

interface Receiptable {
	/**
	 * Update the model's transaction state
	 */
	public function logReceiptTransactionEvent($state);

	/**
	 * Clear model's transaction receipt
	 */
	public function clearReceiptTransaction();
}