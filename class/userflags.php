<?php

use BitwiseHandler as GlobalBitwiseHandler;

class BitwiseHandler {
    const FLAG_STAFF = 1;
    const FLAG_PARTNER = 2;
    const FLAG_HYPESQUAD = 4;
    const FLAG_BUG_HUNTER_LEVEL_1 = 8;
    const FLAG_HYPESQUAD_BRAVERY = 6;
    const FLAG_HYPESQUAD_BRILLIANCE = 128;
    const FLAG_HYPESQUAD_BALANCE = 256;
    const FLAG_PREMIUM_EARLY_SUPPORTER = 512;
    const FLAG_TEAM_PSEUDO_USER = 1024;
    const FLAG_BUG_HUNTER_LEVEL_2 = 16384;
    const FLAG_VERIFIED_BOT = 65536;
    const FLAG_VERIFIED_DEVELOPER = 131072;
    const FLAG_CERTIFIED_MODERATOR = 262144;
    const FLAG_BOT_HTTP_INTERACTIONS = 524288;
        
    protected function isFlagSet($string, $flag) {
        return (($string & $flag) == $flag);
    }

    private function isStaff($string) {
        return $this->isFlagSet($string, self::FLAG_STAFF);
    }

    private function isPartner($string) {
        return $this->isFlagSet($string, self::FLAG_PARTNER);
    }

    private function isHypesquad($string) {
        return $this->isFlagSet($string, self::FLAG_HYPESQUAD);
    }

    private function isBug_Hunter_Level_1($string) {
        return $this->isFlagSet($string, self::FLAG_BUG_HUNTER_LEVEL_1);
    }

    private function isHypesquad_Bravery($string) {
        return $this->isFlagSet($string, self::FLAG_HYPESQUAD_BRAVERY);
    }

    private function isHypesquad_Brilliance($string) {
        return $this->isFlagSet($string, self::FLAG_HYPESQUAD_BRILLIANCE);
    }

    private function isHypesquad_Balance($string) {
        return $this->isFlagSet($string, self::FLAG_HYPESQUAD_BALANCE);
    }

    private function isPremium_Early_Supporter($string) {
        return $this->isFlagSet($string, self::FLAG_PREMIUM_EARLY_SUPPORTER);
    }

    private function isTeam_Pseudo_User($string) {
        return $this->isFlagSet($string, self::FLAG_TEAM_PSEUDO_USER);
    }

    private function isBug_Hunter_Level_2($string) {
        return $this->isFlagSet($string, self::FLAG_BUG_HUNTER_LEVEL_2);
    }

    private function isVerified_Bot($string) {
        return $this->isFlagSet($string, self::FLAG_VERIFIED_BOT);
    }

    private function isVerified_Developer($string) {
        return $this->isFlagSet($string, self::FLAG_VERIFIED_DEVELOPER);
    }

    private function isCertified_Moderator($string) {
        return $this->isFlagSet($string, self::FLAG_CERTIFIED_MODERATOR);
    }

    private function isBOT_HTTP_INTERACTIONS($string) {
        return $this->isFlagSet($string, self::FLAG_BOT_HTTP_INTERACTIONS);
    }

    public function get_flag_array($string) {
        try {
            $userflags = [
                "STAFF" => ($this->isStaff($string) ? true : false) ,
                "PARTNER" => ($this->isPartner($string) ? true : false) ,
                "HYPESQUAD" => ($this->isHypesquad($string) ? true : false) ,
                "BUG_HUNTER_LEVEL_1" => ($this->isBug_Hunter_Level_1($string) ? true : false) ,
                "HYPESQUAD_BRAVERY" => ($this->isHypesquad_Bravery($string) ? true : false) ,
                "HYPESQUAD_BRILLIANCE" => ($this->isHypesquad_Brilliance($string) ? true : false) ,
                "HYPESQUAD_BALANCE" => ($this->isHypesquad_Balance($string) ? true : false) ,
                "PREMIUM_EARLY_SUPPORTER" => ($this->isPremium_Early_Supporter($string) ? true : false) ,
                "TEAM_PSEUDO_USER" => ($this->isTeam_Pseudo_User($string) ? true : false) ,
                "FLAG_BUG_HUNTER_LEVEL_2" => ($this->isBug_Hunter_Level_2($string) ? true : false) ,
                "VERIFIED_DEVELOPER" => ($this->isVerified_Developer($string) ? true : false) ,
                "CERTIFIED_MODERATOR" => ($this->isCertified_Moderator($string) ? true : false) ,
                "BOT_HTTP_INTERACTIONS" => ($this->isBOT_HTTP_INTERACTIONS($string) ? true : false) ,
                ];
            return $userflags;
        } catch (Error $e) {
            throw new Error('ERR:FAILED_GET_FLAG_ARRAY'.$e);
        }
    }
}

class userflags extends BitwiseHandler {
    public function get_html($string) {
        try {
        $userflags = $this->get_flag_array($string);
        $output = (string)"";
        $output.= $userflags["HYPESQUAD_BRAVERY"] ? '<div><img src="/assets/braverybadge.svg"></div>' : '';
        $output.= $userflags["HYPESQUAD_BRILLIANCE"] ? '<div><img src="/assets/brilliancebadge.svg"></div>' : '';
        $output.= $userflags["HYPESQUAD_BALANCE"] ? '<div><img src="/assets/balancebadge.svg"></div>' : '';

        return $output;
        
        // if($userflags["STAFF"]) {};
        // if($userflags["PARTNER"]) {};
        // if($userflags["HYPESQUAD"]) {};
        // if($userflags["BUG_HUNTER_LEVEL_1"]) {};
        // if($userflags["HYPESQUAD_BRAVERY"]) {};
        // if($userflags["HYPESQUAD_BRILLIANCE"]) {};
        // if($userflags["HYPESQUAD_BALANCE"]) {};
        // if($userflags["PREMIUM_EARLY_SUPPORTER"]) {};
        // if($userflags["TEAM_PSEUDO_USER"]) {};
        // if($userflags["FLAG_BUG_HUNTER_LEVEL_2"]) {};
        // if($userflags["VERIFIED_DEVELOPER"]) {};
        // if($userflags["CERTIFIED_MODERATOR"]) {};
        // if($userflags["BOT_HTTP_INTERACTIONS"]) {};
        } catch (Error $e) {
            throw new Error($e);
        }
    }
}