<?php
require('mpower_php-master/mpower.php');
MPower_Setup::setMasterKey("46cfd826-07d1-42d2-a66b-617806e352b4");
    MPower_Setup::setPublicKey('test_public_iLHn8Mx0XTxglqhCqN96AWTl8ZI');
    MPower_Setup::setPrivateKey('test_private_2qRCk7e9RrDeO2gWRA7CpdGn2PQ');
    MPower_Setup::setMode("test");
    MPower_Setup::setToken('b157d415a8f9420a89a4');

    MPower_Checkout_Store::setName("Fundr Africa");
    MPower_Checkout_Store::setTagline("Crowdsourcing platform for African Entrepreneurs.");
    MPower_Checkout_Store::setPhoneNumber('0241451551');
    MPower_Checkout_Store::setPostalAddress('1234');