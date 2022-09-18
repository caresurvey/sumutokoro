<?php

namespace Tool\General\Domain\Models\Contact;

interface ContactRepository
{
    /**
     * @param array $request
     * @return bool
     */
    public function store(array $request): bool;

    /**
     * @param array $data
     * @return MailContactForAdmin
     */
    public function makeMailContactForAdmin(array $data): MailContactForAdmin;

    /**
     * @param array $data
     * @return MailContactForCustomer
     */
    public function makeMailContactForCustomer(array $data): MailContactForCustomer;

    /**
     * @return SendContact
     */
    public function makeSendContact(): SendContact;

    /**
     * @param array $request
     * @return CheckMode
     */
    public function makeCheckMode(array $request): CheckMode;
}
