<?php

namespace Tool\General\Domain\Models\ForgotPassword;

interface ForgotPasswordRepository
{
    /**
     * @param string $email
     * @return string
     */
    public function makeToken(string $email): string;

    /**
     * @param string $email
     * @param string $token
     * @return bool
     */
    public function store(string $email, string $token): bool;

    /**
     * @param string $email
     * @param string $token
     * @return ForgotPassword
     */
    public function makeForgotPassword(string $email, string $token): ForgotPassword;

    /**
     * @param array $data
     * @return SendGridForgotPassword
     */
    public function makeSendGridForgotPassword(ForgotPassword $forgotPassword): SendGridForgotPassword;

    /**
     * @param array $request
     * @return CheckMode
     */
    public function makeCheckMode(array $request): CheckMode;
}
