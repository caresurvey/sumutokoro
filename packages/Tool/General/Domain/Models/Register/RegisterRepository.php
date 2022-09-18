<?php

namespace Tool\General\Domain\Models\Register;

interface RegisterRepository
{
    public function store(array $request): bool;

    public function makeMailRegisterForAdmin(array $data): MailRegisterForAdmin;

    public function makeMailRegisterForCustomer(array $data): MailRegisterForCustomer;

    public function makeSendRegister(): SendRegister;

    public function makeCheckMode(array $request): CheckMode;
}
