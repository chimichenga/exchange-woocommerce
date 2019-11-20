<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit37bdf721857f77fe1d7c44bd17b3a9e7c3540edbd68b1df48d0447c874511d41
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'AllsecureExchange\\Client\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'AllsecureExchange\\Client\\' => 
        array (
            0 => __DIR__ . '/../../..' . '/classes/client',
        ),
    );

    public static $classMap = array (
        'AllsecureExchange\\Client\\Callback\\ChargebackData' => __DIR__ . '/../../..' . '/classes/client/Callback/ChargebackData.php',
        'AllsecureExchange\\Client\\Callback\\ChargebackReversalData' => __DIR__ . '/../../..' . '/classes/client/Callback/ChargebackReversalData.php',
        'AllsecureExchange\\Client\\Callback\\Result' => __DIR__ . '/../../..' . '/classes/client/Callback/Result.php',
        'AllsecureExchange\\Client\\Client' => __DIR__ . '/../../..' . '/classes/client/Client.php',
        'AllsecureExchange\\Client\\CustomerProfile\\CustomerData' => __DIR__ . '/../../..' . '/classes/client/CustomerProfile/CustomerData.php',
        'AllsecureExchange\\Client\\CustomerProfile\\DeleteProfileResponse' => __DIR__ . '/../../..' . '/classes/client/CustomerProfile/DeleteProfileResponse.php',
        'AllsecureExchange\\Client\\CustomerProfile\\GetProfileResponse' => __DIR__ . '/../../..' . '/classes/client/CustomerProfile/GetProfileResponse.php',
        'AllsecureExchange\\Client\\CustomerProfile\\PaymentData\\CardData' => __DIR__ . '/../../..' . '/classes/client/CustomerProfile/PaymentData/CardData.php',
        'AllsecureExchange\\Client\\CustomerProfile\\PaymentData\\IbanData' => __DIR__ . '/../../..' . '/classes/client/CustomerProfile/PaymentData/IbanData.php',
        'AllsecureExchange\\Client\\CustomerProfile\\PaymentData\\PaymentData' => __DIR__ . '/../../..' . '/classes/client/CustomerProfile/PaymentData/PaymentData.php',
        'AllsecureExchange\\Client\\CustomerProfile\\PaymentData\\WalletData' => __DIR__ . '/../../..' . '/classes/client/CustomerProfile/PaymentData/WalletData.php',
        'AllsecureExchange\\Client\\CustomerProfile\\PaymentInstrument' => __DIR__ . '/../../..' . '/classes/client/CustomerProfile/PaymentInstrument.php',
        'AllsecureExchange\\Client\\CustomerProfile\\UpdateProfileResponse' => __DIR__ . '/../../..' . '/classes/client/CustomerProfile/UpdateProfileResponse.php',
        'AllsecureExchange\\Client\\Data\\CreditCardCustomer' => __DIR__ . '/../../..' . '/classes/client/Data/CreditCardCustomer.php',
        'AllsecureExchange\\Client\\Data\\Customer' => __DIR__ . '/../../..' . '/classes/client/Data/Customer.php',
        'AllsecureExchange\\Client\\Data\\Data' => __DIR__ . '/../../..' . '/classes/client/Data/Data.php',
        'AllsecureExchange\\Client\\Data\\IbanCustomer' => __DIR__ . '/../../..' . '/classes/client/Data/IbanCustomer.php',
        'AllsecureExchange\\Client\\Data\\Item' => __DIR__ . '/../../..' . '/classes/client/Data/Item.php',
        'AllsecureExchange\\Client\\Data\\Request' => __DIR__ . '/../../..' . '/classes/client/Data/Request.php',
        'AllsecureExchange\\Client\\Data\\Result\\CreditcardData' => __DIR__ . '/../../..' . '/classes/client/Data/Result/CreditcardData.php',
        'AllsecureExchange\\Client\\Data\\Result\\IbanData' => __DIR__ . '/../../..' . '/classes/client/Data/Result/IbanData.php',
        'AllsecureExchange\\Client\\Data\\Result\\PhoneData' => __DIR__ . '/../../..' . '/classes/client/Data/Result/PhoneData.php',
        'AllsecureExchange\\Client\\Data\\Result\\ResultData' => __DIR__ . '/../../..' . '/classes/client/Data/Result/ResultData.php',
        'AllsecureExchange\\Client\\Data\\Result\\WalletData' => __DIR__ . '/../../..' . '/classes/client/Data/Result/WalletData.php',
        'AllsecureExchange\\Client\\Exception\\ClientException' => __DIR__ . '/../../..' . '/classes/client/Exception/ClientException.php',
        'AllsecureExchange\\Client\\Exception\\InvalidValueException' => __DIR__ . '/../../..' . '/classes/client/Exception/InvalidValueException.php',
        'AllsecureExchange\\Client\\Exception\\RateLimitException' => __DIR__ . '/../../..' . '/classes/client/Exception/RateLimitException.php',
        'AllsecureExchange\\Client\\Exception\\TimeoutException' => __DIR__ . '/../../..' . '/classes/client/Exception/TimeoutException.php',
        'AllsecureExchange\\Client\\Exception\\TypeException' => __DIR__ . '/../../..' . '/classes/client/Exception/TypeException.php',
        'AllsecureExchange\\Client\\Http\\ClientInterface' => __DIR__ . '/../../..' . '/classes/client/Http/ClientInterface.php',
        'AllsecureExchange\\Client\\Http\\CurlClient' => __DIR__ . '/../../..' . '/classes/client/Http/CurlClient.php',
        'AllsecureExchange\\Client\\Http\\CurlExec' => __DIR__ . '/../../..' . '/classes/client/Http/CurlExec.php',
        'AllsecureExchange\\Client\\Http\\Exception\\ClientException' => __DIR__ . '/../../..' . '/classes/client/Http/Exception/ClientException.php',
        'AllsecureExchange\\Client\\Http\\Exception\\ResponseException' => __DIR__ . '/../../..' . '/classes/client/Http/Exception/ResponseException.php',
        'AllsecureExchange\\Client\\Http\\Response' => __DIR__ . '/../../..' . '/classes/client/Http/Response.php',
        'AllsecureExchange\\Client\\Http\\ResponseInterface' => __DIR__ . '/../../..' . '/classes/client/Http/ResponseInterface.php',
        'AllsecureExchange\\Client\\Json\\DataObject' => __DIR__ . '/../../..' . '/classes/client/Json/DataObject.php',
        'AllsecureExchange\\Client\\Json\\ErrorResponse' => __DIR__ . '/../../..' . '/classes/client/Json/ErrorResponse.php',
        'AllsecureExchange\\Client\\Json\\ResponseObject' => __DIR__ . '/../../..' . '/classes/client/Json/ResponseObject.php',
        'AllsecureExchange\\Client\\Schedule\\ScheduleData' => __DIR__ . '/../../..' . '/classes/client/Schedule/ScheduleData.php',
        'AllsecureExchange\\Client\\Schedule\\ScheduleError' => __DIR__ . '/../../..' . '/classes/client/Schedule/ScheduleError.php',
        'AllsecureExchange\\Client\\Schedule\\ScheduleResult' => __DIR__ . '/../../..' . '/classes/client/Schedule/ScheduleResult.php',
        'AllsecureExchange\\Client\\StatusApi\\StatusRequestData' => __DIR__ . '/../../..' . '/classes/client/StatusApi/StatusRequestData.php',
        'AllsecureExchange\\Client\\StatusApi\\StatusResult' => __DIR__ . '/../../..' . '/classes/client/StatusApi/StatusResult.php',
        'AllsecureExchange\\Client\\Transaction\\Base\\AbstractTransaction' => __DIR__ . '/../../..' . '/classes/client/Transaction/Base/AbstractTransaction.php',
        'AllsecureExchange\\Client\\Transaction\\Base\\AbstractTransactionWithReference' => __DIR__ . '/../../..' . '/classes/client/Transaction/Base/AbstractTransactionWithReference.php',
        'AllsecureExchange\\Client\\Transaction\\Base\\AddToCustomerProfileInterface' => __DIR__ . '/../../..' . '/classes/client/Transaction/Base/AddToCustomerProfileInterface.php',
        'AllsecureExchange\\Client\\Transaction\\Base\\AddToCustomerProfileTrait' => __DIR__ . '/../../..' . '/classes/client/Transaction/Base/AddToCustomerProfileTrait.php',
        'AllsecureExchange\\Client\\Transaction\\Base\\AmountableInterface' => __DIR__ . '/../../..' . '/classes/client/Transaction/Base/AmountableInterface.php',
        'AllsecureExchange\\Client\\Transaction\\Base\\AmountableTrait' => __DIR__ . '/../../..' . '/classes/client/Transaction/Base/AmountableTrait.php',
        'AllsecureExchange\\Client\\Transaction\\Base\\ItemsInterface' => __DIR__ . '/../../..' . '/classes/client/Transaction/Base/ItemsInterface.php',
        'AllsecureExchange\\Client\\Transaction\\Base\\ItemsTrait' => __DIR__ . '/../../..' . '/classes/client/Transaction/Base/ItemsTrait.php',
        'AllsecureExchange\\Client\\Transaction\\Base\\OffsiteInterface' => __DIR__ . '/../../..' . '/classes/client/Transaction/Base/OffsiteInterface.php',
        'AllsecureExchange\\Client\\Transaction\\Base\\OffsiteTrait' => __DIR__ . '/../../..' . '/classes/client/Transaction/Base/OffsiteTrait.php',
        'AllsecureExchange\\Client\\Transaction\\Base\\ScheduleInterface' => __DIR__ . '/../../..' . '/classes/client/Transaction/Base/ScheduleInterface.php',
        'AllsecureExchange\\Client\\Transaction\\Base\\ScheduleTrait' => __DIR__ . '/../../..' . '/classes/client/Transaction/Base/ScheduleTrait.php',
        'AllsecureExchange\\Client\\Transaction\\Capture' => __DIR__ . '/../../..' . '/classes/client/Transaction/Capture.php',
        'AllsecureExchange\\Client\\Transaction\\Debit' => __DIR__ . '/../../..' . '/classes/client/Transaction/Debit.php',
        'AllsecureExchange\\Client\\Transaction\\Deregister' => __DIR__ . '/../../..' . '/classes/client/Transaction/Deregister.php',
        'AllsecureExchange\\Client\\Transaction\\Error' => __DIR__ . '/../../..' . '/classes/client/Transaction/Error.php',
        'AllsecureExchange\\Client\\Transaction\\Payout' => __DIR__ . '/../../..' . '/classes/client/Transaction/Payout.php',
        'AllsecureExchange\\Client\\Transaction\\Preauthorize' => __DIR__ . '/../../..' . '/classes/client/Transaction/Preauthorize.php',
        'AllsecureExchange\\Client\\Transaction\\Refund' => __DIR__ . '/../../..' . '/classes/client/Transaction/Refund.php',
        'AllsecureExchange\\Client\\Transaction\\Register' => __DIR__ . '/../../..' . '/classes/client/Transaction/Register.php',
        'AllsecureExchange\\Client\\Transaction\\Result' => __DIR__ . '/../../..' . '/classes/client/Transaction/Result.php',
        'AllsecureExchange\\Client\\Transaction\\VoidTransaction' => __DIR__ . '/../../..' . '/classes/client/Transaction/VoidTransaction.php',
        'AllsecureExchange\\Client\\Xml\\Generator' => __DIR__ . '/../../..' . '/classes/client/Xml/Generator.php',
        'AllsecureExchange\\Client\\Xml\\Parser' => __DIR__ . '/../../..' . '/classes/client/Xml/Parser.php',
        'Psr\\Log\\AbstractLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/AbstractLogger.php',
        'Psr\\Log\\InvalidArgumentException' => __DIR__ . '/..' . '/psr/log/Psr/Log/InvalidArgumentException.php',
        'Psr\\Log\\LogLevel' => __DIR__ . '/..' . '/psr/log/Psr/Log/LogLevel.php',
        'Psr\\Log\\LoggerAwareInterface' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerAwareInterface.php',
        'Psr\\Log\\LoggerAwareTrait' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerAwareTrait.php',
        'Psr\\Log\\LoggerInterface' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerInterface.php',
        'Psr\\Log\\LoggerTrait' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerTrait.php',
        'Psr\\Log\\NullLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/NullLogger.php',
        'Psr\\Log\\Test\\DummyTest' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/LoggerInterfaceTest.php',
        'Psr\\Log\\Test\\LoggerInterfaceTest' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/LoggerInterfaceTest.php',
        'Psr\\Log\\Test\\TestLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/TestLogger.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit37bdf721857f77fe1d7c44bd17b3a9e7c3540edbd68b1df48d0447c874511d41::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit37bdf721857f77fe1d7c44bd17b3a9e7c3540edbd68b1df48d0447c874511d41::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit37bdf721857f77fe1d7c44bd17b3a9e7c3540edbd68b1df48d0447c874511d41::$classMap;

        }, null, ClassLoader::class);
    }
}
