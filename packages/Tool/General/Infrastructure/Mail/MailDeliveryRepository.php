<?php

namespace Tool\General\Infrastructure\Mail;

use Tool\General\Domain\Models\Delivery\DeliveryRepository;
use Tool\General\Domain\Models\Delivery\Mail\AdminMail;
use Tool\General\Domain\Models\Delivery\Mail\PasswordResetOrderMail;

class MailDeliveryRepository implements DeliveryRepository
{
    /**
     * @param array $request
     * @return AdminMail
     */
    public function createDeliverForAdmin(array $request): AdminMail
    {
        return new AdminMail($request);
    }

    public function createDeliverForPasswordResetOrderMail(array $request): PasswordResetOrderMail
    {
        return new PasswordResetOrderMail($request);
    }
}
