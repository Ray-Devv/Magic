<?php

namespace Config;

use Exception;

class Config
{
    private static ?array $param = null;
    private static ConfigMode $mode = ConfigMode::DEBUGMODE;

    /**
     * Renvoie la valeur d'un paramètre de configuration
     * @throws Exception
     */
    public static function get(string $nom, ?string $valeurParDefaut = null): ?string
    {
        $params = self::getParameter();

        if (isset($params['DB'][$nom])) {
            $valeur = $params['DB'][$nom];
        } elseif (isset($params[$nom])) {
            $valeur = $params[$nom];
        } else {
            $valeur = $valeurParDefaut;
        }
        return $valeur;
    }

    /**
     * Renvoie le tableau des paramètres en le chargeant si besoin
     * @throws Exception
     */
    private static function getParameter(): bool|array
    {
        if (self::$param === null) {
            switch (self::$mode) {
                case ConfigMode::DEBUGMODE:
                    $cheminFichier = __DIR__ . "/dev.ini";
                    break;
                case ConfigMode::PRODMODE:
                    $cheminFichier = __DIR__ . "/prod.ini";
                    break;
                case ConfigMode::TESTMODE:
                    $cheminFichier = __DIR__ . "/tests.ini";
                    break;
                default:
                    $cheminFichier = __DIR__ . "/default.ini";
            }

            if (!file_exists($cheminFichier)) {
                throw new Exception("Aucun fichier de configuration trouvé : " . $cheminFichier);
            } else {
                self::$param = parse_ini_file($cheminFichier, true);
            }
        }
        return self::$param;
    }

   
    public static function setMode(ConfigMode $mode): void
    {
        self::$mode = $mode;
        self::$param = null;
    }
}
