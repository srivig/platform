<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Ushahidi Webhook Validator
 *
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi\Application
 * @copyright  2014 Ushahidi
 * @license    https://www.gnu.org/licenses/agpl-3.0.html GNU Affero General Public License Version 3 (AGPL3)
 */

use Ushahidi\Core\Tool\Validator;
use Ushahidi\Core\Entity\UserRepository;
use Ushahidi\Core\Entity\SetRepository;

class Ushahidi_Validator_Webhook_Update extends Validator
{
	protected $user_repo;
	protected $default_error_source = 'webhook';

	public function __construct(UserRepository $user_repo)
	{
		$this->user_repo = $user_repo;
	}

	protected function getRules()
	{
		return [
			'id' => [
				['numeric'],
			],
			'user_id' => [
				['numeric'],
				[[$this->user_repo, 'exists'], [':value']],
			],
			'shared_secret' => [
				['not_empty']
			],
			'url' => [
				['not_empty']
			],
			'event_type' => [
				['not_empty']
			],
			'entity_type' => [
				['not_empty']
			]
		];
	}
}
