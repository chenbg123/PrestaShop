<?php
/**
 * 2007-2018 PrestaShop.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

namespace PrestaShop\PrestaShop\Core\Domain\Customer\ValueObject;

use PrestaShop\PrestaShop\Core\Domain\Customer\Exception\InvalidCustomerIdException;

/**
 * Class CustomerId.
 */
class CustomerId
{
    /**
     * @var int
     */
    private $customerId;

    /**
     * @param $customerId
     */
    public function __construct($customerId)
    {
        $this->setCustomerId($customerId);
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId
     */
    private function setCustomerId($customerId)
    {
        if (!is_numeric($customerId) || 0 > $customerId) {
            throw new InvalidCustomerIdException(sprintf(
                'Invalid Customer id value %s supplied. Customer id should be positive integer.',
                var_export($customerId, true)
            ));
        }

        $this->customerId = $customerId;
    }
}
