<?php

namespace TomorrowIdeas\Plaid\Resources;

class Accounts extends AbstractResource
{
	/**
	 * Get all Accounts.
	 *
	 * @deprecated 1.1 Use list() method.
	 * @param string $access_token
	 * @return object
	 */
	public function getAccounts(string $access_token): object
	{
		return $this->list($access_token);
	}

	/**
	 * Get all Accounts.
	 *
	 * @param string $access_token
	 * @return object
	 */
	public function list(string $access_token): object
	{
		$params = [
			"access_token" => $access_token
		];

		return $this->sendRequest(
			"post",
			"accounts/get",
			$this->paramsWithClientCredentials($params)
		);
	}

	/**
	 * Get Account balance.
	 *
	 * @param string $access_token
	 * @param array<string,string> $options
	 * @return object
	 */
	public function getBalance(string $access_token, array $options = []): object
	{
		$params = [
			"access_token" => $access_token,
			"options" => (object) $options
		];

		return $this->sendRequest(
			"post",
			"accounts/balance/get",
			$this->paramsWithClientCredentials($params)
		);
	}

	/**
	 * Get Account identity information.
	 *
	 * @param string $access_token
	 * @return object
	 */
	public function getIdentity(string $access_token): object
	{
		$params = [
			"access_token" => $access_token
		];

		return $this->sendRequest(
			"post",
			"identity/get",
			$this->paramsWithClientCredentials($params)
		);
	}
}