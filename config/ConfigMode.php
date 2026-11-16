<?php

namespace Config;

enum ConfigMode: int
{
    case TESTMODE = 1;
    case DEBUGMODE = 2;
    case PRODMODE = 3;
}