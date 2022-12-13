<?php

namespace Tool\General\Domain\Models\Register;

interface RegisterRepository
{
    public function store(array $request): bool;

    /**
     * @param array $data
     * @param bool $isAdmin
     * @return Register
     */
    public function makeRegister(array $data, bool $isAdmin): Register;

    /**
     * @param Register $register
     * @return SendGridRegister
     */
    public function makeSendGridRegister(Register $register): SendGridRegister;

    /**
     * @param array $request
     * @return CheckMode
     */
    public function makeCheckMode(array $request): CheckMode;
}
