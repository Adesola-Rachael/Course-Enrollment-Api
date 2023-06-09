<?php
namespace App\Interfaces;

interface StatusCode
{
    const OK = 200;
    const CREATED = 201;
    const VALIDATION = 422;
    const UNAUTHORIZED = 401;
    const BAD_REQUEST = 400;
}