<?php

namespace Tool\General\Domain\Models\Delivery;

use Tool\General\Domain\Models\Delivery\Mail\AdminMail;
use Tool\General\Domain\Models\Delivery\Mail\PasswordResetOrderMail;

/**
 *
 */
interface DeliveryRepository
{
    /**
     * @return AdminMail
     */
    public function createDeliverForAdmin(array $request): AdminMail;

    public function createDeliverForPasswordResetOrderMail(array $request): PasswordResetOrderMail;
}
