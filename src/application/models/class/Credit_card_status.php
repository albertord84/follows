<?php

class credit_card_status
{
    const ACTIVE = 1;
    const PENDENT = 2;
    const BLOCKED = 3;

    static public function Defines($const)
    {
        $cls = new ReflectionClass(__CLASS__);
        foreach($cls->getConstants() as $key=>$value)
        {
            if($value == $const)
            {
                return true;
            }
        }

        return false;
    }
}
