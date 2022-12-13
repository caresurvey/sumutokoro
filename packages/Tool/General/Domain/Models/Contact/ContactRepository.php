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
     * @param bool $isAdmin
     * @return Contact
     */
    public function makeContact(array $data, bool $isAdmin): Contact;

    /**
     * @param Contact $contact
     * @return SendGridContact
     */
    public function makeSendGridContact(Contact $contact): SendGridContact;

    /**
     * @param array $request
     * @return CheckMode
     */
    public function makeCheckMode(array $request): CheckMode;
}
